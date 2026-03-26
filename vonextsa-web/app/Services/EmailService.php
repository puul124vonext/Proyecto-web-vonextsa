<?php

declare(strict_types=1);

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;

class EmailService
{
    private string $tenantId;

    private string $clientId;

    private string $clientSecret;

    private string $senderEmail;

    public function __construct()
    {
        $this->tenantId = config('services.ms.tenant_id', '');
        $this->clientId = config('services.ms.client_id', '');
        $this->clientSecret = config('services.ms.client_secret', '');
        $this->senderEmail = config('mail.mail_sender', 'info@vonextsa.com');

        Log::info('=== EmailService Diagnostic ===');
        Log::info('Tenant ID: '.($this->tenantId ? 'SET' : 'EMPTY'));
        Log::info('Client ID: '.($this->clientId ? 'SET' : 'EMPTY'));
        Log::info('Client Secret: '.($this->clientSecret ? 'SET' : 'EMPTY'));
        Log::info('Sender Email: '.$this->senderEmail);
        Log::info('App Environment: '.app()->environment());
        Log::info('================================');
    }

    private function createGuzzleClient(): Client
    {
        $options = ['timeout' => 30];

        if (app()->environment('local')) {
            $options['verify'] = false;
        }

        return new Client($options);
    }

    private function getAccessToken(): string
    {
        $cacheKey = 'ms_graph_token';

        if (cache()->has($cacheKey)) {
            Log::info('Using cached token');

            return cache()->get($cacheKey);
        }

        $guzzle = $this->createGuzzleClient();
        $url = "https://login.microsoftonline.com/{$this->tenantId}/oauth2/v2.0/token";

        Log::info('Intentando obtener token de: '.$url);
        Log::info('TenantInfo: '.$this->tenantId);

        try {
            $response = $guzzle->post($url, [
                'form_params' => [
                    'client_id' => $this->clientId,
                    'client_secret' => $this->clientSecret,
                    'scope' => 'https://graph.microsoft.com/.default',
                    'grant_type' => 'client_credentials',
                ],
            ]);

            $data = json_decode($response->getBody()->getContents(), true);
            $token = $data['access_token'];

            cache()->put($cacheKey, $token, now()->addSeconds($data['expires_in'] - 300));

            Log::info('Token obtenido exitosamente');

            return $token;
        } catch (GuzzleException $e) {
            $errorMsg = 'Failed to get access token: '.$e->getMessage();
            Log::error($errorMsg);

            try {
                if ($e->hasResponse()) {
                    $responseBody = (string) $e->getResponse()->getBody();
                    Log::error('Response body: '.$responseBody);
                }
            } catch (\Exception $logError) {
                Log::error('Could not get response body: '.$logError->getMessage());
            }

            throw new \RuntimeException('Failed to authenticate with Microsoft Graph API: '.$e->getMessage());
        }
    }

    public function sendContactEmail(string $to, array $data): void
    {
        $token = $this->getAccessToken();

        $guzzle = $this->createGuzzleClient();
        $url = "https://graph.microsoft.com/v1.0/users/{$this->senderEmail}/sendMail";

        $message = [
            'message' => [
                'subject' => 'Contacto VONEXT - '.ucfirst($data['subject_type']),
                'body' => [
                    'contentType' => 'HTML',
                    'content' => $this->buildEmailBody($data),
                ],
                'toRecipients' => [
                    [
                        'emailAddress' => ['address' => $to],
                    ],
                ],
                'from' => [
                    'emailAddress' => ['address' => $this->senderEmail],
                ],
            ],
        ];

        try {
            $guzzle->post($url, [
                'headers' => [
                    'Authorization' => 'Bearer '.$token,
                    'Content-Type' => 'application/json',
                ],
                'json' => $message,
            ]);
        } catch (GuzzleException $e) {
            Log::error('Failed to send email: '.$e->getMessage());
            throw new \RuntimeException('Failed to send email');
        }
    }

    private function buildEmailBody(array $data): string
    {
        return "
            <h2>Nuevo mensaje de contacto</h2>
            <p><strong>Nombre:</strong> {$data['name']}</p>
            <p><strong>Email:</strong> {$data['email']}</p>
            <p><strong>Tipo:</strong> {$data['subject_type']}</p>
            <p><strong>Mensaje:</strong></p>
            <p>".nl2br($data['message']).'</p>
        ';
    }
}

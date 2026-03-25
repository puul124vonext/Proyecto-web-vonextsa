<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Services\EmailService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function __construct(
        private readonly EmailService $emailService
    ) {}

    public function send(ContactRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $destination = match ($validated['asunto']) {
            'soporte' => config('mail.mail_soporte'),
            'ventas' => config('mail.mail_ventas'),
            default => config('mail.mail_info'),
        };

        $emailData = [
            'name' => strip_tags($validated['nombre']),
            'email' => filter_var($validated['email'], FILTER_VALIDATE_EMAIL),
            'subject_type' => strip_tags($validated['asunto']),
            'message' => strip_tags($validated['mensaje']),
        ];

        try {
            $this->emailService->sendContactEmail($destination, $emailData);

            return response()->json([
                'success' => true,
                'message' => 'Mensaje enviado correctamente.',
            ]);
        } catch (\Exception $e) {
            Log::error('Contact form error: '.$e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error al enviar el mensaje. Intente más tarde.',
            ], 500);
        }
    }

    public function testEmail(): JsonResponse
    {
        try {
            $this->emailService->sendContactEmail(
                config('mail.mail_soporte', 'soporte@vonextsa.com'),
                [
                    'name' => 'Test User',
                    'email' => 'test@example.com',
                    'subject_type' => 'soporte',
                    'message' => 'Este es un mensaje de prueba del sistema.',
                ]
            );

            return response()->json([
                'success' => true,
                'message' => 'Test email sent successfully to soporte@vonextsa.com',
            ]);
        } catch (\Exception $e) {
            Log::error('Test email error: '.$e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error sending test email: '.$e->getMessage(),
            ], 500);
        }
    }
}

# PLAN DE DESARROLLO - WEB VONEXT

## Información del Proyecto

- **Empresa:** VONEXT S.A
- **Proyecto:** vonextsa-web
- **Stack:** Laravel 11 + Bootstrap 5.3 + Microsoft Graph API
- **Hosting:** Bluehost Shared (cPanel)- pruebs en ultahost
- **Repositorio:** github.com/[usuario]/vonextsa-web
- **Logo de la empresa** carpeta logo
---

## FASE 1: CONFIGURACIÓN INICIAL

### 1.1 Crear Proyecto Laravel 11

```bash
composer create-project laravel/laravel:^11.0 vonextsa-web
cd vonextsa-web
```

### 1.2 Inicializar Git + GitHub

```bash
git init
git add .
git commit -m "Initial commit: Laravel 11 base project"
gh repo create vonextsa-web --public --push --source=.
```

### 1.3 Estructura de Carpetas

```
vonextsa-web/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   └── ContactController.php
│   │   └── Requests/
│   │       └── ContactRequest.php
│   └── Services/
│       ├── GraphApiService.php
│       └── EmailService.php
├── config/
│   ├── mail.php (actualizar)
│   └── services.php (actualizar)
├── resources/views/
│   ├── layouts/
│   │   └── app.blade.php
│   └── home.blade.php
├── routes/web.php
├── tests/Feature/
│   └── ContactFormTest.php
├── public/
│   ├── css/styles.css
│   └── js/main.js
├── .env
├── .env.example
└── .htaccess
```

---

## FASE 2: CONFIGURACIÓN .env

```bash
cp .env.example .env
php artisan key:generate
```

**Variables requeridas en `.env`:**

```env
# Microsoft Graph API
MS_TENANT_ID=9bfa3daa-c4c3-4e31-9bfb-9b158cb559b2
MS_CLIENT_ID=fb23f572-a97f-4352-bb6d-d4e3157485d5
MS_CLIENT_SECRET=Wb38Q~hliJ4k8~xBhuZtknff9Z4LlCu0R4rf7ctI
MAIL_SENDER=info@vonextsa.com

# Destinatarios
MAIL_SOPORTE=soporte@vonextsa.com
MAIL_VENTAS=info@vonextsa.com
MAIL_INFO=info@vonextsa.com

# CSRF
CSRF_SECRET=genera-un-string-de-32-caracteres
```

---

## FASE 3: FRONTEND - Layout Principal

**Archivo:** `resources/views/layouts/app.blade.php`

```blade
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VONEXT S.A - Comunicación Avanzada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/logo/logo.png') }}" alt="VONEXT" height="40">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#inicio">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#nosotros">Nosotros</a></li>
                    <li class="nav-item"><a class="nav-link" href="#servicios">Servicios</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contacto">Contacto</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <p>&copy; 2024 VONEXT S.A - Comunicación Avanzada</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
```

---

## FASE 4: PÁGINA PRINCIPAL (Landing)

**Archivo:** `resources/views/home.blade.php`

```blade
@extends('layouts.app')

@section('content')
<!-- Banner Inicio -->
<section id="inicio" class="hero-section text-white text-center">
    <div class="container">
        <h1 class="display-4 fw-bold">Comunicación Avanzada</h1>
        <p class="lead">Soluciones tecnológicas para empresas modernas</p>
        <a href="#contacto" class="btn btn-light btn-lg mt-3">Contáctanos</a>
    </div>
</section>

<!-- Nosotros -->
<section id="nosotros" class="py-5 bg-white">
    <div class="container">
        <h2 class="text-center mb-4">Quiénes Somos</h2>
        <div class="row align-items-center">
            <div class="col-md-6">
                <p>VONEXT S.A es una empresa líder en soluciones de comunicación empresarial. 
                Con años de experiencia, ayudamos a las organizaciones a optimizar sus 
                procesos de comunicación interna y externa.</p>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('assets/img/nosotros.jpg') }}" alt="Nosotros" class="img-fluid rounded">
            </div>
        </div>
    </div>
</section>

<!-- Servicios -->
<section id="servicios" class="py-5" style="background-color: #e8f4fc;">
    <div class="container">
        <h2 class="text-center mb-4">Nuestros Servicios</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Mensajería Corporativa</h5>
                        <p class="card-text">Soluciones de correo electrónico empresariales seguras y confiables.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Integración API</h5>
                        <p class="card-text">Conecta tus sistemas con nuestras APIs de comunicación.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Soporte 24/7</h5>
                        <p class="card-text">Equipo de expertos disponible para ayudarte en todo momento.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Formulario Contacto -->
<section id="contacto" class="py-5 bg-white">
    <div class="container">
        <h2 class="text-center mb-4">Contáctanos</h2>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form id="contactForm" action="{{ route('contact.send') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre *</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico *</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="asunto" class="form-label">Asunto *</label>
                        <select class="form-select" id="asunto" name="asunto" required>
                            <option value="">Seleccione una opción</option>
                            <option value="soporte">Soporte Técnico</option>
                            <option value="ventas">Ventas</option>
                            <option value="info">Información General</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="mensaje" class="form-label">Mensaje *</label>
                        <textarea class="form-control" id="mensaje" name="mensaje" rows="5" required></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary w-100" id="submitBtn">
                        Enviar Mensaje
                    </button>
                </form>
                
                <div id="formResponse" class="mt-3 d-none"></div>
            </div>
        </div>
    </div>
</section>
@endsection
```

---

## FASE 5: CSS PERSONALIZADO

**Archivo:** `public/css/styles.css`

```css
:root {
    --primary-color: #87CEEB;
    --primary-dark: #5BA3C6;
    --bg-light: #F8FAFC;
    --text-dark: #1F2937;
}

.hero-section {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    padding: 120px 0 80px;
    min-height: 60vh;
    display: flex;
    align-items: center;
}

.navbar-brand img {
    height: 40px;
}

section {
    scroll-margin-top: 80px;
}

.card {
    transition: transform 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
}

#formResponse.success {
    color: #059669;
    padding: 1rem;
    border-radius: 8px;
    background: #D1FAE5;
}

#formResponse.error {
    color: #DC2626;
    padding: 1rem;
    border-radius: 8px;
    background: #FEE2E2;
}
```

---

## FASE 6: JAVASCRIPT FRONTEND

**Archivo:** `public/js/main.js`

```javascript
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contactForm');
    const responseDiv = document.getElementById('formResponse');
    const submitBtn = document.getElementById('submitBtn');

    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        submitBtn.disabled = true;
        submitBtn.textContent = 'Enviando...';
        responseDiv.classList.add('d-none');

        const formData = new FormData(form);

        try {
            const response = await fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                }
            });

            const data = await response.json();

            responseDiv.classList.remove('d-none');
            
            if (data.success) {
                responseDiv.className = 'mt-3 alert alert-success';
                responseDiv.textContent = data.message;
                form.reset();
            } else {
                responseDiv.className = 'mt-3 alert alert-danger';
                responseDiv.textContent = data.message || 'Error al enviar el mensaje';
            }
        } catch (error) {
            responseDiv.classList.remove('d-none');
            responseDiv.className = 'mt-3 alert alert-danger';
            responseDiv.textContent = 'Error de conexión. Intente nuevamente.';
        } finally {
            submitBtn.disabled = false;
            submitBtn.textContent = 'Enviar Mensaje';
        }
    });
});
```

---

## FASE 7: ROUTES

**Archivo:** `routes/web.php`

```php
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::post('/contact/send', [ContactController::class, 'send'])
    ->name('contact.send')
    ->middleware('throttle:3,10');
```

---

## FASE 8: CONTACT CONTROLLER

**Archivo:** `app/Http/Controllers/ContactController.php`

```php
<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Services\EmailService;
use Illuminate\Http\JsonResponse;

class ContactController extends Controller
{
    public function __construct(
        private EmailService $emailService
    ) {}

    public function send(ContactRequest $request): JsonResponse
    {
        $validated = $request->validated();
        
        $destination = match($validated['asunto']) {
            'soporte' => config('mail.mail_soporte'),
            'ventas' => config('mail.mail_ventas'),
            default => config('mail.mail_info'),
        };

        $emailData = [
            'name' => strip_tags($validated['nombre']),
            'email' => filter_var($validated['email'], FILTER_VALIDATE_EMAIL),
            'subject_type' => $validated['asunto'],
            'message' => strip_tags($validated['mensaje']),
        ];

        try {
            $this->emailService->sendContactEmail($destination, $emailData);
            
            return response()->json([
                'success' => true,
                'message' => 'Mensaje enviado correctamente.'
            ]);
        } catch (\Exception $e) {
            \Log::error('Contact form error: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Error al enviar el mensaje. Intente más tarde.'
            ], 500);
        }
    }
}
```

---

## FASE 9: CONTACT REQUEST

**Archivo:** `app/Http/Requests/ContactRequest.php`

```php
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => ['required', 'string', 'max:100', 'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/'],
            'email' => ['required', 'email', 'max:255'],
            'asunto' => ['required', 'in:soporte,ventas,info'],
            'mensaje' => ['required', 'string', 'min:10', 'max:2000'],
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.regex' => 'El nombre solo puede contener letras y espacios.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Ingrese un correo electrónico válido.',
            'asunto.required' => 'Seleccione un tipo de asunto.',
            'asunto.in' => 'Tipo de asunto inválido.',
            'mensaje.required' => 'El mensaje es obligatorio.',
            'mensaje.min' => 'El mensaje debe tener al menos 10 caracteres.',
            'mensaje.max' => 'El mensaje no puede exceder 2000 caracteres.',
        ];
    }
}
```

---

## FASE 10: EMAIL SERVICE

**Archivo:** `app/Services/EmailService.php`

```php
<?php

namespace App\Services;

use Microsoft\Graph\Graph;
use Microsoft\Graph\Model\Message;

class EmailService
{
    private string $tenantId;
    private string $clientId;
    private string $clientSecret;

    public function __construct()
    {
        $this->tenantId = config('services.ms.tenant_id');
        $this->clientId = config('services.ms.client_id');
        $this->clientSecret = config('services.ms.client_secret');
    }

    private function getAccessToken(): string
    {
        $cacheKey = 'ms_graph_token';
        
        if (cache()->has($cacheKey)) {
            return cache()->get($cacheKey);
        }

        $guzzle = new \GuzzleHttp\Client();
        $url = "https://login.microsoftonline.com/{$this->tenantId}/oauth2/v2.0/token";

        $response = $guzzle->post($url, [
            'form_params' => [
                'client_id' => $this->clientId,
                'client_secret' => $this->clientSecret,
                'scope' => 'https://graph.microsoft.com/.default',
                'grant_type' => 'client_credentials',
            ]
        ]);

        $data = json_decode($response->getBody()->getContents());
        $token = $data->access_token;

        cache()->put($cacheKey, $token, now()->addSeconds($data->expires_in - 300));

        return $token;
    }

    public function sendContactEmail(string $to, array $data): void
    {
        $token = $this->getAccessToken();

        $graph = new Graph();
        $graph->setAccessToken($token);

        $message = new Message([
            'subject' => "Contacto VONEXT - " . ucfirst($data['subject_type']),
            'body' => [
                'contentType' => 'HTML',
                'content' => $this->buildEmailBody($data)
            ],
            'toRecipients' => [
                [
                    'emailAddress' => ['address' => $to]
                ]
            ],
            'from' => [
                'emailAddress' => ['address' => config('mail.from.address')]
            ]
        ]);

        $graph->createRequest('POST', '/me/sendMail')
            ->attachBody(['message' => $message])
            ->execute();
    }

    private function buildEmailBody(array $data): string
    {
        return "
            <h2>Nuevo mensaje de contacto</h2>
            <p><strong>Nombre:</strong> {$data['name']}</p>
            <p><strong>Email:</strong> {$data['email']}</p>
            <p><strong>Tipo:</strong> {$data['subject_type']}</p>
            <p><strong>Mensaje:</strong></p>
            <p>" . nl2br($data['message']) . "</p>
        ";
    }
}
```

---

## FASE 11: CONFIG MAIL

**Archivo:** `config/mail.php` (agregar al final del array return)

```php
'mail_soporte' => env('MAIL_SOPORTE', 'soporte@vonext.com'),
'mail_ventas' => env('MAIL_VENTAS', 'ventas@vonext.com'),
'mail_info' => env('MAIL_INFO', 'info@vonext.com'),
```

**Archivo:** `config/services.php` (agregar en el array return)

```php
'ms' => [
    'tenant_id' => env('MS_TENANT_ID'),
    'client_id' => env('MS_CLIENT_ID'),
    'client_secret' => env('MS_CLIENT_SECRET'),
],
```

---

## FASE 12: INSTALAR DEPENDENCIAS GRAPH API

```bash
composer require microsoft/microsoft-graph
```

---

## FASE 13: TESTS

**Archivo:** `tests/Feature/ContactFormTest.php`

```php
<?php

namespace Tests\Feature;

use Tests\TestCase;

class ContactFormTest extends TestCase
{
    public function test_contact_form_validation_requires_name(): void
    {
        $response = $this->post('/contact/send', [
            'email' => 'test@test.com',
            'asunto' => 'info',
            'mensaje' => 'Mensaje de prueba largo',
            '_token' => csrf_token(),
        ]);

        $response->assertSessionHasErrors('nombre');
    }

    public function test_contact_form_validation_requires_valid_email(): void
    {
        $response = $this->post('/contact/send', [
            'nombre' => 'Test User',
            'email' => 'invalid-email',
            'asunto' => 'info',
            'mensaje' => 'Mensaje de prueba largo',
            '_token' => csrf_token(),
        ]);

        $response->assertSessionHasErrors('email');
    }

    public function test_contact_form_validation_requires_valid_subject(): void
    {
        $response = $this->post('/contact/send', [
            'nombre' => 'Test User',
            'email' => 'test@test.com',
            'asunto' => 'invalid',
            'mensaje' => 'Mensaje de prueba largo',
            '_token' => csrf_token(),
        ]);

        $response->assertSessionHasErrors('asunto');
    }

    public function test_contact_form_message_minimum_length(): void
    {
        $response = $this->post('/contact/send', [
            'nombre' => 'Test User',
            'email' => 'test@test.com',
            'asunto' => 'info',
            'mensaje' => 'Corto',
            '_token' => csrf_token(),
        ]);

        $response->assertSessionHasErrors('mensaje');
    }

    public function test_contact_form_rejects_xss_attacks(): void
    {
        $response = $this->post('/contact/send', [
            'nombre' => '<script>alert("xss")</script>',
            'email' => 'test@test.com',
            'asunto' => 'info',
            'mensaje' => 'Mensaje de prueba',
            '_token' => csrf_token(),
        ]);

        $response->assertSessionHasErrors('nombre');
    }
}
```

**Ejecutar tests:**
```bash
php artisan test
php artisan test --filter=ContactFormTest
```

---

## FASE 14: .HTACCESS

**Archivo:** `public/.htaccess`

```apache
# Forzar HTTPS
RewriteEngine On
RewriteCond %{HTTPS} off
RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

# Ocultar firma del servidor
ServerSignature Off

# Prevenir hotlinking
RewriteCond %{HTTP_REFERER} !^$
RewriteCond %{HTTP_REFERER} !^https://(www\.)?vonext\.com [NC]
RewriteRule \.(jpg|jpeg|png|gif)$ - [F]

# Proteger archivos sensibles
<FilesMatch "^\.">
    Order allow,deny
    Deny from all
</FilesMatch>

<FilesMatch "\.env$">
    Order allow,deny
    Deny from all
</FilesMatch>
```

---

## COMANDOS RESUMEN

```bash
# 1. Crear proyecto
composer create-project laravel/laravel:^11.0 vonextsa-web
cd vonextsa-web

# 2. Git + GitHub
git init
git add .
git commit -m "Initial commit"
gh repo create vonextsa-web --public --push --source=.

# 3. Instalar dependencias Graph API
composer require microsoft/microsoft-graph

# 4. Generar app key
php artisan key:generate

# 5. Crear link simbólico storage
php artisan storage:link

# 6. Tests
php artisan test
php artisan test --filter=ContactFormTest

# 7. Servir localmente
php artisan serve

# 8. Deploy a Bluehost pendinete hasta tener la version final del proyecto para ser publicado
#rsync -avz --delete public/ user@bluehost.com:~/public_html/
```

---

## CHECKLIST PRE-DEPLOY

- [ ] Configurar credenciales Azure AD en `.env`
- [ ] Actualizar emails destino
- [ ] Subir logo a `public/assets/logo/`
- [ ] Verificar HTTPS activo
- [ ] Probar formulario en staging
- [ ] Ejecutar todos los tests
- [ ] Revisar `.htaccess`
- [ ] Verificar rate limiting

---

## NOTAS PARA AGENTES

- Usar **PHP 8.2+** y **Laravel 11**
- Todas las credenciales van en `.env` (nunca hardcodear)
- Validación en cliente (JS) + servidor (Laravel)
- CSRF token automático de Laravel
- Rate limiting: 3 envíos cada 10 minutos por IP
- Para testing local, usar `php artisan serve`

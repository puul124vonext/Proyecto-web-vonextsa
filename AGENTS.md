# AGENTS.md — Sitio Web Empresarial

# Agent Identity: Vonext Mailer Core
**Role:** Microservicio de mensajería asíncrona mediante Guzzle  para envio de mail de Microsoft.
**Objective:** Garantizar la entrega de notificaciones críticas con trazabilidad total.
**Governance:** - Validación estricta de tokens OAuth 2.0.
- Sanitización de payloads JSON antes del envío.
- Manejo de reintentos con backoff exponencial.

## Descripción del proyecto
Sitio web informativo de empresa de servicios tecnológicos.
Páginas: inicio (quiénes somos), servicios, contacto, en inicio deve estar la poluica de seguroidad como un icono que al presionarlo aparesca un pop-up
Hosting Produccion: Bluehost Shared Hosting (cPanel).
Hosting Pruebas : Ultahost Shared Hosting (cPanel).
Dominio: vonextsa.com
Politica de Seguridad: politicaseguridad.txt
Imagenes las puedes tomar de internet en relacion a notificaciones digitales

## Stack exacto
- Frontend : Bootstrap 5.3 (CDN) + CSS propio + JS vanilla
- Backend  : Laravel 11 + PHP 8.5.4
- Mail     : Guzzle client credentials
- Hosting Produccion: Bluehost Shared Hosting (cPanel).
- Hosting Pruebas : Ultahost Shared Hosting (cPanel).

## Estructura de archivos Laravel (public/)
- Views    : resources/views/layouts/app.blade.php, home.blade.php
- Routes   : routes/web.php
- Controllers: app/Http/Controllers/ContactController.php
- Services : app/Services/EmailService.php
- CSS      : public/css/styles.css
- JS       : public/js/main.js

## Convenciones de código
- HTML: semántico (header, main, section, footer), BEM para clases CSS propias
- PHP: sin frameworks, PHP puro, tipado estricto (declare(strict_types=1))
- JS: ES6+, sin jQuery, async/await para fetch
- CSS: variables CSS en :root, mobile-first


## Documentacion y readme
-mirar en la carpeta .opencode/skills/skill.md

## Seguridad — REGLAS CRÍTICAS
NUNCA hardcodear: client_id, client_secret, tenant_id, mails destino
Todos los secrets van en .env (raíz de public_html, fuera de git)
Config se lee desde config.php usando $_ENV o parse_ini_file
NUNCA exponer rutas de archivos internos en mensajes de error
NUNCA confiar en inputs del usuario sin sanitizar con htmlspecialchars/filter_var

## Formulario de contacto
- Validación: cliente (JS) + servidor (Laravel FormRequest) — siempre doble validación
- Protección: CSRF token + rate limiting (max 3 envíos / 10 min por IP)
- Destino mail: según tipo (soporte / ventas / información) → mail diferente
- Servicio: Microsoft Graph API, endpoint POST /sendMail
- Auth: OAuth2 client_credentials — token se cachea en Laravel cache
- Sanitizar el texto

## Variables de entorno requeridas (.env)
MS_TENANT_ID      = xxxx-xxxx-xxxx
MS_CLIENT_ID      = xxxx-xxxx-xxxx
MS_CLIENT_SECRET  = xxxxxxxxxxxx
MAIL_SENDER       = paul.atiencia@vonextsa.com
MAIL_SOPORTE      = soporte@vonextsa.com
MAIL_VENTAS       = info@vonextsa.com
MAIL_INFO         = info@vonextsa.com
CSRF_SECRET       = string-random-32-chars

## NO modificar sin revisión
- app/Services/EmailService.php → integración Graph API, bien testeada
- .htaccess          → seguridad de Apache, no tocar headers de seguridad
- config/mail.php    → configuración de emails, no agregar valores hardcoded

## Skills disponibles (en .claude/skills/)
- html-section.md    → crear nueva sección HTML con Bootstrap 5
- php-form.md        → handler PHP del formulario
- office365-mail.md  → integración Graph API + OAuth2
- security-web.md    → CSRF, headers, .htaccess, sanitización
- deploy-bluehost.md → checklist antes de hacer deploy

## Comando de verificación pre-deploy
/deploy-check → revisa seguridad y estructura antes de subir a Bluehost
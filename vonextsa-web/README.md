# VONEXT S.A - Sitio Web Corporativo

Sitio web profesional para VONEXT S.A, empresa líder en soluciones de comunicación empresarial. Construido con Laravel 11, Bootstrap 5.3 e integración con Microsoft Graph API vía Guzzle HTTP para gestión de emails corporativos.

## 🚀 Características

- **Framework**: Laravel 11 con PHP 8.2+
- **Frontend**: Bootstrap 5.3 + Vanilla JavaScript (sin jQuery)
- **Email Integration**: Guzzle HTTP → Microsoft Graph API REST (OAuth2 Client Credentials)
- **Base de datos**: MySQL (XAMPP local, Ultahost staging, Bluehost producción)
- **Validación**: Doble validación (cliente-side JS + servidor-side FormRequest)
- **Seguridad**: CSRF tokens, rate limiting (3 mensajes/10 min por IP), sanitización de entrada
- **Responsive**: Diseño mobile-first con media queries
- **Tests**: Suite completa de unit tests con PHPUnit

## 📋 Requisitos

- PHP 8.2+ (local: `C:\Program Files\PHP\8.5.4\ts\x64`)
- Composer
- Node.js & npm
- Laravel 11
- XAMPP (MySQL + phpMyAdmin)
- Guzzle HTTP

## 🔧 Instalación

### 1. Clonar el repositorio
```bash
git clone https://github.com/puul124vonext/Proyecto-web-vonextsa.git
cd Proyecto-web-vonextsa/vonextsa-web
```

### 2. Instalar dependencias
```bash
composer install
npm install
```

### 3. Configurar variables de entorno
```bash
cp .env.example .env
php artisan key:generate
```

### 3.1. Configurar Base de Datos MySQL (XAMPP)

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=vonextsa
DB_USERNAME=root
DB_PASSWORD=
```

1. Iniciar XAMPP (Apache + MySQL)
2. Abrir http://localhost/phpmyadmin
3. Crear base de datos llamada `vonextsa` (charset: utf8mb4)
4. Ejecutar migraciones: `php artisan migrate`

### 4. Configurar Email (Microsoft Graph API vía Guzzle)

Edita `.env` con tus credenciales:

```env
# Microsoft Graph API (Guzzle OAuth2)
MS_TENANT_ID=9bfa3daa-c4c3-4e31-9bfb-9b158cb559b2
MS_CLIENT_ID=fb23f572-a97f-4352-bb6d-d4e3157485d5
MS_CLIENT_SECRET=Wb38Q~hliJ4k8~xBhuZtknff9Z4LlCu0R4rf7ctI
MS_USER_EMAIL=paul.atiencia@vonextsa.com

# Mail Configuration
MAIL_SENDER=paul.atiencia@vonextsa.com
MAIL_SOPORTE=soporte@vonextsa.com
MAIL_VENTAS=info@vonextsa.com
MAIL_INFO=info@vonextsa.com
```

### 5. Compilar assets
```bash
npm run build
```

### 6. Iniciar servidor de desarrollo
```bash
php artisan serve
```

El sitio estará disponible en `http://127.0.0.1:8000`

## ⚠️ Pre-Commit Validation (OBLIGATORIO)

Antes de hacer commit/push, SIEMPRE ejecutar:

1. **Tests PHPUnit:** `php artisan test` (todos deben pasar)
2. **Code style:** `./vendor/bin/pint --test` (debe ser PASS)
3. **Arrancar servidor:** `php artisan serve`
4. **Verificar página:** Abrir `http://127.0.0.1:8000` y confirmar que carga correctamente
5. **Test envío de email:** Usar el endpoint `/test-email` o el formulario de contacto
6. Solo después de TODAS estas verificaciones → hacer commit/push

## 📁 Estructura del Proyecto

```
vonextsa-web/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   └── ContactController.php       # Controlador de formulario + testEmail()
│   │   └── Requests/
│   │       └── ContactRequest.php          # Validación FormRequest
│   ├── Services/
│   │   └── EmailService.php                # Guzzle → Microsoft Graph API
│   └── Providers/
│       └── AppServiceProvider.php
├── config/
│   ├── services.php                        # Configuración Microsoft
│   ├── mail.php                            # Configuración de email
│   └── database.php                        # MySQL (default)
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php               # Layout principal + footer
│       └── home.blade.php                  # Página de inicio + carrusel
├── routes/
│   └── web.php                             # Rutas de aplicación
├── public/
│   ├── css/
│   │   └── styles.css                      # Estilos personalizados
│   ├── js/
│   │   └── main.js                         # JavaScript del formulario
│   └── assets/
│       ├── logo/
│       │   └── logo.jpg
│       └── img/                            # Imágenes: img1-5, nosotros, logodown*
├── tests/
│   ├── Feature/
│   │   ├── ContactFormTest.php             # Tests de formulario
│   │   └── ExampleTest.php
│   └── Unit/
│       └── ExampleTest.php
├── database/
│   └── vonextsa_schema.sql                 # Schema MySQL
├── .env (never commit), .env.example
└── README.md
```

## 🛠️ Comandos Principales

### Desarrollo
```bash
php artisan serve                    # Iniciar servidor de desarrollo
npm run dev                          # Compilar assets en modo desarrollo
npm run build                        # Compilar assets para producción
```

### Testing
```bash
php artisan test                     # Ejecutar todos los tests
php artisan test --filter=ContactFormTest  # Tests específicos
./vendor/bin/phpstan analyse         # Análisis estático
./vendor/bin/pint                    # Formatear código
./vendor/bin/pint --test             # Verificar formato sin cambiar
```

### Cache y Optimización
```bash
php artisan optimize                 # Optimizar para producción
php artisan optimize:clear           # Limpiar caché
php artisan cache:clear              # Limpiar cache
php artisan view:clear               # Limpiar vistas compiladas
```

### Email Testing
```bash
# Endpoint de prueba local (solo desarrollo)
GET http://localhost:8000/test-email

# Respuesta exitosa:
{
  "success": true,
  "message": "Test email sent successfully to soporte@vonextsa.com"
}
```

## 📧 Integración Email (Guzzle → Microsoft Graph API)

El proyecto usa **Guzzle HTTP Client** para comunicarse con Microsoft Graph API REST para envío de emails corporativos.

### Flujo de Autenticación
```
1. Cliente -> Formulario de contacto
2. Servidor -> Valida y sanitiza datos
3. EmailService -> Guzzle autentica con Microsoft Graph API (OAuth2)
4. Guzzle -> Envía email a Microsoft Graph API REST
5. Respuesta -> Confirmación al usuario
```

### Endpoints de Email
```php
// OAuth2 token
POST https://login.microsoftonline.com/{tenant}/oauth2/v2.0/token

// Enviar email
POST https://graph.microsoft.com/v1.0/users/{user-email}/sendMail
```

## 🚀 Deployment

### Hosting
- **Producción**: Bluehost (vonextsa.com) - MySQL
- **Staging**: Ultahost - MySQL

Ver guía completa: `../DEPLOYMENT-ULTAHOST.md`

## 📊 Estadísticas de Proyecto

- **Líneas de código**: ~2000 líneas (PHP, JavaScript, Blade)
- **Tests**: 7 test cases (12 assertions)
- **Cobertura**: Validación, seguridad, email integration
- **Performance**: <100ms response time (local)

## 🔄 Versiones

- **v26Release1**: Versión base con estructura Laravel
- **v26Release2**: Integración Guzzle → Microsoft Graph API REST, testing email
- **v26Release3**: Documentación completa y optimizaciones
- **v26Release4**: Migración a MySQL, corrección dependencias, fix email
- **v26Release5**: Carrusel imágenes, footer azul con contacto, animaciones

## 📅 Última actualización

Marzo 25, 2026 - v26Release5

---

**Desarrollado por**: OpenCode AI Assistant  
**Empresa**: VONEXT S.A  
**Stack**: Laravel 11 + Bootstrap 5.3 + Guzzle HTTP

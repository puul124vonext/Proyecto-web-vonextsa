# Guía de Deployment - Hosting Ultahost (Staging)

## Requisitos del Hosting

### Software Instalado
- PHP 8.2+ con extensiones: pdo_mysql, mbstring, openssl, curl, gd, zip
- MySQL 5.7+ o MariaDB 10.3+
- Apache con mod_rewrite habilitado
- Composer
- Node.js y npm (para build de assets)
- Acceso SSH

### Configuración de MySQL
- Crear base de datos: `vonextsa`
- Crear usuario con permisos completos sobre la base
- Charset: utf8mb4

## Pasos de Deployment

### 1. Conectar por SSH
```bash
ssh usuario@tu-dominio.com
```

### 2. Navegar al directorio público
```bash
cd /home/vonextsa/public_html
```

### 3. Clonar repositorio
```bash
git clone https://github.com/puul124vonext/Proyecto-web-vonextsa.git
cd Proyecto-web-vonextsa/vonextsa-web
```

### 4. Instalar dependencias
```bash
composer install --no-dev --optimize-autoloader
npm install
npm run build
```

### 5. Configurar archivo .env
```bash
cp .env.example .env
```

Editar `.env` con credenciales del hosting:
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://tu-dominio.com

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=vonextsa
DB_USERNAME=usuario_bd
DB_PASSWORD=password_bd

SESSION_DRIVER=file
CACHE_STORE=file
QUEUE_CONNECTION=sync

# Microsoft Graph API (credenciales)
MS_TENANT_ID=9bfa3daa-c4c3-4e31-9bfb-9b158cb559b2
MS_CLIENT_ID=fb23f572-a97f-4352-bb6d-d4e3157485d5
MS_CLIENT_SECRET=Wb38Q~hliJ4k8~xBhuZtknff9Z4LlCu0R4rf7ctI
MS_USER_EMAIL=paul.atiencia@vonextsa.com

MAIL_SENDER=paul.atiencia@vonextsa.com
MAIL_SOPORTE=soporte@vonextsa.com
MAIL_VENTAS=info@vonextsa.com
MAIL_INFO=info@vonextsa.com
```

### 6. Generar clave de aplicación
```bash
php artisan key:generate
```

### 7. Ejecutar migraciones
```bash
php artisan migrate --force
```

### 8. Optimizar para producción
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 9. Configurar permisos
```bash
chmod -R 755 storage bootstrap/cache
chown -R vonextsa:vonextsa storage bootstrap/cache
```

### 10. Configurar Apache
Asegurar que el DocumentRoot apunte a `public/`:
```
/home/vonextsa/public_html/Proyecto-web-vonextsa/vonextsa-web/public
```

Crear/verificar `.htaccess` en `public/`:
```apache
<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews -Indexes
    </IfModule>

    RewriteEngine On
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)/$ /$1 [L,R=301]
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>
```

### 11. Configurar SSL
Instalar certificado SSL (Let's Encrypt o certificado del hosting).

### 12. Verificar deployment
```bash
# Verificar que el sitio carga
curl -I https://tu-dominio.com

# Verificar conexión a base de datos
php artisan migrate:status

# Verificar logs
tail -f storage/logs/laravel.log
```

## Troubleshooting

### Error 500
- Verificar permisos de `storage/` y `bootstrap/cache/`
- Verificar que `.env` tiene APP_KEY configurado
- Revisar `storage/logs/laravel.log`

### Error de base de datos
- Verificar credenciales en `.env`
- Verificar que MySQL está corriendo
- Verificar que la base de datos existe

### Assets no cargan
- Ejecutar `npm run build`
- Verificar que `public/build/` existe
- Verificar permisos de archivos

## Rollback
```bash
git checkout main
git pull origin main
composer install --no-dev
php artisan migrate --force
php artisan config:cache
```

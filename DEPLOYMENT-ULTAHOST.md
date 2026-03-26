# Guía de Deployment - Hosting Ultahost (Staging)

## Datos de conexión

| Dato | Valor |
|------|-------|
| SSH usuario | `uugtkczm` |
| SSH IP | `198.54.132.28` |
| Dominio | `vonextnotifications6.com` |
| BD MySQL | `uugtkczm_vonextsa` |
| MySQL usuario | `uugtkczm_vonetxsa` |
| MySQL pass | `V0n3xts@1.!` |
| PHP | 8.4 |
| Git repo | `Vonextweb_prb` |
| Repo path | `/home/uugtkczm/Vonextweb_prb` |
| SSH key | `PaginaWeb.pub` (carpeta UltaHost) |

## Requisitos del Hosting (ya configurados)

- PHP 8.4 con extensiones: pdo_mysql, mbstring, openssl, curl, gd, zip
- MySQL (base: `uugtkczm_vonextsa`)
- Apache con mod_rewrite habilitado
- Composer
- Acceso SSH con llave pública

## Pasos de Deployment

### 1. Conectar por SSH
```bash
ssh -i UltaHost/PaginaWeb.pub uugtkczm@198.54.132.28
```

### 2. Navegar al directorio del repositorio
```bash
cd /home/uugtkczm/Vonextweb_prb
```

### 3. Pull último código desde GitHub
```bash
git pull origin main
```

### 4. Instalar dependencias
```bash
composer install --no-dev --optimize-autoloader
```

### 5. Configurar archivo .env
```bash
cp .env.example .env
nano .env
```

Configurar con estos valores:
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://vonextnotifications6.com

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=uugtkczm_vonextsa
DB_USERNAME=uugtkczm_vonetxsa
DB_PASSWORD=V0n3xts@1.!

SESSION_DRIVER=file
CACHE_STORE=file
QUEUE_CONNECTION=sync

# Microsoft Graph API (Guzzle OAuth2)
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
```

### 10. Configurar Apache (DocumentRoot)
Asegurar que el DocumentRoot apunte a `public/`:
```
/home/uugtkczm/Vonextweb_prb/vonextsa-web/public
```

### 11. Configurar SSL (si no está instalado)
Instalar certificado SSL desde cPanel de Ultahost o con Let's Encrypt.

### 12. Verificar deployment
```bash
# Verificar que el sitio carga
curl -I https://vonextnotifications6.com

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
- Verificar que la base de datos `uugtkczm_vonextsa` existe

### Assets no cargan
- Verificar permisos de archivos en `public/assets/img/`

### Error de SSL
- Verificar certificado SSL en cPanel de Ultahost

## Rollback
```bash
cd /home/uugtkczm/Vonextweb_prb
git checkout main
git pull origin main
composer install --no-dev
php artisan migrate --force
php artisan config:cache
```

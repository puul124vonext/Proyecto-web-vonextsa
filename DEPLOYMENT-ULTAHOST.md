# Guía de Deployment - Hosting Ultahost (cPanel)

## Datos de conexión

| Dato | Valor |
|------|-------|
| cPanel URL | https://vonextnotifications6.com:2083 |
| Dominio | `vonextnotifications6.com` |
| BD MySQL | `uugtkczm_vonextsa` |
| MySQL usuario | `uugtkczm_vonetxsa` |
| MySQL pass | `V0n3xts@1.!` |
| PHP | 8.4 |
| Git repo path | `/home/uugtkczm/web1` |
| GitHub repo | `https://github.com/puul124vonext/Proyecto-web-vonextsa.git` |

## Requisitos del Hosting (ya configurados)

- PHP 8.4 con extensiones: pdo_mysql, mbstring, openssl, curl, gd, zip
- MySQL (base: `uugtkczm_vonextsa`)
- Apache con mod_rewrite habilitado
- cPanel con Git Version Control habilitado

## Método de Deployment: cPanel Git Version Control

### Fase 1: Clonar repositorio (cPanel)

1. Acceder a cPanel → **Files** → **Git Version Control**
2. Click **Create** o **Clone**
3. Configurar:
   - Clone URL: `https://github.com/puul124vonext/Proyecto-web-vonextsa.git`
   - Repository Path: `/home/uugtkczm/web1`
   - Repository Name: `web1`
4. Click **Create**
5. Verificar que los archivos están en `/home/uugtkczm/web1`

### Fase 2: Subir dependencias (File Manager)

**En tu máquina local:**
```bash
cd "C:\Users\patiencia\Documents\VISUAL CODE\Proyecto-web-vonextsa\vonextsa-web"
composer install --no-dev --optimize-autoloader
```

**Subir al servidor:**
1. Comprimir carpeta `vendor/` en `vendor.zip`
2. cPanel → **File Manager** → `/home/uugtkczm/web1/vonextsa-web`
3. Click **Upload** → Subir `vendor.zip`
4. Click derecho en `vendor.zip` → **Extract**

### Fase 3: Configurar .env (File Manager)

1. En File Manager → `/home/uugtkczm/web1/vonextsa-web`
2. Click **File** → **New File** → Nombre: `.env`
3. Pegar contenido:

```env
APP_NAME=VonextSA
APP_ENV=production
APP_DEBUG=false
APP_URL=https://vonextnotifications6.com
APP_KEY=base64:GENERAR_CON_PHP_ARTISAN

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=uugtkczm_vonextsa
DB_USERNAME=uugtkczm_vonetxsa
DB_PASSWORD=V0n3xts@1.!

SESSION_DRIVER=file
CACHE_STORE=file
QUEUE_CONNECTION=sync

MS_TENANT_ID=9bfa3daa-c4c3-4e31-9bfb-9b158cb559b2
MS_CLIENT_ID=fb23f572-a97f-4352-bb6d-d4e3157485d5
MS_CLIENT_SECRET=Wb38Q~hliJ4k8~xBhuZtknff9Z4LlCu0R4rf7ctI
MS_USER_EMAIL=paul.atiencia@vonextsa.com

MAIL_SENDER=paul.atiencia@vonextsa.com
MAIL_SOPORTE=soporte@vonextsa.com
MAIL_VENTAS=info@vonextsa.com
MAIL_INFO=info@vonextsa.com
```

### Fase 4: Configurar dominio (cPanel)

1. cPanel → **Domains** → `vonextnotifications6.com`
2. Click en el dominio → **Manage**
3. Cambiar **Document Root** a:
   ```
   /home/uugtkczm/web1/vonextsa-web/public
   ```
4. Click **Update** o **Save**

### Fase 5: Configurar permisos (File Manager)

1. En File Manager → `/home/uugtkczm/web1/vonextsa-web`
2. Click derecho en carpeta `storage/` → **Change Permissions**
3. Establecer permisos a **755**
4. Repetir para carpeta `bootstrap/cache/`

### Fase 6: Verificar deployment

1. Abrir https://vonextnotifications6.com en navegador
2. Verificar que carga correctamente
3. Probar formulario de contacto
4. Si aparece error 500, revisar `storage/logs/laravel.log`

---

## Deployment futuro (automático)

Una vez configurado, para actualizaciones:

**En tu máquina local:**
```bash
git add -A
git commit -m "mensaje descriptivo"
git push origin main
```

**En cPanel:**
1. Ir a **Git Version Control**
2. Seleccionar repositorio `web1`
3. Click **Pull** o **Deploy** para actualizar

---

## Troubleshooting

### Error 500
- Verificar permisos de `storage/` y `bootstrap/cache/` (deben ser 755)
- Verificar que `.env` tiene `APP_KEY` configurado
- Revisar logs: File Manager → `storage/logs/laravel.log`

### Error de base de datos
- Verificar credenciales en `.env`
- Verificar que MySQL está corriendo
- Verificar que la base de datos `uugtkczm_vonextsa` existe

### Assets no cargan
- Verificar permisos de archivos en `public/assets/img/`
- Verificar que las imágenes están en `public/assets/img/`

### Error de SSL
- Verificar certificado SSL en cPanel → **SSL/TLS**
- Instalar Let's Encrypt si no está configurado

### APP_KEY no configurado
- Generar clave localmente: `php artisan key:generate --show`
- Copiar la clave y pegar en `.env` del servidor

---

## Rollback (cPanel Git)

1. En cPanel → **Git Version Control**
2. Seleccionar repositorio `web1`
3. Click **History** para ver commits anteriores
4. Seleccionar commit estable
5. Click **Deploy** para restaurar versión anterior

# AGENTS.md - Vonext Website Project

**Stack:** Laravel 11 + Bootstrap 5.3 + Microsoft Graph API + PHP 8.2+  
**Hosting:** Bluehost (production) / Ultahost (staging)

---

## 1. Build / Lint / Test Commands

```bash
composer install && npm install
php artisan serve                          # Dev server
php artisan test                           # Run all tests
php artisan test --filter=ContactFormTest  # Single test class
php artisan test --filter=ContactFormTest::test_contact_form_validation_requires_name
./vendor/bin/pint                          # Code style fix
./vendor/bin/pint --test                   # Check only
./vendor/bin/phpstan analyse               # Static analysis
php artisan optimize:clear                 # Clear caches
npm run build                              # Build frontend
php artisan mail:test                      # Test mail
```

---

## 2. Code Style Guidelines

### PHP (Laravel)
- **Strict types:** `declare(strict_types=1);` in all PHP files
- **Naming:** Classes `PascalCase`, Methods/Properties `camelCase`, Constants `UPPER_SNAKE_CASE`
- **Suffixes:** Controllers `*Controller.php`, Services `*Service.php`, Requests `*Request.php`
- **Imports:** Fully qualified class names, organized alphabetically
- **Return types:** Always specify including `void`

```php
<?php
declare(strict_types=1);
namespace App\Http\Controllers;
use App\Http\Requests\ContactRequest;
use App\Services\EmailService;
use Illuminate\Http\JsonResponse;

class ContactController extends Controller {
    public function __construct(private readonly EmailService $emailService) {}
    public function send(ContactRequest $request): JsonResponse { /* ... */ }
}
```

### Blade
- Use `{{-- comments --}}`, escape all output: `{{ $var }}` (never `{!! $var !!}`), use `@csrf`

### JavaScript (ES6+)
- No jQuery, use `const`/`let`, async/await, template literals, try/catch always

```javascript
form.addEventListener('submit', async (e) => {
    e.preventDefault();
    try {
        const res = await fetch(form.action, {
            method: 'POST', body: new FormData(form),
            headers: { 'X-CSRF-TOKEN': document.querySelector('[name="_token"]').value }
        });
    } catch (error) { console.error(error); }
});
```

### CSS
- CSS custom properties in `:root`, mobile-first `@media (min-width:...)`, BEM naming

---

## 3. Error Handling
- Wrap API calls in try/catch, log errors: `Log::error()`, never expose stack traces
- Use Laravel FormRequest for validation

---

## 4. Security Rules
- **NEVER** hardcode credentials - use `.env` only
- **ALWAYS** sanitize: `strip_tags()`, `filter_var()`
- **ALWAYS** validate client AND server
- Use CSRF tokens + rate limiting: `->middleware('throttle:3,10')`

---

## 5. Project Structure
```
vonextsa-web/
├── app/Http/Controllers/ContactController.php
├── app/Http/Requests/ContactRequest.php
├── app/Services/EmailService.php
├── config/mail.php, services.php
├── resources/views/layouts/app.blade.php, home.blade.php
├── routes/web.php
├── tests/Feature/ContactFormTest.php
├── public/css/styles.css, js/main.js
├── .env (never commit), .env.example
```

---

## 6. Environment Variables
```env
MS_TENANT_ID=
MS_CLIENT_ID=
MS_CLIENT_SECRET=
MAIL_SENDER=info@vonextsa.com
MAIL_SOPORTE=soporte@vonextsa.com
MAIL_VENTAS=info@vonextsa.com
MAIL_INFO=info@vonextsa.com
APP_KEY=
CSRF_SECRET=32-char-random-string
```

---

## 7. Git Workflow
- Branch: `V{Year}R{Release}#{Number}` (e.g., `V26R1`)
- Commit: imperative mood, past tense, always create new branch

---

## 8. Contact Form Rules
- Double validation: client (JS) + server (FormRequest)
- Rate limit: 3 sends / 10 min per IP
- Email routing by type: soporte/ventas/info → different destinations
- Microsoft Graph API POST /sendMail, OAuth2 client_credentials, token cached
- Sanitize all text input with `strip_tags()`

---

## 9. Skills & Docs
- `.opencode/skills/` - Project-specific skills
- `.opencode/commands/` - Custom commands
- `.opencode/prompts/` - Reusable prompts
- `PLAN-DE-IMPLEMENTACION.md` - Full implementation plan

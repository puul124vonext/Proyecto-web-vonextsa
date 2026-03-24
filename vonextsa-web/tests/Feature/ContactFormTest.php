<?php

declare(strict_types=1);

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

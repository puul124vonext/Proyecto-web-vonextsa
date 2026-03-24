<?php

declare(strict_types=1);

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::post('/contact/send', [ContactController::class, 'send'])
    ->name('contact.send')
    ->middleware('throttle:3,10');

// Development testing only
if (app()->isLocal()) {
    Route::get('/test-email', [ContactController::class, 'testEmail'])
        ->name('test.email');
}

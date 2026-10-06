<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\TicketController;

Route::view('/', 'welcome')->name('home');

// Rutas para el flujo de registro
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::get('/mail', [MailController::class, 'formulario'])->name('mail.formulario');
Route::post('/mail/enviar', [MailController::class, 'enviar'])->name('mail.enviar');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    
    Route::resource('tickets', TicketController::class)
        ->except(['destroy']);
    Route::patch(
        '/tickets/{ticket}/cerrar',
        [TicketController::class, 'cerrar']
    )->name('tickets.cerrar');
});

require __DIR__ . '/settings.php';

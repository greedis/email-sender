<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MailController;

Route::get('/', [MailController::class, 'index'])->name('home');
Route::get('/index.php', [MailController::class, 'index'])->name('home');
Route::post('/send', [MailController::class, 'send'])->name('send.email');
Route::get('/{uuid}/success', [MailController::class, 'success'])->name('email.success');

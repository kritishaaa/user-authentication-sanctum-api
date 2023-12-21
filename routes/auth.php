<?php

use App\Http\Controllers\Api\Auth\ForgotPasswordController;
use App\Http\Controllers\Api\Auth\ResetPasswordController;
use App\Http\Controllers\Api\Auth\SendEmailVerificationController;
use App\Http\Controllers\Api\Auth\VerifyEmailController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutController;
use Illuminate\Support\Facades\Route;

Route::post('/register', RegisterController::class)
                ->middleware('guest')
                ->name('register');


Route::post('/login', LoginController::class)
                ->middleware('guest')
                ->name('login');

Route::post('/logout', LogoutController::class)
                ->middleware('auth:sanctum')
                ->name('logout');
                
Route::get('/verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');
                
Route::post('/email/verification-notification', SendEmailVerificationController::class)
                ->middleware(['auth:sanctum', 'throttle:6,1'])
                ->name('verification.send');

Route::post('/forgot-password', ForgotPasswordController::class)
                ->middleware('guest')
                ->name('password.email');

Route::post('/reset-password', ResetPasswordController::class)
                ->middleware('guest')
                ->name('password.store');


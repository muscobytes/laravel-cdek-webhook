<?php

use Illuminate\Support\Facades\Route;
use Muscobytes\CdekWebhook\Http\Controllers\WebhookController;
use Muscobytes\CdekWebhook\Middleware\WebhookMiddleware;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::middleware(WebhookMiddleware::class)->post(
    config('cdek.webhook_url'), [ WebhookController::class, 'handle' ]
)->name('cdek.webhook');

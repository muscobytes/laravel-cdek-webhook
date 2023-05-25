<?php

namespace Muscobytes\CdekWebhook\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function handle(Request $request): JsonResponse
    {
        return response()->json([
            'result'    => 'true'
        ]);
    }
}

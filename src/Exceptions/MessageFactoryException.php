<?php

namespace Muscobytes\CdekWebhook\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;

class MessageFactoryException extends Exception
{
    public function __construct(
        string $message,
        int $code = 0,
        ?Exception $previous = null
    ) {
        Log::error($message, [
            'code' => $code,
            'previous' => $previous
        ]);
        parent::__construct($message, $code, $previous);
    }
}
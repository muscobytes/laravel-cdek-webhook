<?php

namespace Muscobytes\CdekWebhook\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;

class MessageFactoryException extends Exception
{
    public function __construct(
        protected  $message,
        protected $code = 0,
        protected ?Exception $previous = null
    ) {
        Log::error($message, [
            'code' => $code,
            'previous' => $previous
        ]);
        parent::__construct($message, $code, $previous);
    }
}
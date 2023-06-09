<?php

namespace Muscobytes\CdekWebhook\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Muscobytes\CdekWebhook\Messages\PrintFormMessage;

class PrintFormEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(
        public PrintFormMessage $message
    )
    {
        //
    }

    public function getMessage(): PrintFormMessage
    {
        return $this->message;
    }
}
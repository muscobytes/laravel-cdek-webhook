<?php

namespace Muscobytes\CdekWebhook\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Muscobytes\CdekWebhook\Messages\PrealertClosedMessage;

class PrealertClosedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(
        public PrealertClosedMessage $message
    )
    {
        //
    }

    public function getMessage(): PrealertClosedMessage
    {
        return $this->message;
    }
}
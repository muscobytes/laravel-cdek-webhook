<?php

namespace Muscobytes\CdekWebhook\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Muscobytes\CdekWebhook\Messages\DownloadPhotoMessage;

class DownloadPhotoEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(
        public DownloadPhotoMessage $message
    )
    {
        //
    }

    public function getMessage(): DownloadPhotoMessage
    {
        return $this->message;
    }
}
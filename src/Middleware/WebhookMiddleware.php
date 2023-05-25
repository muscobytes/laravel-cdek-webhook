<?php

namespace Muscobytes\CdekWebhook\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Muscobytes\CdekWebhook\Events\DownloadPhotoEvent;
use Muscobytes\CdekWebhook\Events\OrderStatusEvent;
use Muscobytes\CdekWebhook\Events\PrealertClosedEvent;
use Muscobytes\CdekWebhook\Events\PrintFormEvent;
use Muscobytes\CdekWebhook\Exceptions\CdekWebhookException;
use Muscobytes\CdekWebhook\Exceptions\MessageFactoryException;
use Muscobytes\CdekWebhook\MessageFactory;
use Muscobytes\CdekWebhook\Messages\DownloadPhotoMessage;
use Muscobytes\CdekWebhook\Messages\OrderStatusMessage;
use Muscobytes\CdekWebhook\Messages\PrealertClosedMessage;
use Muscobytes\CdekWebhook\Messages\PrintFormMessage;
use Spatie\LaravelData\Data;
use Symfony\Component\HttpFoundation\Response;

class WebhookMiddleware
{
    private array $events = [
        OrderStatusMessage::class   => OrderStatusEvent::class,
        DownloadPhotoMessage::class => DownloadPhotoEvent::class,
        PrealertClosedMessage::class => PrealertClosedEvent::class,
        PrintFormMessage::class => PrintFormEvent::class
    ];


    public function __construct(
    )
    {
        //
    }


    /**
     * @throws CdekWebhookException
     */
    public function handle(
        Request $request,
        Closure $next
    ): Response
    {
        try {
            $message = MessageFactory::create($request);
            Log::debug('Event message', [ $message ]);
            $request->merge([
                'cdek_event_type' => $message->type
            ]);
        } catch (MessageFactoryException $e) {
            throw new CdekWebhookException('Message type error', 400, $e);
        }

        $this->dispatchEvent($message);

        return $next($request);
    }


    /**
     * @throws CdekWebhookException
     */
    private function dispatchEvent(Data $message): void
    {
        $class_name = get_class($message);
        if (!key_exists($class_name, $this->events)) {
            throw new CdekWebhookException("Unable to find event for message ({$class_name})");
        }
        event(new $this->events[$class_name]($message));
    }
}
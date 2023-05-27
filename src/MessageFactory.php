<?php

namespace Muscobytes\CdekWebhook;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Muscobytes\CdekWebhook\Exceptions\MessageFactoryException;
use Muscobytes\CdekWebhook\Messages\DownloadPhotoMessage;
use Muscobytes\CdekWebhook\Messages\OrderStatusMessage;
use Muscobytes\CdekWebhook\Messages\PrealertClosedMessage;
use Muscobytes\CdekWebhook\Messages\PrintFormMessage;
use \Exception;
use Spatie\LaravelData\Data;

class MessageFactory
{
    public static array $events = [
        'ORDER_STATUS'      => OrderStatusMessage::class,
        'PRINT_FORM'        => PrintFormMessage::class,
        'DOWNLOAD_PHOTO'    => DownloadPhotoMessage::class,
        'PREALERT_CLOSED'   => PrealertClosedMessage::class,
    ];


    /**
     * @throws MessageFactoryException
     */
    public static function create(Request $request): Data
    {
        $data = self::fromRequest($request);
        $class_name = self::$events[$data['type']];
        try {
            return $class_name::validateAndCreate($data);
        } catch (Exception $e) {
            throw new MessageFactoryException('Message type error', 400, $e);
        }
    }


    /**
     * @throws MessageFactoryException
     */
    public static function fromRequest(Request $request): array
    {
        $content = $request->getContent();
        Log::debug('Request body', [ $content ]);

        $body = json_decode($content, true);
        Log::debug('Decoded request body', [ $body ]);

        if (!is_array($body)) {
            throw new MessageFactoryException('Request body contents must be a JSON structure', 400);
        }

        if (!key_exists('type', $body)) {
            throw new MessageFactoryException('Required property is missing (message_type)', 400);
        }

        if (!key_exists($body['type'], self::$events)) {
            throw new MessageFactoryException("Illegal EventType code: {$body['type']}", 400);
        }

        return $body;
    }
}
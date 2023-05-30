<?php

namespace Muscobytes\CdekWebhook\Tests\Feature;

use Muscobytes\CdekWebhook\Events\DownloadPhotoEvent;
use Muscobytes\CdekWebhook\Events\OrderStatusEvent;
use Muscobytes\CdekWebhook\Events\PrealertClosedEvent;
use Muscobytes\CdekWebhook\Events\PrintFormEvent;
use Muscobytes\CdekWebhook\Messages\DownloadPhotoMessage;
use Muscobytes\CdekWebhook\Messages\OrderStatusMessage;
use Muscobytes\CdekWebhook\Messages\PrealertClosedMessage;
use Muscobytes\CdekWebhook\Messages\PrintFormMessage;
use Muscobytes\CdekWebhook\Tests\TestCase;
use Illuminate\Support\Facades\Event;
use Spatie\LaravelData\Data;

class EventsDispatchedTest extends TestCase
{
    /**
     * @test
     * @dataProvider events_data_provider
     */
    public function test_is_event_dispatched(string $eventClass, string $messageClass, array $payload): void
    {
        Event::fake();
        $response = $this->postJson( route('cdek.webhook'), $payload );
        $response->assertStatus(200);
        $response->assertContent(json_encode([
            'result'    => 'true'
        ]));
        Event::assertDispatched($eventClass, function ($event) use ($payload, $messageClass) {
            $this->assertObjectHasProperty('type', $event->message);
            $this->assertEquals($payload['type'], $event->message->type);
            $this->assertInstanceOf($messageClass, $event->message);
            return true;
        });
    }


    public static function events_data_provider(): array
    {
        return [
            [
                'event'         => OrderStatusEvent::class,
                'message'       => OrderStatusMessage::class,
                'payload'       => [
                    'type'          => 'ORDER_STATUS',
                    'date_time'     => '2020-08-10T21:32:14+0700',
                    'uuid'          => '72753031-2801-4186-a091-0be58cedfee7',
                    'attributes'    => [
                        'is_return'             => false,
                        'is_reverse'            => false,
                        'is_client_return'      => false,
                        'cdek_number'           => '1106321645',
                        'code'                  => 'RECEIVED_AT_SHIPMENT_WAREHOUSE',
                        'status_code'           => '3',
                        'status_date_time'      => '2020-08-10T21:32:12+0700',
                        'city_name'             => 'Новосибирск',
                        'city_code'             => '270'
                    ]
                ]
            ],
            [
                'event'         => DownloadPhotoEvent::class,
                'message'       => DownloadPhotoMessage::class,
                'payload'       => [
                    'type'          => 'DOWNLOAD_PHOTO',
                    'date_time'     => '2022-03-21T15:14:32+0700',
                    'uuid'          => '72753031-6417-44d2-8c0d-649a1d4b4721',
                    'attributes'    => [
                        'cdek_number'           => '1107807766',
                        'link'                  => "https://photo-docs.production.cdek.ru/archives/uyDZmEEh",
                    ]
                ]
            ],
            [
                'event'         => PrealertClosedEvent::class,
                'message'       => PrealertClosedMessage::class,
                'payload'       => [
                    'type'          => 'PREALERT_CLOSED',
                    'date_time'     => '2023-01-23T10:20:02+0000',
                    'uuid'          => '72753031-a1d3-4266-bc9f-8052f0fc3b2c',
                    'attributes'    => [
                        'prealert_number'       => 'PA/7/583',
                        'closed_date'           => '2023-01-17T07:59:18+0000',
                        'fact_shipment_point'   => 'NSK1'
                    ]
                ]
            ],
            [
                'event'         => PrintFormEvent::class,
                'message'       => PrintFormMessage::class,
                'payload'       => [
                    'type'          => 'PRINT_FORM',
                    'date_time'     => '2019-07-11T13:07:34+0700',
                    'uuid'          => '72753031-8347-40c0-ab0f-1a49c7a262c1',
                    'attributes'    => [
                        'type'                  => 'barcode',
                        'url'                   => 'https://api.cdek.ru/v2/print/barcodes/{uuid}.pdf'
                    ]
                ]
            ]
        ];
    }
}
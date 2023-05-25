<?php

namespace Muscobytes\CdekWebhook\Tests\Feature;

use Muscobytes\CdekWebhook\Events\OrderStatusEvent;
use Muscobytes\CdekWebhook\Messages\OrderStatusMessage;
use Muscobytes\CdekWebhook\Tests\TestCase;
use Illuminate\Support\Facades\Event;

class EventsDispatchedTest extends TestCase
{
    /**
     * @test
     * @dataProvider events_data_provider
     */
    public function test_is_event_dispatched($eventClass, $messageClass, array $payload): void
    {
        Event::fake();
        $response = $this->postJson( route('cdek.webhook'), $payload );
        $response->assertStatus(200);
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
                'payload'       =>
                [
                    'type'          => 'ORDER_STATUS',
                    'date_time'     => '2020-08-10T21:32:14+0700',
                    'uuid'          => '72753031-2801-4186-a091-0be58cedfee7',
                    'attributes'    =>
                    [
                        'is_return'         => false,
                        'is_reverse'        => false,
                        'is_client_return'  => false,
                        'cdek_number'       => '1106321645',
                        'code'              => 'RECEIVED_AT_SHIPMENT_WAREHOUSE',
                        'status_code'       => '3',
                        'status_date_time'  => '2020-08-10T21:32:12+0700',
                        'city_name'         => 'Новосибирск',
                        'city_code'         => '270'
                    ]
                ]
            ]
        ];
    }
}
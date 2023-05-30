<?php

namespace Muscobytes\CdekWebhook\Tests\Feature\Messages;

use Muscobytes\CdekWebhook\Exceptions\CdekWebhookException;
use Muscobytes\CdekWebhook\Messages\OrderStatusMessage;
use Muscobytes\CdekWebhook\Tests\TestCase;

class OrderStatusMessageTest extends TestCase
{
    /**
     * @test
     * @dataProvider order_status_message_data_provider
     */
    public function test_create_order_status_message(array $data)
    {
        $orderStatusMessage = OrderStatusMessage::from($data);
        $this->assertEquals($data['type'], $orderStatusMessage->type);
    }


    public static function order_status_message_data_provider(): array
    {
        return [
            [
                [
                    'type'          => 'ORDER_STATUS',
                    'date_time'     => '2020-08-10T21:32:14+0700',
                    'uuid'          => '72753031-2801-4186-a091-0be58cedfee7',
                    'attributes'    => [
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
            ],
        ];
    }


    public function test_illegal_event_type()
    {
        $payload = [
            'type'          => 'ILLEGAL_TYPE',
            'date_time'     => '2019-07-11T13:07:34+0700',
            'uuid'          => '72753031-2801-4186-a091-0be58cedfee7',
            'attributes'    => []
        ];
        $this->expectException(CdekWebhookException::class);
        $response = $this->postJson( route('cdek.webhook'), $payload );
        $response->assertStatus(200);
        $response->assertContent(json_encode([
            'result'    => 'true'
        ]));
    }

}
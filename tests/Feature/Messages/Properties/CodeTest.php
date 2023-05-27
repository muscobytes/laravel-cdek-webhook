<?php

namespace Muscobytes\CdekWebhook\Tests\Feature\Messages\Properties;

use BadMethodCallException;
use Muscobytes\CdekWebhook\Messages\Properties\Code;
use Muscobytes\CdekWebhook\Tests\TestCase;

class CodeTest extends TestCase
{
    /**
     * @test
     * @dataProvider legal_status_code_data_provider
     */
    public function test_legal_status_code_creates_object(string $value)
    {
        $status_code = Code::from($value);
        $this->assertEquals($value, $status_code->value);
    }


    public static function legal_status_code_data_provider(): array
    {
        return [
            ['CREATED'],
            ['REMOVED'],
            ['RECEIVED_AT_SHIPMENT_WAREHOUSE'],
            ['DELIVERED'],
            ['NOT_DELIVERED'],
            ['READY_TO_SHIP_AT_SENDING_OFFICE'],
            ['PASSED_TO_CARRIER_AT_SENDING_OFFICE'],
            ['SEND_TO_RECIPIENT_OFFICE'],
            ['ACCEPTED_AT_DELIVERY_WAREHOUSE'],
            ['ISSUED_FOR_DELIVERY'],
            ['ACCEPTED_AT_WAREHOUSE_ON_DEMAND'],
            ['ACCEPTED_TO_OFFICE_TRANSIT_WAREHOUSE'],
            ['RETURNED_TO_SENDER_WAREHOUSE'],
            ['RETURNED_TO_TRANSIT_WAREHOUSE'],
            ['RETURNED_TO_DELIVERY_WAREHOUSE'],
            ['READY_TO_SHIP_IN_TRANSIT_OFFICE'],
            ['PASSED_TO_CARRIER_AT_TRANSIT_OFFICE'],
            ['SEND_TO_TRANSIT_OFFICE'],
            ['MET_AT_TRANSIT_OFFICE'],
            ['SEND_TO_SENDING_OFFICE'],
            ['MET_AT_SENDING_OFFICE'],
            ['ENTERED_TO_OFFICE_TRANSIT_WAREHOUSE'],
            ['ENTERED_TO_DELIVERY_WAREHOUSE'],
            ['ENTERED_TO_WAREHOUSE_ON_DEMAND'],
            ['IN_CUSTOMS_INTERNATIONAL'],
            ['SHIPPED_TO_DESTINATION'],
            ['PASSED_TO_TRANSIT_CARRIER'],
            ['IN_CUSTOMS_LOCAL'],
            ['CUSTOMS_COMPLETE'],
            ['POSTOMAT_POSTED'],
            ['POSTOMAT_SEIZED'],
            ['POSTOMAT_RECEIVED'],
            ['READY_FOR_SHIPMENT_IN_SENDER_CITY'],
            ['TAKEN_BY_TRANSPORTER_FROM_SENDER_CITY'],
            ['SENT_TO_TRANSIT_CITY'],
            ['ACCEPTED_IN_TRANSIT_CITY'],
            ['ACCEPTED_AT_TRANSIT_WAREHOUSE'],
            ['TAKEN_BY_TRANSPORTER_FROM_TRANSIT_CITY'],
            ['SENT_TO_RECIPIENT_CITY'],
            ['ACCEPTED_IN_RECIPIENT_CITY'],
            ['ACCEPTED_AT_PICK_UP_POINT'],
            ['TAKEN_BY_COURIER'],
            ['RETURNED_TO_RECIPIENT_CITY_WAREHOUSE'],
            ['ACCEPTED_AT_RECIPIENT_CITY_WAREHOUSE'],
        ];
    }


    /**
     * @test
     * @dataProvider illegal_status_code_data_provider
     */
    public function test_illegal_status_code_caused_exception(string $value)
    {
        $this->expectException(BadMethodCallException::class);
        Code::from($value);
    }

    public static function illegal_status_code_data_provider(): array
    {
        return [
            ['ILLEGAL_STATUS']
        ];
    }


}
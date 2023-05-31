<?php

namespace Muscobytes\CdekWebhook\Tests\Feature\Messages\Properties;

use BadMethodCallException;
use Muscobytes\CdekWebhook\Messages\Properties\Type;
use Muscobytes\CdekWebhook\Tests\TestCase;


class TypeTest extends TestCase
{
    /**
     * @test
     * @dataProvider legal_type_data_provider
     */
    public function test_legal_event_type_creates_object($value)
    {
        $state = Type::from($value);
        $this->assertEquals($value, $state->value);
    }


    /**
     * @test
     * @dataProvider illegal_type_data_provider
     */
    public function test_illegal_event_type_caused_exception(string $value)
    {
        $this->expectException(BadMethodCallException::class);
        Type::from($value);
    }


    public static function legal_type_data_provider(): array
    {
        return [
            ['ORDER_STATUS'],
            ['PRINT_FORM'],
            ['DOWNLOAD_PHOTO'],
            ['PREALERT_CLOSED'],
        ];
    }


    public static function illegal_type_data_provider(): array
    {
        return [
            ['ILLEGAL_EVENT_TYPE']
        ];
    }
}
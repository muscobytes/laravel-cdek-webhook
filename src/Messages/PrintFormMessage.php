<?php

namespace Muscobytes\CdekWebhook\Messages;

use Carbon\Carbon;
use Muscobytes\CdekWebhook\Messages\Properties\PrintFormAttributes;
use Muscobytes\CdekWebhook\Messages\Properties\Type;
use Spatie\LaravelData\Data;

class PrintFormMessage extends Data
{
    public function __construct(
        public Type $type,

        public Carbon $date_time,

        public string $uuid,

        public PrintFormAttributes $attributes
    )
    {
        //
    }
}
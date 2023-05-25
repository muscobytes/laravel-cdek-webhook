<?php

namespace Muscobytes\CdekWebhook\Messages;

use Carbon\Carbon;
use Muscobytes\CdekWebhook\Messages\Properties\PrealertClosedAttributes;
use Muscobytes\CdekWebhook\Messages\Properties\Type;
use Spatie\LaravelData\Data;

class PrealertClosedMessage extends Data
{
    public function __construct(
        public Type $type,

        public Carbon $date_time,

        public string $uuid,

        public PrealertClosedAttributes $attributes
    )
    {
        //
    }

}
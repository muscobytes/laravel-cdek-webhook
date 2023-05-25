<?php

namespace Muscobytes\CdekWebhook\Messages\Properties;

use Carbon\Carbon;
use Spatie\LaravelData\Data;

class PrealertClosedAttributes extends Data
{
    public function __construct(
        public string $prealert_number,

        public Carbon $closed_date,

        public string $fact_shipment_point
    )
    {
    }
}
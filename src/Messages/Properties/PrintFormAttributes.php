<?php

namespace Muscobytes\CdekWebhook\Messages\Properties;

use Spatie\LaravelData\Attributes\Validation\In;
use Spatie\LaravelData\Data;

class PrintFormAttributes extends Data
{
    public function __construct(
        #[In('waybill','receipt','barcode')]
        public string $type,

        public string $url
    )
    {
        //
    }
}
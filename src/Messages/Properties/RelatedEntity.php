<?php

namespace Muscobytes\CdekWebhook\Messages\Properties;

use Spatie\LaravelData\Attributes\Validation\In;
use Spatie\LaravelData\Data;

class RelatedEntity extends Data
{
    public function __construct(
        #[In(['direct_order','client_direct_order'])]
        public string $type,

        public string $cdek_number,

        public string $uuid
    )
    {

    }
}
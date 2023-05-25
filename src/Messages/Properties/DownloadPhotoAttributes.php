<?php

namespace Muscobytes\CdekWebhook\Messages\Properties;

use Spatie\LaravelData\Data;

class DownloadPhotoAttributes extends Data
{
    public function __construct(
        public string $cdek_number,

        public string $link
    )
    {
        //
    }
}
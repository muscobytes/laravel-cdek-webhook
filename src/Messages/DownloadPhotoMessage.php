<?php

namespace Muscobytes\CdekWebhook\Messages;

use Carbon\Carbon;
use Muscobytes\CdekWebhook\Messages\Properties\DownloadPhotoAttributes;
use Muscobytes\CdekWebhook\Messages\Properties\Type;

class DownloadPhotoMessage
{
    public function __construct(
        public Type $type,

        public Carbon $date_time,

        public string $uuid,

        public DownloadPhotoAttributes $attributes
    )
    {
        //
    }
}
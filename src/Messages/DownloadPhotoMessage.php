<?php

namespace Muscobytes\CdekWebhook\Messages;

use Carbon\Carbon;
use Muscobytes\CdekWebhook\Messages\Casts\TypeCast;
use Muscobytes\CdekWebhook\Messages\Properties\DownloadPhotoAttributes;
use Muscobytes\CdekWebhook\Messages\Properties\Type;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;

class DownloadPhotoMessage extends Data
{
    public function __construct(
        #[WithCast(TypeCast::class)]
        public Type $type,

        public Carbon $date_time,

        public string $uuid,

        public DownloadPhotoAttributes $attributes
    )
    {
        //
    }
}
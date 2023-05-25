<?php

namespace Muscobytes\CdekWebhook\Messages\Casts;

use Muscobytes\CdekWebhook\Messages\Properties\Code;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\DataProperty;

class CodeCast implements Cast
{
    public function cast(DataProperty $property, mixed $value, array $context): Code
    {
        return Code::from($value);
    }
}
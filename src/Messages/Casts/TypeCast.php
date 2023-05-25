<?php

namespace Muscobytes\CdekWebhook\Messages\Casts;

use Muscobytes\CdekWebhook\Messages\Properties\Type;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\DataProperty;

class TypeCast implements Cast
{
    public function cast(DataProperty $property, mixed $value, array $context): Type
    {
        return Type::from($value);
    }
}
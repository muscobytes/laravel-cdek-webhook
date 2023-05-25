<?php //declare(strict_types=1);

namespace Muscobytes\CdekWebhook\Messages\Properties;

use Carbon\Carbon;
use Muscobytes\CdekWebhook\Messages\Casts\CodeCast;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\Validation\Enum;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class OrderStatusAttributes extends Data
{
    public function __construct(
        public bool $is_return,

        public string $cdek_number,

        public ?string $number,

        public int $status_code,

        #[Max(27)]
        public ?int $status_reason_code,

        public Carbon $status_date_time,

        public ?string $city_code,

        #[WithCast(CodeCast::class)]
        public Code $code,

        public bool $is_reverse,

        public bool $is_client_return,

        #[DataCollectionOf(RelatedEntity::class)]
        public ?DataCollection $related_entities
    )
    {
        //
    }
}
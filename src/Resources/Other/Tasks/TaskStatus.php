<?php
declare(strict_types=1);

namespace Bexio\Resources\Other\Tasks;

use Spatie\LaravelData\Data;

class TaskStatus extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
    ) {
    }
}

<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales;

use Spatie\LaravelData\Data;

class DocumentCopyPayload extends Data
{
    public function __construct(
        public ?int $contact_id = null,
        public ?int $contact_sub_id = null,
        public ?string $is_valid_from = null,
        public ?int $pr_project_id = null,
        public ?string $title = null,
    ) {
    }

    public function toPayload(): array
    {
        return array_filter($this->toArray(), static fn (mixed $value): bool => $value !== null);
    }
}

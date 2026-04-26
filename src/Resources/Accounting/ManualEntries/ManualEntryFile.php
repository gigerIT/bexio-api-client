<?php
declare(strict_types=1);

namespace Bexio\Resources\Accounting\ManualEntries;

use Spatie\LaravelData\Data;

class ManualEntryFile extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $uuid = null,
        public ?string $name = null,
        public ?string $mime_type = null,
        public ?int $size_in_bytes = null,
        public ?string $download_url = null,
    ) {
    }
}

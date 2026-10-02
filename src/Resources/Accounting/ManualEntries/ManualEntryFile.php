<?php
declare(strict_types=1);

namespace Bexio\Resources\Accounting\ManualEntries;

use Spatie\LaravelData\Data;

class ManualEntryFile extends Data
{
    public ?string $created_at = null;
    public ?string $extension = null;
    public ?bool $is_archived = null;
    public ?bool $is_referenced = null;
    /** @deprecated The API no longer uses this identifier. */
    public ?int $source_id = null;
    public ?string $source_type = null;
    public ?string $uploader_email = null;
    public ?int $user_id = null;
    public ?string $data = null;

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

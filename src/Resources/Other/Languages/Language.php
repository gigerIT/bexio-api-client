<?php
declare(strict_types=1);

namespace Bexio\Resources\Other\Languages;

use Bexio\Resources\Other\Languages\Requests\GetLanguagesRequest;
use Bexio\Resources\Resource;

class Language extends Resource
{
    public const INDEX_REQUEST = GetLanguagesRequest::class;

    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
        public ?string $decimal_point = null,
        public ?string $thousands_separator = null,
        public ?int $date_format_id = null,
        public ?string $date_format = null,
        public ?string $iso_639_1 = null,
    ) {
    }
}


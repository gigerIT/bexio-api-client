<?php

declare(strict_types=1);

namespace Bexio\Resources\Other\Countries;

use Bexio\Resources\Other\Countries\Requests\GetCountriesRequest;
use Bexio\Resources\Other\Countries\Requests\GetCountryRequest;
use Bexio\Resources\Resource;

class Country extends Resource
{
    public const INDEX_REQUEST = GetCountriesRequest::class;

    public const SHOW_REQUEST = GetCountryRequest::class;

    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
        public ?string $name_short = null,
        public ?string $iso3166_alpha2 = null,
    ) {}
}

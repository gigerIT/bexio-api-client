<?php
declare(strict_types=1);

namespace Bexio\Resources\Other\Countries;

use Bexio\Resources\Other\Countries\Requests\CreateCountryRequest;
use Bexio\Resources\Other\Countries\Requests\DeleteCountryRequest;
use Bexio\Resources\Other\Countries\Requests\GetCountriesRequest;
use Bexio\Resources\Other\Countries\Requests\GetCountryRequest;
use Bexio\Resources\Other\Countries\Requests\UpdateCountryRequest;
use Bexio\Resources\Resource;

/**
 * @method CountryQueryBuilder query()
 */
class Country extends Resource
{
    public const INDEX_REQUEST = GetCountriesRequest::class;
    public const QUERY_BUILDER = CountryQueryBuilder::class;
    public const SHOW_REQUEST = GetCountryRequest::class;
    public const CREATE_REQUEST = CreateCountryRequest::class;
    public const UPDATE_REQUEST = UpdateCountryRequest::class;
    public const DELETE_REQUEST = DeleteCountryRequest::class;

    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
        public ?string $name_short = null,
        public ?string $iso3166_alpha2 = null,
    ) {
    }

    public function toApi(): Country
    {
        return $this->except('id');
    }
}


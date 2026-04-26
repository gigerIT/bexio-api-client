<?php
declare(strict_types=1);

namespace Bexio\Resources\Other\Units;

use Bexio\Resources\Other\Units\Requests\CreateUnitRequest;
use Bexio\Resources\Other\Units\Requests\DeleteUnitRequest;
use Bexio\Resources\Other\Units\Requests\GetUnitRequest;
use Bexio\Resources\Other\Units\Requests\GetUnitsRequest;
use Bexio\Resources\Other\Units\Requests\UpdateUnitRequest;
use Bexio\Resources\Resource;

/**
 * @method UnitQueryBuilder query()
 */
class Unit extends Resource
{
    public const INDEX_REQUEST = GetUnitsRequest::class;
    public const QUERY_BUILDER = UnitQueryBuilder::class;
    public const SHOW_REQUEST = GetUnitRequest::class;
    public const CREATE_REQUEST = CreateUnitRequest::class;
    public const UPDATE_REQUEST = UpdateUnitRequest::class;
    public const DELETE_REQUEST = DeleteUnitRequest::class;

    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
    ) {
    }

    public function toApi(): Unit
    {
        return $this->except('id');
    }
}


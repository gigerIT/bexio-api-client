<?php
declare(strict_types=1);

namespace Bexio\Resources\Projects\BusinessActivities;

use Bexio\Resources\Projects\BusinessActivities\Requests\CreateBusinessActivityRequest;
use Bexio\Resources\Projects\BusinessActivities\Requests\GetBusinessActivitiesRequest;
use Bexio\Resources\Projects\BusinessActivities\Requests\GetBusinessActivityRequest;
use Bexio\Resources\Resource;

/**
 * @method BusinessActivityQueryBuilder query()
 */
class BusinessActivity extends Resource
{
    public const INDEX_REQUEST = GetBusinessActivitiesRequest::class;
    public const SHOW_REQUEST = GetBusinessActivityRequest::class;
    public const CREATE_REQUEST = CreateBusinessActivityRequest::class;
    public const QUERY_BUILDER = BusinessActivityQueryBuilder::class;

    public function __construct(
        public string $name,
        public ?int $id = null,
        public ?bool $default_is_billable = null,
        public ?float $default_price_per_hour = null,
        public ?int $account_id = null,
    ) {
    }
}


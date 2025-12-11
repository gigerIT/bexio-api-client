<?php
declare(strict_types=1);

namespace Bexio\Resources\Projects\CommunicationTypes;

use Bexio\Resources\Projects\CommunicationTypes\Requests\GetCommunicationTypeRequest;
use Bexio\Resources\Projects\CommunicationTypes\Requests\GetCommunicationTypesRequest;
use Bexio\Resources\Resource;

/**
 * @method CommunicationTypeQueryBuilder query()
 */
class CommunicationType extends Resource
{
    public const INDEX_REQUEST = GetCommunicationTypesRequest::class;
    public const SHOW_REQUEST = GetCommunicationTypeRequest::class;
    public const QUERY_BUILDER = CommunicationTypeQueryBuilder::class;

    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
    ) {
    }
}



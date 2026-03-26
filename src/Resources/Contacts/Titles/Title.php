<?php

declare(strict_types=1);

namespace Bexio\Resources\Contacts\Titles;

use Bexio\Resources\Contacts\Titles\Requests\CreateTitleRequest;
use Bexio\Resources\Contacts\Titles\Requests\DeleteTitleRequest;
use Bexio\Resources\Contacts\Titles\Requests\GetTitleRequest;
use Bexio\Resources\Contacts\Titles\Requests\GetTitlesRequest;
use Bexio\Resources\Contacts\Titles\Requests\UpdateTitleRequest;
use Bexio\Resources\Resource;

/**
 * @method TitleQueryBuilder query()
 */
class Title extends Resource
{
    const INDEX_REQUEST = GetTitlesRequest::class;

    const SHOW_REQUEST = GetTitleRequest::class;

    const CREATE_REQUEST = CreateTitleRequest::class;

    const UPDATE_REQUEST = UpdateTitleRequest::class;

    const DELETE_REQUEST = DeleteTitleRequest::class;

    const QUERY_BUILDER = TitleQueryBuilder::class;

    public function __construct(
        public string $name,
        public ?int $id = null,
    ) {}
}

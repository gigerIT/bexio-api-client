<?php
declare(strict_types=1);

namespace Bexio\Resources\Projects\Projects;

use Bexio\BexioClient;
use Bexio\Resources\Projects\Projects\Requests\ArchiveProjectRequest;
use Bexio\Resources\Projects\Projects\Requests\CreateProjectRequest;
use Bexio\Resources\Projects\Projects\Requests\DeleteProjectRequest;
use Bexio\Resources\Projects\Projects\Requests\GetProjectRequest;
use Bexio\Resources\Projects\Projects\Requests\GetProjectStatesRequest;
use Bexio\Resources\Projects\Projects\Requests\GetProjectsRequest;
use Bexio\Resources\Projects\Projects\Requests\GetProjectTypesRequest;
use Bexio\Resources\Projects\Projects\Requests\ReactivateProjectRequest;
use Bexio\Resources\Projects\Projects\Requests\UpdateProjectRequest;
use Bexio\Resources\Resource;

/**
 * @method ProjectQueryBuilder query()
 */
class Project extends Resource
{
    public const INDEX_REQUEST = GetProjectsRequest::class;
    public const SHOW_REQUEST = GetProjectRequest::class;
    public const CREATE_REQUEST = CreateProjectRequest::class;
    public const UPDATE_REQUEST = UpdateProjectRequest::class;
    public const DELETE_REQUEST = DeleteProjectRequest::class;
    public const QUERY_BUILDER = ProjectQueryBuilder::class;

    public function __construct(
        public string $name,
        public int $pr_state_id,
        public int $pr_project_type_id,
        public int $contact_id,
        public int $user_id,
        public ?int $id = null,
        public ?string $uuid = null,
        public ?string $nr = null,
        public ?string $document_nr = null,
        public ?string $start_date = null,
        public ?string $end_date = null,
        public ?string $comment = null,
        public ?int $contact_sub_id = null,
        public ?int $pr_invoice_type_id = null,
        public ?string $pr_invoice_type_amount = null,
        public ?int $pr_budget_type_id = null,
        public ?string $pr_budget_type_amount = null,
    ) {
    }

    /**
     * Archive the project.
     */
    public function archive(): bool
    {
        $request = new ArchiveProjectRequest($this->id);
        $response = $this->client()->send($request);

        return $request->createDtoFromResponse($response);
    }

    /**
     * Reactivate the project.
     */
    public function reactivate(): bool
    {
        $request = new ReactivateProjectRequest($this->id);
        $response = $this->client()->send($request);

        return $request->createDtoFromResponse($response);
    }

    /**
     * Fetch available project states.
     */
    public static function states(BexioClient $client): array
    {
        $request = new GetProjectStatesRequest();
        $response = $client->send($request);

        return $request->createDtoFromResponse($response);
    }

    /**
     * Fetch available project types.
     */
    public static function types(BexioClient $client): array
    {
        $request = new GetProjectTypesRequest();
        $response = $client->send($request);

        return $request->createDtoFromResponse($response);
    }
}


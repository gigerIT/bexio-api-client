<?php
declare(strict_types=1);

namespace Bexio\Resources\Projects\TimesheetStatuses\Requests;

use Bexio\Resources\Projects\TimesheetStatuses\TimesheetStatus;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetTimesheetStatusesRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly int $limit = 500,
        protected readonly int $offset = 0,
        protected readonly ?string $order_by = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/2.0/timesheet_status';
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'order_by' => $this->order_by,
            'limit' => $this->limit,
            'offset' => $this->offset,
        ], static fn (mixed $value): bool => $value !== null);
    }

    public function createDtoFromResponse(Response $response): array
    {
        return TimesheetStatus::collect($response->json());
    }
}

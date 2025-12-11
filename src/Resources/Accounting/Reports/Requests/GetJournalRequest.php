<?php
declare(strict_types=1);

namespace Bexio\Resources\Accounting\Reports\Requests;

use Bexio\Resources\Accounting\Reports\JournalEntry;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetJournalRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        public ?string $from = null,
        public ?string $to = null,
        public ?string $account_uuid = null,
        public int $limit = 500,
        public int $offset = 0,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/3.0/accounting/journal';
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'from' => $this->from,
            'to' => $this->to,
            'account_uuid' => $this->account_uuid,
            'limit' => $this->limit,
            'offset' => $this->offset,
        ], static fn($v) => $v !== null);
    }

    public function createDtoFromResponse(Response $response): array
    {
        $data = $response->json('data') ?? $response->json();
        return JournalEntry::collect($data);
    }
}


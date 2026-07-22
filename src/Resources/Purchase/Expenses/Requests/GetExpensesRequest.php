<?php
declare(strict_types=1);

namespace Bexio\Resources\Purchase\Expenses\Requests;

use Bexio\Resources\Purchase\Expenses\Expense;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetExpensesRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected ?int $limit = null,
        protected int $page = 1,
        protected ?string $status = null,
        protected ?string $vendor = null,
        protected ?float $gross_min = null,
        protected ?float $gross_max = null,
        protected ?float $net_min = null,
        protected ?float $net_max = null,
        protected ?string $paid_on_start = null,
        protected ?string $paid_on_end = null,
        protected ?string $created_at_start = null,
        protected ?string $created_at_end = null,
        protected ?string $title = null,
        protected ?string $currency_code = null,
        protected ?string $document_no = null,
        protected ?int $supplier_id = null,
        protected ?string $project_id = null,
    ) {
        if ($this->limit !== null && ($this->limit < 1 || $this->limit > 2000)) {
            throw new \InvalidArgumentException('Limit must be between 1 and 2000.');
        }

        if ($this->page < 1) {
            throw new \InvalidArgumentException('Page must be greater than 0.');
        }
    }

    public function resolveEndpoint(): string
    {
        return '/4.0/expenses';
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'limit' => $this->limit,
            'page' => $this->page,
            'status' => $this->status,
            'vendor' => $this->vendor,
            'gross_min' => $this->gross_min,
            'gross_max' => $this->gross_max,
            'net_min' => $this->net_min,
            'net_max' => $this->net_max,
            'paid_on_start' => $this->paid_on_start,
            'paid_on_end' => $this->paid_on_end,
            'created_at_start' => $this->created_at_start,
            'created_at_end' => $this->created_at_end,
            'title' => $this->title,
            'currency_code' => $this->currency_code,
            'document_no' => $this->document_no,
            'supplier_id' => $this->supplier_id,
            'project_id' => $this->project_id,
        ], static fn (mixed $value): bool => $value !== null);
    }

    public function createDtoFromResponse(Response $response): array
    {
        $payload = $response->json();
        $data = $payload['data'] ?? $payload;

        if (! is_array($data) || ! array_is_list($data)) {
            return [];
        }

        return Expense::collect($data);
    }
}

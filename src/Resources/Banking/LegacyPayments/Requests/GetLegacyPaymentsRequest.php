<?php
declare(strict_types=1);

namespace Bexio\Resources\Banking\LegacyPayments\Requests;

use Bexio\Resources\Banking\LegacyPayments\LegacyPayment;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetLegacyPaymentsRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly ?string $from = null,
        protected readonly ?string $to = null,
        protected readonly ?string $billId = null,
        protected readonly ?int $limit = null,
        protected readonly int $offset = 0,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/3.0/banking/payments';
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'from' => $this->from,
            'to' => $this->to,
            'bill_id' => $this->billId,
            'limit' => $this->limit,
            'offset' => $this->offset,
        ], static fn (mixed $value): bool => $value !== null);
    }

    public function createDtoFromResponse(Response $response): array
    {
        return LegacyPayment::collect($response->json());
    }
}

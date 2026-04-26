<?php
declare(strict_types=1);

namespace Bexio\Resources\Purchase\Expenses\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetExpenseDocumentNumberRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected readonly string $documentNumber)
    {
    }

    public function resolveEndpoint(): string
    {
        return '/4.0/expenses/documentnumbers';
    }

    protected function defaultQuery(): array
    {
        return [
            'document_no' => $this->documentNumber,
        ];
    }

    public function createDtoFromResponse(Response $response): array
    {
        return $response->json();
    }
}

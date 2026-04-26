<?php
declare(strict_types=1);

namespace Bexio\Resources\Purchase\Expenses\Requests;

use Bexio\Resources\Purchase\Expenses\Expense;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class DuplicateExpenseRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(protected readonly string $id)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/4.0/expenses/{$this->id}/actions";
    }

    protected function defaultBody(): array
    {
        return [
            'action' => 'DUPLICATE',
        ];
    }

    public function createDtoFromResponse(Response $response): Expense
    {
        return Expense::from($response->json());
    }
}

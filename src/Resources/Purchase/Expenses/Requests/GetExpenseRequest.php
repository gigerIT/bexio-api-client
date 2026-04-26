<?php
declare(strict_types=1);

namespace Bexio\Resources\Purchase\Expenses\Requests;

use Bexio\Resources\Purchase\Expenses\Expense;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetExpenseRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected readonly string $id)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/4.0/expenses/{$this->id}";
    }

    public function createDtoFromResponse(Response $response): Expense
    {
        return Expense::from($response->json());
    }
}

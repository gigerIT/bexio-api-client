<?php
declare(strict_types=1);

namespace Bexio\Resources\Purchase\Expenses\Requests;

use Bexio\Resources\Purchase\Expenses\Expense;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateExpenseRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(protected readonly Expense $expense)
    {
        if ($this->expense->id === null) {
            throw new \InvalidArgumentException('id is required to update an expense.');
        }
    }

    public function resolveEndpoint(): string
    {
        return "/4.0/expenses/{$this->expense->id}";
    }

    protected function defaultBody(): array
    {
        return $this->expense->toApi()->toArray();
    }

    public function createDtoFromResponse(Response $response): Expense
    {
        return Expense::from($response->json());
    }
}

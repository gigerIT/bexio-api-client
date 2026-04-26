<?php
declare(strict_types=1);

namespace Bexio\Resources\Purchase\Expenses\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class DeleteExpenseRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(protected readonly string $id)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/4.0/expenses/{$this->id}";
    }
}

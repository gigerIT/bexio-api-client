<?php
declare(strict_types=1);


namespace Bexio\Resources\Contacts\Salutations\Requests;

use Bexio\Resources\Contacts\Salutations\Salutation;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetSalutationRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected int $salutationId)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/salutation/{$this->salutationId}";
    }


    public function createDtoFromResponse(Response $response): Salutation
    {
        return Salutation::from($response->json());
    }
}


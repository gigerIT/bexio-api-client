<?php
declare(strict_types=1);


namespace Bexio\Resources\Contacts\Salutations\Requests;

use Bexio\Resources\Contacts\Salutations\Salutation;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateSalutationRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(readonly protected Salutation $salutation)
    {
    }


    public function resolveEndpoint(): string
    {
        return "/2.0/salutation/{$this->salutation->id}";
    }

    protected function defaultBody(): array
    {
        return $this->salutation->except("id")->toArray();
    }

    public function createDtoFromResponse(Response $response): Salutation
    {
        return Salutation::from($response->json());
    }

}


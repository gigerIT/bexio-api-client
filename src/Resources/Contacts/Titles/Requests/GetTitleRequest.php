<?php
declare(strict_types=1);


namespace Bexio\Resources\Contacts\Titles\Requests;

use Bexio\Resources\Contacts\Titles\Title;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetTitleRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected int $titleId)
    {
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/title/{$this->titleId}";
    }


    public function createDtoFromResponse(Response $response): Title
    {
        return Title::from($response->json());
    }
}


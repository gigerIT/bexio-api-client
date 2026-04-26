<?php
declare(strict_types=1);

namespace Bexio\Resources\Other\Notes\Requests;

use Bexio\Resources\Other\Notes\Note;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateNoteRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(protected readonly Note $note)
    {
    }

    public function resolveEndpoint(): string
    {
        return '/2.0/note';
    }

    protected function defaultBody(): array
    {
        return $this->note->toApi();
    }

    public function createDtoFromResponse(Response $response): Note
    {
        return Note::from($response->json());
    }
}

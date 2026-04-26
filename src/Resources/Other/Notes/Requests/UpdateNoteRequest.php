<?php
declare(strict_types=1);

namespace Bexio\Resources\Other\Notes\Requests;

use Bexio\Resources\Other\Notes\Note;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateNoteRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(protected readonly Note $note)
    {
        if ($this->note->id === null) {
            throw new \InvalidArgumentException('id is required to update a note.');
        }
    }

    public function resolveEndpoint(): string
    {
        return "/2.0/note/{$this->note->id}";
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

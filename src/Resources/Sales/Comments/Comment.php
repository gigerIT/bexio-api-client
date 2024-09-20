<?php
declare(strict_types=1);


namespace Bexio\Resources\Sales\Comments;

use Bexio\Resources\Resource;
use Bexio\Resources\Sales\Comments\Requests\CreateCommentRequest;
use Bexio\Resources\Sales\KbDocumentContract;

class Comment extends Resource
{
    public const CREATE_REQUEST = CreateCommentRequest::class;

    public int $id;
    public string $date;
    public ?string $image;
    public ?string $image_path;

    public function __construct(
        public string  $text,
        public int     $user_id = 1,
        public bool    $is_public = false,
        public ?string $user_name = null,
        public ?string $user_email = null,
    )
    {
    }


    public function createFor(KbDocumentContract $documentResource): static
    {
        $request = new CreateCommentRequest(
            documentType: $documentResource::DOCUMENT_TYPE,
            documentId: $documentResource->id,
            comment: $this
        );
        $response = $this->client()->send($request);
        return $request->createDtoFromResponse($response)->attachClient($this->client());
    }

}
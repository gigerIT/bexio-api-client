<?php

namespace Bexio\Resources\Sales\Comments\Traits;

use Bexio\Resources\Sales\Comments\Comment;
use Bexio\Resources\Sales\Comments\Requests\GetCommentRequest;
use Bexio\Resources\Sales\Comments\Requests\GetCommentsRequest;

trait HasComments
{

    /**
     * @throws \Exception
     */
    public function addComment(string|Comment $comment): Comment
    {
        if (!isset($this->id)) {
            throw new \Exception('The resource must be saved before adding a comment.');
        }

        if (is_string($comment)) {
            $comment = new Comment(text: $comment);
            $comment->attachClient($this->client());
        }

        return $comment->createFor($this);
    }

    public function comments(int $limit = 500, int $offset = 0): array
    {
        $request = new GetCommentsRequest(
            documentType: $this::DOCUMENT_TYPE,
            documentId: $this->resolveKbDocumentId(),
            limit: $limit,
            offset: $offset,
        );

        return $request->createDtoFromResponse($this->client()->send($request));
    }

    public function comment(int $commentId): Comment
    {
        $request = new GetCommentRequest(
            documentType: $this::DOCUMENT_TYPE,
            documentId: $this->resolveKbDocumentId(),
            commentId: $commentId,
        );

        return $request->createDtoFromResponse($this->client()->send($request))
            ->attachClient($this->client());
    }
}

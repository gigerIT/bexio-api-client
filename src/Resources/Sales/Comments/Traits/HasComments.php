<?php

namespace Bexio\Resources\Sales\Comments\Traits;

use Bexio\Resources\Sales\Comments\Comment;

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
}
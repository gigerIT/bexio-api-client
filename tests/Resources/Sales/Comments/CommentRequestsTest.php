<?php

use Bexio\Resources\Sales\Comments\Comment;
use Bexio\Resources\Sales\Comments\Enums\KbDocumentType;

it('can create a Comment for a Invoice', function () {
    $comment = new Comment(
        text: 'This is a comment',
    );

    $comment = $comment->attachClient(testClient())->createFor(KbDocumentType::INVOICE, 35);

    expect($comment->text)->toBe('This is a comment')
        ->and($comment->id)->toBeInt();
});

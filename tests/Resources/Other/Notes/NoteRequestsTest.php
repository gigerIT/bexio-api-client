<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Other\Notes\Note;

it('can get Notes', function () {
    $notes = Note::useClient(testClient())->all();

    if (count($notes) === 0) {
        \PHPUnit\Framework\Assert::markTestSkipped('No notes available');
    }

    expect($notes)->toBeArray()
        ->and($notes[0])->toBeInstanceOf(Note::class)
        ->and($notes[0]->id)->toBeInt();
});

it('can get a Note', function () {
    $notes = Note::useClient(testClient())->all();
    if (count($notes) === 0) {
        \PHPUnit\Framework\Assert::markTestSkipped('No notes available');
    }

    $note = Note::useClient(testClient())->find($notes[0]->id);

    expect($note)->toBeInstanceOf(Note::class)
        ->and($note->id)->toBeInt()
        ->and($note->subject)->toBeString();
});

it('can get first Note using query builder', function () {
    $note = Note::useClient(testClient())->query()->first();

    if (!$note) {
        \PHPUnit\Framework\Assert::markTestSkipped('No notes available');
    }

    expect($note)->toBeInstanceOf(Note::class)
        ->and($note->id)->toBeInt();
});


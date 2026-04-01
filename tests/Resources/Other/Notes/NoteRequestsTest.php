<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Other\Notes\Note;
use Bexio\Support\Data\SearchCriteria;

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

it('can search Notes', function () {
    $notes = Note::useClient(testClient())->all();

    if (count($notes) === 0) {
        \PHPUnit\Framework\Assert::markTestSkipped('No notes available');
    }

    $searchable = collect($notes)->first(fn (Note $note): bool => filled($note->subject));

    if (! $searchable) {
        \PHPUnit\Framework\Assert::markTestSkipped('No searchable note available');
    }

    $results = Note::useClient(testClient())
        ->query()
        ->where('subject', SearchCriteria::LIKE, $searchable->subject)
        ->get();

    expect($results)->toBeArray()
        ->and($results[0])->toBeInstanceOf(Note::class);
});

it('can get first Note using query builder', function () {
    $note = Note::useClient(testClient())->query()->first();

    if (!$note) {
        \PHPUnit\Framework\Assert::markTestSkipped('No notes available');
    }

    expect($note)->toBeInstanceOf(Note::class)
        ->and($note->id)->toBeInt();
});


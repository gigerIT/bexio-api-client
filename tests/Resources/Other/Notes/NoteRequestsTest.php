<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Other\Notes\Note;
use Bexio\Resources\Other\Notes\Requests\CreateNoteRequest;
use Bexio\Resources\Other\Notes\Requests\DeleteNoteRequest;
use Bexio\Resources\Other\Notes\Requests\UpdateNoteRequest;
use Bexio\Resources\Other\Users\User;
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

it('builds note write requests with API payload names', function () {
    $note = new Note(
        id: 123,
        user_id: 1,
        event_start: '2026-04-26 10:00:00',
        subject: 'API conception',
        info: 'test note',
        contact_id: 14,
        project_id: 15,
        entry_id: null,
        module_id: null,
    );

    expect((new CreateNoteRequest($note))->resolveEndpoint())
        ->toBe('/2.0/note')
        ->and((new UpdateNoteRequest($note))->resolveEndpoint())
        ->toBe('/2.0/note/123')
        ->and((new DeleteNoteRequest(123))->resolveEndpoint())
        ->toBe('/2.0/note/123');

    $body = new \ReflectionMethod(CreateNoteRequest::class, 'defaultBody');
    $body->setAccessible(true);

    expect($body->invoke(new CreateNoteRequest($note)))
        ->toMatchArray([
            'user_id' => 1,
            'event_start' => '2026-04-26 10:00:00',
            'subject' => 'API conception',
            'info' => 'test note',
            'contact_id' => 14,
            'pr_project_id' => 15,
            'entry_id' => null,
            'module_id' => null,
        ])
        ->not->toHaveKeys(['id', 'project_id']);
});

it('can create update and delete a disposable Note', function () {
    $user = User::useClient(testClient())->me();

    $note = (new Note(
        user_id: $user->id,
        event_start: now()->format('Y-m-d H:i:s'),
        subject: 'API note ' . uniqid(),
        info: 'Created by endpoint completion tests',
    ))
        ->attachClient(testClient())
        ->create();

    try {
        $note->subject .= ' updated';
        $updated = $note->update();

        expect($updated)->toBeInstanceOf(Note::class)
            ->and($updated->subject)->toBe($note->subject);
    } finally {
        $note->delete();
    }
});

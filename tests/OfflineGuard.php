<?php

use Bexio\BexioClient;
use Bexio\Resources\Contacts\Contacts\Requests\GetContactRequest;
use Saloon\Exceptions\FixtureMissingException;
use Saloon\Exceptions\StrayRequestException;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

// Explicitly included by phpunit.offline.xml; the live suite keeps its own mode.
it('rejects an unfaked API request in offline mode', function () {
    (new BexioClient('offline-test-token'))->send(new GetContactRequest(123));
})->throws(StrayRequestException::class);

it('rejects a missing fixture without recording a live response', function () {
    $client = (new BexioClient('offline-test-token'))->withMockClient(new MockClient([
        GetContactRequest::class => MockResponse::fixture('offline/missing-fixture'),
    ]));

    $client->send(new GetContactRequest(123));
})->throws(FixtureMissingException::class);

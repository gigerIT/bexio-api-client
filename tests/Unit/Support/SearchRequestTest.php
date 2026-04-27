<?php

use Bexio\Resources\Contacts\AdditionalAddresses\Requests\SearchAdditionalAddressRequest;
use Bexio\Resources\Contacts\Contacts\Requests\SearchContactRequest;
use Bexio\Resources\Files\Enums\FileArchivedState;
use Bexio\Resources\Files\Requests\SearchFilesRequest;
use Saloon\Enums\Method;

it('keeps plain search requests as POST JSON body requests', function () {
    $clauses = [[
        'field' => 'name_1',
        'criteria' => 'like',
        'value' => 'Ada',
    ]];

    $request = new SearchContactRequest($clauses);

    expect($request->getMethod())->toBe(Method::POST)
        ->and($request->body()->all())->toBe($clauses);
});

it('keeps file search body and query parameters', function () {
    $clauses = [[
        'field' => 'id',
        'criteria' => '=',
        'value' => 123,
    ]];

    $request = new SearchFilesRequest(
        searchClauses: $clauses,
        archivedState: FileArchivedState::ARCHIVED,
        limit: 20,
        offset: 5,
    );

    expect($request->getMethod())->toBe(Method::POST)
        ->and($request->body()->all())->toBe($clauses)
        ->and($request->query()->all())->toBe([
            'limit' => 20,
            'offset' => 5,
            'archived_state' => 'archived',
        ]);
});

it('keeps nested search endpoint context and body', function () {
    $clauses = [[
        'field' => 'name',
        'criteria' => '=',
        'value' => 'Billing',
    ]];

    $request = new SearchAdditionalAddressRequest(
        contactId: 42,
        searchClauses: $clauses,
    );

    expect($request->getMethod())->toBe(Method::POST)
        ->and($request->resolveEndpoint())->toBe('/2.0/contact/42/additional_address/search')
        ->and($request->body()->all())->toBe($clauses);
});

<?php

namespace Bexio\Resources\Contacts\ContactSectors\Requests;

use Bexio\Resources\Contacts\ContactSectors\ContactSector;
use Bexio\Support\Data\SearchCriteria;

it('can get ContactSectors', function () {
    $sectors = ContactSector::useClient(testClient())->all();

    expect($sectors)->toBeArray();

    if (! empty($sectors)) {
        expect($sectors[0])->toBeInstanceOf(ContactSector::class);
    }
});

it('can get ContactSectors using query builder', function () {
    $sectors = ContactSector::useClient(testClient())->query()->limit(5)->get();

    expect($sectors)->toBeArray()
        ->and(count($sectors))->toBeLessThanOrEqual(5);
});

it('can get first ContactSector using query builder', function () {
    $sector = ContactSector::useClient(testClient())->query()->first();

    if ($sector === null) {
        $this->markTestSkipped('No sectors available');
    }

    expect($sector)->toBeInstanceOf(ContactSector::class)
        ->and($sector->id)->toBeInt();
});

it('can get a ContactSector', function () {
    $sectors = ContactSector::useClient(testClient())->all();

    if (empty($sectors)) {
        $this->markTestSkipped('No sectors available');
    }

    $sector = ContactSector::useClient(testClient())->find($sectors[0]->id);

    expect($sector)->toBeInstanceOf(ContactSector::class)
        ->and($sector->name)->toBeString()->and($sector->id)->toBeInt();
});

it('can search ContactSectors', function () {
    $sectors = ContactSector::useClient(testClient())->all();

    if (empty($sectors)) {
        $this->markTestSkipped('No sectors available');
    }

    $searchResults = ContactSector::useClient(testClient())
        ->query()
        ->where('name', SearchCriteria::LIKE, $sectors[0]->name)
        ->search();

    expect($searchResults)->toBeArray()->and($searchResults[0])->toBeInstanceOf(ContactSector::class);
});

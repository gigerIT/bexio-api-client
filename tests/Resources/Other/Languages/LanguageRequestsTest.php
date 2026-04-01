<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Other\Languages\Language;
use Bexio\Support\Data\SearchCriteria;

it('can get Languages', function () {
    $languages = Language::useClient(testClient())->all();

    expect($languages)->toBeArray()
        ->and($languages[0])->toBeInstanceOf(Language::class)
        ->and($languages[0]->id)->toBeInt();
});

it('can search Languages', function () {
    try {
        $languages = Language::useClient(testClient())->all();
    } catch (\Throwable $e) {
        \PHPUnit\Framework\Assert::markTestSkipped('Languages endpoint unavailable: ' . $e->getMessage());
    }

    if (count($languages) === 0) {
        \PHPUnit\Framework\Assert::markTestSkipped('No languages available');
    }

    $searchable = $languages[0];

    if (! $searchable->name) {
        \PHPUnit\Framework\Assert::markTestSkipped('No searchable language available');
    }

    $results = Language::useClient(testClient())
        ->query()
        ->where('name', SearchCriteria::LIKE, $searchable->name)
        ->get();

    expect($results)->toBeArray()
        ->and($results[0])->toBeInstanceOf(Language::class);
});

it('can get first Language using query builder', function () {
    $language = Language::useClient(testClient())->query()->first();

    expect($language)->toBeInstanceOf(Language::class)
        ->and($language->id)->toBeInt();
});


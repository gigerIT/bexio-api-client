<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Other\Languages\Language;

it('can get Languages', function () {
    $languages = Language::useClient(testClient())->all();

    expect($languages)->toBeArray()
        ->and($languages[0])->toBeInstanceOf(Language::class)
        ->and($languages[0]->id)->toBeInt();
});

it('can get first Language using query builder', function () {
    $language = Language::useClient(testClient())->query()->first();

    expect($language)->toBeInstanceOf(Language::class)
        ->and($language->id)->toBeInt();
});

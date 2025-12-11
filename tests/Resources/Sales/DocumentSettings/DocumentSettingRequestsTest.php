<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Sales\DocumentSettings\DocumentSetting;

it('can get Document Settings', function () {
    $settings = DocumentSetting::useClient(testClient())->all();

    expect($settings)->toBeArray()
        ->and($settings[0])->toBeInstanceOf(DocumentSetting::class)
        ->and($settings[0]->id)->toBeInt();
});

it('can get first Document Setting using query builder', function () {
    $setting = DocumentSetting::useClient(testClient())->query()->first();

    expect($setting)->toBeInstanceOf(DocumentSetting::class)
        ->and($setting->id)->toBeInt();
});


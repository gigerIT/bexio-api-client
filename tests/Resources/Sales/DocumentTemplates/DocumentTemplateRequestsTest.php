<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Sales\DocumentTemplates\DocumentTemplate;
use PHPUnit\Framework\Assert;

it('can get Document Templates', function () {
    $templates = DocumentTemplate::useClient(testClient())->all();

    if (count($templates) === 0) {
        Assert::markTestSkipped('No document templates available');
    }

    if (! $templates[0]?->slug) {
        Assert::markTestSkipped('No document templates available');
    }

    expect($templates)->toBeArray()
        ->and($templates[0])->toBeInstanceOf(DocumentTemplate::class)
        ->and($templates[0]->slug)->toBeString();
});

it('can get first Document Template using query builder', function () {
    $template = DocumentTemplate::useClient(testClient())->query()->first();

    if (! $template) {
        Assert::markTestSkipped('No document templates available');
    }

    if (! $template->slug) {
        Assert::markTestSkipped('No document templates available');
    }

    expect($template)->toBeInstanceOf(DocumentTemplate::class)
        ->and($template->slug)->toBeString();
});

<?php

namespace Bexio\Resources\Contacts\Titles\Requests;

use Bexio\Resources\Contacts\Titles\Title;
use Bexio\Support\Data\SearchCriteria;

use function Pest\Faker\fake;

$testTitle = null;

it('can create a Title', function () use (&$testTitle) {
    $title = new Title(
        name: fake()->word(),
    );

    $testTitle = $title->attachClient(testClient())->save();

    expect($testTitle)->toBeInstanceOf(Title::class)
        ->and($testTitle->name)->toBeString()
        ->and($testTitle->id)->toBeInt();
});

it('can get Titles', function () {
    $titles = Title::useClient(testClient())->all();

    expect($titles)->toBeArray()->and($titles[0])->toBeInstanceOf(Title::class);
});

it('can get Titles using query builder', function () {
    $titles = Title::useClient(testClient())->query()->limit(5)->get();

    expect($titles)->toBeArray()
        ->and(count($titles))->toBeLessThanOrEqual(5);
});

it('can get first Title using query builder', function () {
    $title = Title::useClient(testClient())->query()->first();

    expect($title)->toBeInstanceOf(Title::class)
        ->and($title->id)->toBeInt();
});

it('can get a Title', function () use (&$testTitle) {
    $title = Title::useClient(testClient())->find($testTitle->id);

    expect($title)->toBeInstanceOf(Title::class)
        ->and($title->name)->toBeString()->and($title->id)->toBeInt();
})->depends('it can create a Title');

it('can search a Title', function () use (&$testTitle) {
    $titles = Title::useClient(testClient())
        ->query()
        ->where('name', SearchCriteria::LIKE, $testTitle->name)
        ->search();

    expect($titles)->toBeArray()->and($titles[0])->toBeInstanceOf(Title::class);
})->depends('it can create a Title');

it('can update a Title', function () use (&$testTitle) {
    $testTitle->name = fake()->word();

    $testTitle->save();

    expect($testTitle->name)->toBeString();
})->depends('it can get a Title');

it('can delete a Title', function () use (&$testTitle) {
    expect($testTitle->delete())->toBeTrue();
})->depends('it can create a Title');

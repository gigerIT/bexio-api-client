<?php

namespace Bexio\Resources\Contacts\Salutations\Requests;

use Bexio\Resources\Contacts\Salutations\Salutation;
use Bexio\Support\Data\SearchCriteria;

use function Pest\Faker\fake;

$testSalutation = null;

it('can create a Salutation', function () use (&$testSalutation) {
    $salutation = new Salutation(
        name: fake()->word(),
    );

    $testSalutation = $salutation->attachClient(testClient())->save();

    expect($testSalutation)->toBeInstanceOf(Salutation::class)
        ->and($testSalutation->name)->toBeString()
        ->and($testSalutation->id)->toBeInt();
});

it('can get Salutations', function () {
    $salutations = Salutation::useClient(testClient())->all();

    expect($salutations)->toBeArray()->and($salutations[0])->toBeInstanceOf(Salutation::class);
});

it('can get Salutations using query builder', function () {
    $salutations = Salutation::useClient(testClient())->query()->limit(5)->get();

    expect($salutations)->toBeArray()
        ->and(count($salutations))->toBeLessThanOrEqual(5);
});

it('can get first Salutation using query builder', function () {
    $salutation = Salutation::useClient(testClient())->query()->first();

    expect($salutation)->toBeInstanceOf(Salutation::class)
        ->and($salutation->id)->toBeInt();
});

it('can get a Salutation', function () use (&$testSalutation) {
    $salutation = Salutation::useClient(testClient())->find($testSalutation->id);

    expect($salutation)->toBeInstanceOf(Salutation::class)
        ->and($salutation->name)->toBeString()->and($salutation->id)->toBeInt();
})->depends('it can create a Salutation');

it('can search a Salutation', function () use (&$testSalutation) {
    $salutations = Salutation::useClient(testClient())
        ->query()
        ->where('name', SearchCriteria::LIKE, $testSalutation->name)
        ->search();

    expect($salutations)->toBeArray()->and($salutations[0])->toBeInstanceOf(Salutation::class);
})->depends('it can create a Salutation');

it('can update a Salutation', function () use (&$testSalutation) {
    $testSalutation->name = fake()->word();

    $testSalutation->save();

    expect($testSalutation->name)->toBeString();
})->depends('it can get a Salutation');

it('can delete a Salutation', function () use (&$testSalutation) {
    expect($testSalutation->delete())->toBeTrue();
})->depends('it can create a Salutation');

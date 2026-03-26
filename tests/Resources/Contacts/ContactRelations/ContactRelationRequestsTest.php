<?php

namespace Bexio\Resources\Contacts\ContactRelations\Requests;

use Bexio\Resources\Contacts\ContactRelations\ContactRelation;
use Bexio\Resources\Contacts\Contacts\Contact;
use Bexio\Resources\Contacts\Contacts\Enums\ContactType;
use Bexio\Support\Data\SearchCriteria;
use function Pest\Faker\fake;

$testRelation = null;

it('can create a ContactRelation', function () use (&$testRelation) {
    $connectToContact = new Contact(
        contact_type_id: ContactType::PERSON,
        name_1: fake()->firstName(),
        name_2: fake()->lastName(),
    );
    $connectToContact = $connectToContact->attachClient(testClient())->save();

    $relation = new ContactRelation(
        contact_id: testContactId(),
        contact_sub_id: $connectToContact->id,
        description: fake()->sentence(),
    );

    $testRelation = $relation->attachClient(testClient())->save();

    expect($testRelation)->toBeInstanceOf(ContactRelation::class)
        ->and($testRelation->description)->toBeString()
        ->and($testRelation->id)->toBeInt();
});


it('can get ContactRelations', function () {
    $relations = ContactRelation::useClient(testClient())->all();

    expect($relations)->toBeArray()->and($relations[0])->toBeInstanceOf(ContactRelation::class);
});


it('can get ContactRelations using query builder', function () {
    $relations = ContactRelation::useClient(testClient())->query()->limit(5)->get();

    expect($relations)->toBeArray()
        ->and(count($relations))->toBeLessThanOrEqual(5);
});


it('can get first ContactRelation using query builder', function () {
    $relation = ContactRelation::useClient(testClient())->query()->first();

    expect($relation)->toBeInstanceOf(ContactRelation::class)
        ->and($relation->id)->toBeInt();
});


it('can get a ContactRelation', function () use (&$testRelation) {
    $relation = ContactRelation::useClient(testClient())->find($testRelation->id);

    expect($relation)->toBeInstanceOf(ContactRelation::class)
        ->and($relation->description)->toBeString()->and($relation->id)->toBeInt();
})->depends('it can create a ContactRelation');


it('can search a ContactRelation', function () use (&$testRelation) {
    $relations = ContactRelation::useClient(testClient())
        ->query()
        ->where('contact_id', SearchCriteria::EQUAL, (string) $testRelation->contact_id)
        ->get();

    expect($relations)->toBeArray()->and($relations[0])->toBeInstanceOf(ContactRelation::class);
})->depends('it can create a ContactRelation');


it('can update a ContactRelation', function () use (&$testRelation) {
    $testRelation->description = fake()->sentence();

    $testRelation->save();

    expect($testRelation->description)->toBeString();
})->depends('it can get a ContactRelation');


it('can delete a ContactRelation', function () use (&$testRelation) {
    expect($testRelation->delete())->toBeTrue();
})->depends('it can create a ContactRelation');


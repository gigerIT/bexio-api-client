<?php

namespace Bexio\Resources\Contacts\ContactGroups\Requests;

use Bexio\Resources\Contacts\ContactGroups\ContactGroup;
use Bexio\Support\Data\SearchCriteria;
use function Pest\Faker\fake;

$testGroup = null;

it('can create a ContactGroup', function () use (&$testGroup) {
    $group = new ContactGroup(
        name: fake()->word(),
    );

    $testGroup = $group->attachClient(testClient())->save();

    expect($testGroup)->toBeInstanceOf(ContactGroup::class)
        ->and($testGroup->name)->toBeString()
        ->and($testGroup->id)->toBeInt();
});


it('can get ContactGroups', function () {
    $groups = ContactGroup::useClient(testClient())->all();

    expect($groups)->toBeArray()->and($groups[0])->toBeInstanceOf(ContactGroup::class);
});


it('can get ContactGroups using query builder', function () {
    $groups = ContactGroup::useClient(testClient())->query()->limit(5)->get();

    expect($groups)->toBeArray()
        ->and(count($groups))->toBeLessThanOrEqual(5);
});


it('can get first ContactGroup using query builder', function () {
    $group = ContactGroup::useClient(testClient())->query()->first();

    expect($group)->toBeInstanceOf(ContactGroup::class)
        ->and($group->id)->toBeInt();
});


it('can get a ContactGroup', function () use (&$testGroup) {
    $group = ContactGroup::useClient(testClient())->find($testGroup->id);

    expect($group)->toBeInstanceOf(ContactGroup::class)
        ->and($group->name)->toBeString()->and($group->id)->toBeInt();
})->depends('it can create a ContactGroup');


it('can search a ContactGroup', function () use (&$testGroup) {
    $groups = ContactGroup::useClient(testClient())
        ->query()
        ->where('name', SearchCriteria::LIKE, $testGroup->name)
        ->search();

    expect($groups)->toBeArray()->and($groups[0])->toBeInstanceOf(ContactGroup::class);
})->depends('it can create a ContactGroup');


it('can update a ContactGroup', function () use (&$testGroup) {
    $testGroup->name = fake()->word();

    $testGroup->save();

    expect($testGroup->name)->toBeString();
})->depends('it can get a ContactGroup');


it('can delete a ContactGroup', function () use (&$testGroup) {
    expect($testGroup->delete())->toBeTrue();
})->depends('it can create a ContactGroup');


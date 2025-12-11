<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Accounting\AccountGroups\AccountGroup;

it('can get Account Groups', function () {
    $groups = AccountGroup::useClient(testClient())->all();

    if (count($groups) === 0) {
        \PHPUnit\Framework\Assert::markTestSkipped('No account groups available');
    }

    expect($groups)->toBeArray()
        ->and($groups[0])->toBeInstanceOf(AccountGroup::class)
        ->and($groups[0]->id)->toBeInt();
});

it('can get an Account Group', function () {
    $groups = AccountGroup::useClient(testClient())->all();
    if (count($groups) === 0) {
        \PHPUnit\Framework\Assert::markTestSkipped('No account groups available');
    }

    $group = AccountGroup::useClient(testClient())->find($groups[0]->id);

    expect($group)->toBeInstanceOf(AccountGroup::class)
        ->and($group->id)->toBeInt();
});

it('can get first Account Group using query builder', function () {
    $group = AccountGroup::useClient(testClient())->query()->first();

    if (!$group) {
        \PHPUnit\Framework\Assert::markTestSkipped('No account groups available');
    }

    expect($group)->toBeInstanceOf(AccountGroup::class)
        ->and($group->id)->toBeInt();
});


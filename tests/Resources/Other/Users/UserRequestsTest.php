<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Other\Users\User;

it('can get Users', function () {
    $users = User::useClient(testClient())->all();

    expect($users)->toBeArray()
        ->and($users[0])->toBeInstanceOf(User::class)
        ->and($users[0]->id)->toBeInt();
});

it('can get a User', function () {
    $user = User::useClient(testClient())->find(1);

    expect($user)->toBeInstanceOf(User::class)
        ->and($user->id)->toBeInt()
        ->and($user->email)->toBeString();
});

it('can get authenticated User', function () {
    $user = User::useClient(testClient())->me();

    expect($user)->toBeInstanceOf(User::class)
        ->and($user->id)->toBeInt();
});

it('can get first User using query builder', function () {
    $user = User::useClient(testClient())->query()->first();

    expect($user)->toBeInstanceOf(User::class)
        ->and($user->id)->toBeInt();
});


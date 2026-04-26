<?php

namespace Bexio\Resources\Other\FictionalUsers\Requests;

use Bexio\Resources\Other\FictionalUsers\FictionalUser;

it('builds fictional user requests', function () {
    $fictionalUser = new FictionalUser(
        id: 123,
        salutation_type: 'female',
        firstname: 'Ada',
        lastname: 'Lovelace',
        email: 'ada@example.com',
        title_id: null,
    );

    expect((new GetFictionalUsersRequest(20, 5))->resolveEndpoint())
        ->toBe('/3.0/fictional_users')
        ->and((new CreateFictionalUserRequest($fictionalUser))->resolveEndpoint())
        ->toBe('/3.0/fictional_users')
        ->and((new GetFictionalUserRequest(123))->resolveEndpoint())
        ->toBe('/3.0/fictional_users/123')
        ->and((new UpdateFictionalUserRequest($fictionalUser))->resolveEndpoint())
        ->toBe('/3.0/fictional_users/123')
        ->and((new DeleteFictionalUserRequest(123))->resolveEndpoint())
        ->toBe('/3.0/fictional_users/123');

    $body = new \ReflectionMethod(CreateFictionalUserRequest::class, 'defaultBody');
    $body->setAccessible(true);

    expect($body->invoke(new CreateFictionalUserRequest($fictionalUser)))
        ->toMatchArray([
            'salutation_type' => 'female',
            'firstname' => 'Ada',
            'lastname' => 'Lovelace',
            'email' => 'ada@example.com',
            'title_id' => null,
        ])
        ->not->toHaveKey('id');
});

it('can create update fetch and delete a disposable fictional user', function () {
    $fictionalUser = (new FictionalUser(
        salutation_type: 'male',
        firstname: 'Api',
        lastname: 'User',
        email: 'bexio-api-client-' . uniqid() . '@example.com',
    ))
        ->attachClient(testClient())
        ->create();

    try {
        $fictionalUser->lastname = 'Updated';
        $updated = $fictionalUser->update();
        $found = FictionalUser::useClient(testClient())->find($fictionalUser->id);

        expect($updated)->toBeInstanceOf(FictionalUser::class)
            ->and($updated->lastname)->toBe('Updated')
            ->and($found)->toBeInstanceOf(FictionalUser::class)
            ->and($found->id)->toBe($fictionalUser->id);
    } finally {
        FictionalUser::useClient(testClient())->delete($fictionalUser->id);
    }
});

<?php

namespace Bexio\Resources\Sales\Quotes\Requests;

use Bexio\Resources\Other\Permissions\Permission;

it('can get Permissions', function () {
    $permission = Permission::useClient(testClient())->all();

    expect($permission)->toBeArray()
        ->and($permission[0])->toBeInstanceOf(Permission::class);
});

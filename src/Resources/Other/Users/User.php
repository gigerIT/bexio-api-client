<?php
declare(strict_types=1);

namespace Bexio\Resources\Other\Users;

use Bexio\Resources\Other\Users\Requests\GetAuthenticatedUserRequest;
use Bexio\Resources\Other\Users\Requests\GetUserRequest;
use Bexio\Resources\Other\Users\Requests\GetUsersRequest;
use Bexio\Resources\Resource;

class User extends Resource
{
    public const INDEX_REQUEST = GetUsersRequest::class;
    public const SHOW_REQUEST = GetUserRequest::class;

    public function __construct(
        public ?int $id = null,
        public ?string $salutation_type = null,
        public ?string $firstname = null,
        public ?string $lastname = null,
        public ?string $email = null,
        public ?bool $is_superadmin = null,
        public ?bool $is_accountant = null,
    ) {
    }

    public function me(): static
    {
        $request = $this->newRequestInstance(GetAuthenticatedUserRequest::class);
        $response = $this->client()->send($request);

        return $request->createDtoFromResponse($response)->attachClient($this->client());
    }
}


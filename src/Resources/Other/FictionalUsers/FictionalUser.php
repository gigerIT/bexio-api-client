<?php
declare(strict_types=1);

namespace Bexio\Resources\Other\FictionalUsers;

use Bexio\Resources\Other\FictionalUsers\Requests\CreateFictionalUserRequest;
use Bexio\Resources\Other\FictionalUsers\Requests\DeleteFictionalUserRequest;
use Bexio\Resources\Other\FictionalUsers\Requests\GetFictionalUserRequest;
use Bexio\Resources\Other\FictionalUsers\Requests\GetFictionalUsersRequest;
use Bexio\Resources\Other\FictionalUsers\Requests\UpdateFictionalUserRequest;
use Bexio\Resources\Resource;

class FictionalUser extends Resource
{
    public const INDEX_REQUEST = GetFictionalUsersRequest::class;
    public const SHOW_REQUEST = GetFictionalUserRequest::class;
    public const CREATE_REQUEST = CreateFictionalUserRequest::class;
    public const UPDATE_REQUEST = UpdateFictionalUserRequest::class;
    public const DELETE_REQUEST = DeleteFictionalUserRequest::class;

    public function __construct(
        public ?int $id = null,
        public ?string $salutation_type = null,
        public ?string $firstname = null,
        public ?string $lastname = null,
        public ?string $email = null,
        public ?int $title_id = null,
    ) {
    }

    public function toApi(): FictionalUser
    {
        return $this->except('id');
    }
}

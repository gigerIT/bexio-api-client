<?php
declare(strict_types=1);

namespace Bexio\Resources\Contacts\Contacts;

use Bexio\Resources\Contacts\Contacts\Enums\ContactType;
use Bexio\Resources\Contacts\Contacts\Requests\CreateContactRequest;
use Bexio\Resources\Contacts\Contacts\Requests\DeleteContactRequest;
use Bexio\Resources\Contacts\Contacts\Requests\GetContactRequest;
use Bexio\Resources\Contacts\Contacts\Requests\GetContactsRequest;
use Bexio\Resources\Contacts\Contacts\Requests\UpdateContactRequest;
use Bexio\Resources\Resource;

class Contact extends Resource
{
    const INDEX_REQUEST = GetContactsRequest::class;
    const SHOW_REQUEST = GetContactRequest::class;
    const CREATE_REQUEST = CreateContactRequest::class;
    const UPDATE_REQUEST = UpdateContactRequest::class;
    const DELETE_REQUEST = DeleteContactRequest::class;


    public function __construct(
        public ?string $name_1 = null,
        public int|ContactType $contact_type_id = ContactType::COMPANY,
        public ?int            $id = null,
        public ?string         $nr = null,
        public ?string         $name_2 = null,
        public ?int            $salutation_id = null,
        public ?string         $salutation_form = null,
        public ?int            $titel_id = null,
        public ?string         $birthday = null,
        public ?string         $address = null,
        public ?string         $postcode = null,
        public ?string         $city = null,
        public ?int            $country_id = null,
        public ?string         $mail = null,
        public ?string         $mail_second = null,
        public ?string         $phone_fixed = null,
        public ?string         $phone_fixed_second = null,
        public ?string         $phone_mobile = null,
        public ?string         $fax = null,
        public ?string         $url = null,
        public ?string         $skype_name = null,
        public ?string         $remarks = null,
        public ?int            $language_id = null,
        public ?bool           $is_lead = null,
        public ?string         $contact_group_ids = null,
        public ?string         $contact_branch_ids = null,
        public int             $user_id = 1,
        public int             $owner_id = 1,
        public ?string         $updated_at = null,
        public ?string         $profile_image = null
    )
    {
    }
}
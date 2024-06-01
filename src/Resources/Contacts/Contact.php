<?php
declare(strict_types=1);

namespace Bexio\Resources\Contacts;

use Bexio\Support\Data;

class Contact extends Data
{
    public function __construct(
        public readonly int     $id,
        public readonly string  $nr,
        public readonly int     $contact_type_id,
        public readonly string  $name_1,
        public readonly ?string $name_2,
        public readonly ?int    $salutation_id,
        public readonly ?string $salutation_form,
        public readonly ?int    $title_id,
        public readonly ?string $birthday,
        public readonly ?string $address,
        public readonly ?int    $postcode,
        public readonly ?string $city,
        public readonly ?int    $country_id,
        public readonly ?string $mail,
        public readonly ?string $mail_second,
        public readonly ?string $phone_fixed,
        public readonly ?string $phone_fixed_second,
        public readonly ?string $phone_mobile,
        public readonly ?string $fax,
        public readonly ?string $url,
        public readonly ?string $skype_name,
        public readonly ?string $remarks,
        public readonly ?int    $language_id,
        public readonly ?bool   $is_lead,
        public readonly ?string $contact_group_ids,
        public readonly ?string $contact_branch_ids,
        public readonly int     $user_id,
        public readonly int     $owner_id,
        public readonly string  $updated_at,
        public readonly ?string $profile_image
    )
    {
    }
}
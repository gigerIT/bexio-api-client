<?php
declare(strict_types=1);


namespace Bexio\Resources\Other\CompanyProfile;

use Bexio\Resources\Other\CompanyProfile\Requests\GetCompanyProfileRequest;
use Bexio\Resources\Other\CompanyProfile\Requests\GetCompanyProfilesRequest;
use Bexio\Resources\Resource;

class CompanyProfile extends Resource
{
    const INDEX_REQUEST = GetCompanyProfilesRequest::class;

    const SHOW_REQUEST = GetCompanyProfileRequest::class;

    public function __construct(
        public string  $name,
        public ?int    $id = null,
        public ?string $address = null,
        public ?string $address_nr = null,
        public ?string $postcode = null,
        public ?string $city = null,
        public ?int    $country_id = null,
        public ?string $legal_form = null,
        public ?string $country_name = null,
        public ?string $mail = null,
        public ?string $phone_fixed = null,
        public ?string $phone_mobile = null,
        public ?string $fax = null,
        public ?string $url = null,
        public ?string $skype_name = null,
        public ?string $facebook_name = null,
        public ?string $twitter_name = null,
        public ?string $description = null,
        public ?string $ust_id_nr = null,
        public ?string $mwst_nr = null,
        public ?string $trade_register_nr = null,
        public ?bool   $has_own_logo = null,
        public ?bool   $is_public_profile = null,
        public ?bool   $is_logo_public = null,
        public ?bool   $is_address_public = null,
        public ?bool   $is_phone_public = null,
        public ?bool   $is_mobile_public = null,
        public ?bool   $is_fax_public = null,
        public ?bool   $is_mail_public = null,
        public ?bool   $is_url_public = null,
        public ?bool   $is_skype_public = null,
        public ?string $logo_base64 = null,
    )
    {
    }
}
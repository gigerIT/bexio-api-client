<?php
declare(strict_types=1);

namespace Bexio\Resources\Sales\Invoices;

use Bexio\Resources\Resource;
use Bexio\Resources\Sales\MwstType;
use Saloon\Http\Response;

class Invoice extends Resource
{
    public function __construct(
        public ?int      $id = null,
        public ?string   $title = null,
        public ?int      $contact_id = null,
        public ?int      $contact_sub_id = null,
        public ?int      $user_id = 1,
        public ?int      $pr_project_id = null,
        public ?int      $language_id = null,

        public ?int      $bank_account_id = null,
        public ?int      $currency_id = null,
        public ?int      $payment_type_id = null,

        public ?string   $header = null,
        public ?string   $footer = null,

        public ?MwstType $mwst_type = null,
        public ?bool     $show_position_taxes = null,

        public ?string   $is_valid_from = null,
    )
    {
    }


    public function issue(?int $id = null): Response
    {
        return $this->client()->send(new Requests\IssueInvoiceRequest($id ?? $this->id));
    }

    public function revertIssue(?int $id = null): Response
    {
        return $this->client()->send(new Requests\RevertIssueInvoiceRequest($id ?? $this->id));
    }
}
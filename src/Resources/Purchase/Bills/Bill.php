<?php
declare(strict_types=1);

namespace Bexio\Resources\Purchase\Bills;

use Bexio\Resources\Purchase\Bills\Enums\BillStatus;
use Bexio\Resources\Purchase\Bills\Requests\GetBillRequest;
use Bexio\Resources\Resource;

class Bill extends Resource
{
    const SHOW_REQUEST = GetBillRequest::class;

    public readonly string $id;
    public readonly ?string $firstname_suffix;
    public readonly ?string $lastname_company;
    public readonly ?string $created_at;

    public function __construct(
        public int          $supplier_id,
        public int          $contact_partner_id,
        public BillAddress  $address,

        public string       $bill_date,
        public string       $due_date,

        /* indicates whether 'amount_man' or 'amount_calc' is required and considered as bill amount */
        public bool         $manual_amount = false,
        public ?float       $amount = null,

        /* Required when 'manual_amount' is true. Maximum of 17 digits and maximum of 2 decimal digits. */
        public ?float       $amount_man = null,

        /* Required when 'manual_amount' is false. Maximum of 17 digits and maximum of 2 decimal digits. */
        public ?float       $amount_calc = null,

        public string       $currency_code = 'CHF',
        public ?float       $exchange_rate = null,
        public ?float       $base_currency_amount = null,
        public ?string      $base_currency_code = null,

        /* Indicates whether 'amount' in 'line_items' is net or gross. */
        public bool         $item_net = true,

        public ?int         $purchase_order_id = null,

        public ?string      $qr_bill_information = null,

        public array        $attachment_ids = [],

        public ?string      $document_no = null,
        public ?string      $title = null,

        public ?string      $contact_address_manual = null,

        /* @var BillLineItem[] */
        public array        $line_items = [],

        /* @var BillDiscount[] */
        public array        $discounts = [],

        public ?BillPayment $payment = null,

        public ?BillStatus  $status = null,
        public ?string      $vendor_ref = null,
        public ?float       $pending_amount = null,

        public bool         $overdue = false,
        public bool         $split_into_line_items = false
    )
    {
    }
}

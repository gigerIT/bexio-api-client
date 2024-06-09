<?php
declare(strict_types=1);

namespace Bexio\Resources\Purchase\Bills;

use Bexio\Resources\Purchase\Bills\Enums\BillStatus;
use Bexio\Resources\Purchase\Bills\Requests\CreateBillRequest;
use Bexio\Resources\Purchase\Bills\Requests\DeleteBillRequest;
use Bexio\Resources\Purchase\Bills\Requests\GetBillRequest;
use Bexio\Resources\Resource;


class Bill extends Resource
{
    const SHOW_REQUEST = GetBillRequest::class;

    const CREATE_REQUEST = CreateBillRequest::class;

    const DELETE_REQUEST = DeleteBillRequest::class;


    public string $id;
    public ?string $document_no;

    public BillStatus $status;

    public bool $overdue;

    public ?string $firstname_suffix;
    public ?string $lastname_company;
    public ?string $created_at;

    public ?float $pending_amount;

    public bool $split_into_line_items;


    public function __construct(
        public int          $supplier_id,
        public int          $contact_partner_id,
        public BillAddress  $address,

        public string       $bill_date,
        public string       $due_date,

        /** @var BillLineItem[] */
        public array        $line_items,

        public ?string      $title = null,

        /* indicates whether 'amount_man' or 'amount_calc' is required and considered as bill amount */
        public bool         $manual_amount = false,

        /* Required when 'manual_amount' is true. Maximum of 17 digits and maximum of 2 decimal digits. */
        public ?float       $amount_man = null,

        /* Required when 'manual_amount' is false. Maximum of 17 digits and maximum of 2 decimal digits. */
        public ?float       $amount_calc = 100.00,

        public string       $currency_code = 'CHF',
        public ?float       $exchange_rate = null,
        public ?float       $base_currency_amount = null,

        /* Indicates whether 'amount' in 'line_items' is net or gross. */
        public bool         $item_net = true,

        public ?int         $purchase_order_id = null,

        public ?string      $qr_bill_information = null,

        public array        $attachment_ids = [],


        /** @var BillDiscount[] */
        public array        $discounts = [],

        public ?BillPayment $payment = null,

        public ?string      $vendor_ref = null,
    )
    {
    }
}

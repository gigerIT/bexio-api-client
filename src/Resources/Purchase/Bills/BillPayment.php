<?php
declare(strict_types=1);


namespace Bexio\Resources\Purchase\Bills;

use Bexio\Resources\Purchase\Bills\Enums\BillPaymentType;
use Bexio\Resources\Resource;

class BillPayment extends Resource
{
    /**
     * type
     * required
     * string
     * Enum: "IBAN" "MANUAL" "QR"
     * QR is allowed only when Bill 'currency_code' is 'CHF' or 'EUR’.
     *
     * bank_account_id
     * integer <int32>
     * fee
     * string
     * Enum: "BY_SENDER" "BY_RECEIVER" "BREAKDOWN" "NO_FEE"
     * execution_date
     * required
     * string <date>
     * exchange_rate
     * number <double>
     * Maximum of 5 digits and maximum of 10 decimal digits.
     *
     * amount
     * required
     * number <double>
     * Maximum of 17 digits and maximum of 2 decimal digits.
     *
     * iban
     * string [ 1 .. 100 ] characters
     * name
     * string [ 1 .. 70 ] characters
     * address
     * string [ 1 .. 255 ] characters
     * street
     * string [ 1 .. 255 ] characters
     * house_no
     * string [ 1 .. 10 ] characters
     * postcode
     * string [ 1 .. 10 ] characters
     * city
     * string [ 1 .. 80 ] characters
     * country_code
     * string [ 1 .. 4 ] characters
     * message
     * string [ 1 .. 140 ] characters
     * booking_text
     * string [ 1 .. 35 ] characters
     * salary_payment
     * required
     * boolean
     * reference_no
     * string [ 1 .. 27 ] characters
     * note
     * string [ 1 .. 80 ] characters
     */
    public function __construct(
        public BillPaymentType $type,
        public string          $execution_date,
        public float           $amount,
        public bool            $salary_payment = false,

        public ?int            $bank_account_id = null,
        public ?BillPaymentFee $fee = null,
        public ?float          $exchange_rate = null,
        public ?string         $iban = null,
        public ?string         $name = null,
        public ?string         $address = null,
        public ?string         $street = null,
        public ?string         $house_no = null,
        public ?string         $postcode = null,
        public ?string         $city = null,
        public ?string         $country_code = null,
        public ?string         $message = null,
        public ?string         $booking_text = null,
        public ?string         $reference_no = null,
        public ?string         $note = null,
    )
    {
    }
}
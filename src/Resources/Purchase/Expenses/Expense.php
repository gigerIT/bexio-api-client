<?php
declare(strict_types=1);


namespace Bexio\Resources\Purchase\Expenses;

use Bexio\Resources\Purchase\Expenses\Requests\CreateExpenseRequest;
use Bexio\Resources\Purchase\Expenses\Requests\DeleteExpenseRequest;
use Bexio\Resources\Purchase\Expenses\Requests\DuplicateExpenseRequest;
use Bexio\Resources\Purchase\Expenses\Requests\GetExpenseDocumentNumberRequest;
use Bexio\Resources\Purchase\Expenses\Requests\GetExpenseRequest;
use Bexio\Resources\Purchase\Expenses\Requests\GetExpensesRequest;
use Bexio\Resources\Purchase\Expenses\Requests\UpdateExpenseBookingRequest;
use Bexio\Resources\Purchase\Expenses\Requests\UpdateExpenseRequest;
use Bexio\Resources\Resource;

class Expense extends Resource
{
    public const INDEX_REQUEST = GetExpensesRequest::class;
    public const SHOW_REQUEST = GetExpenseRequest::class;
    public const CREATE_REQUEST = CreateExpenseRequest::class;
    public const UPDATE_REQUEST = UpdateExpenseRequest::class;
    public const DELETE_REQUEST = DeleteExpenseRequest::class;

    public function __construct(
        public ?string $paid_on = null,
        public ?string $currency_code = null,
        public ?float $amount = null,
        public array $attachment_ids = [],
        public ?string $id = null,
        public ?string $document_no = null,
        public ?string $status = null,
        public ?string $firstname_suffix = null,
        public ?string $lastname_company = null,
        public ?string $vendor = null,
        public ?string $title = null,
        public ?int $supplier_id = null,
        public ?int $bank_account_id = null,
        public ?int $booking_account_id = null,
        public ?string $base_currency_code = null,
        public ?float $exchange_rate = null,
        public ?float $base_currency_amount = null,
        public ?float $net = null,
        public ?float $gross = null,
        public ?float $tax_man = null,
        public ?float $tax_calc = null,
        public ?int $tax_id = null,
        public ?string $project_id = null,
        public ?int $chargeable_contact_id = null,
        public ?string $transaction_id = null,
        public ?string $invoice_id = null,
        public ?array $address = null,
        public ?string $created_at = null,
        public ?string $vendor_ref = null,
    ) {
    }

    public function toApi(): Expense
    {
        return $this->except(
            'id',
            'document_no',
            'status',
            'firstname_suffix',
            'lastname_company',
            'vendor',
            'created_at',
            'base_currency_code',
            'net',
            'gross',
            'tax_man',
            'tax_calc',
            'transaction_id',
            'invoice_id',
            'project_id',
        );
    }

    public function duplicate(?string $id = null): Expense
    {
        $request = new DuplicateExpenseRequest($id ?? $this->id);
        $response = $this->client()->send($request);

        return $request->createDtoFromResponse($response)->attachClient($this->client());
    }

    public function book(string $status = 'DONE', ?string $id = null): Expense
    {
        $request = new UpdateExpenseBookingRequest(
            id: $id ?? $this->id,
            status: $status,
        );
        $response = $this->client()->send($request);

        return $request->createDtoFromResponse($response)->attachClient($this->client());
    }

    public function validateDocumentNumber(string $documentNumber): array
    {
        $request = new GetExpenseDocumentNumberRequest($documentNumber);
        $response = $this->client()->send($request);

        return $request->createDtoFromResponse($response);
    }
}

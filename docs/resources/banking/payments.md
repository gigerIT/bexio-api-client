# Banking payments (v4)

Use `Bexio\Resources\Banking\Payments\Payment` for `/4.0/banking/payments`.
The legacy v3 IBAN/QR classes remain available for existing integrations.

Create with a bank account UUID in `account_id`, a `PaymentRecipient`, an amount,
ISO currency, execution date, `is_salary`, and `type` (`iban` or `qr`). The client
serializes amounts as JSON numbers even when a fetched amount is a string.
`refresh()`, `save()` and `delete()` use the payment UUID when available.

Updates include the payment `type`: the live API requires it although the
published update schema omits it. QR requests omit the IBAN-only `allowance`
field. Optional unset fields are omitted when the API rejects explicit nulls.

QR payments support `qr_reference_number` and `additional_information` on both
create and update. For IBAN payments use `message`; the live API does not retain
QR additional information on an IBAN payment. `purchase_reference` is accepted
in create payloads and omitted from updates.

List pagination uses zero-based `page` and `per-page`. The builder's
`forPage(1, 20)` translates the public one-based page to API page zero.
`offset()` and `orderBy()` are unsupported.

Verified on 2026-10-02 with disposable, unsubmitted IBAN and QR payments,
including update and deletion. No transmission endpoint is invoked by these
operations. [Official contract](https://docs.bexio.com/#tag/Payments).

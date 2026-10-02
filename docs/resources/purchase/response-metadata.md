# Purchase response metadata

Bills preserve list totals (`gross`, `net`), `vendor`, `booking_account_ids`,
`average_exchange_rate_enabled` and `base_currency_code`. These are response
fields and are excluded when reusing a fetched bill for create/update.
Bill line items retain `id` and calculated `tax_calc`; discounts retain `id`.
Updates preserve those child IDs, while creates omit them and calculated taxes.
`BillPayment` also accepts `account_no`. Use the request classes or
`Bill::toApiPayload()` for a write body.

Purchase orders likewise preserve `total_rounding_difference` without writing
it back. The shared trial account denies purchase-order writes; their exact
serialization tests run independently of the full-account live lifecycle.

[Official bills contract](https://docs.bexio.com/#tag/Bills), reviewed 2026-10-02.

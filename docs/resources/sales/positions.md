# Sales positions

Invoices, orders and quotes support article, custom, text, subposition, subtotal,
discount and pagebreak positions. Deliveries only hydrate embedded positions.

Fetched positions preserve calculated values such as `pos`, `position_total`,
`tax_value`, `unit_name`, quantities, group `total_sum` and `show_pos_prices`.
Those fields are excluded when a hydrated position is reused for create/update,
including positions inside a document create.
Invoice/quote `SalesTax` summaries also preserve the returned `value`.
Dedicated creation returns the concrete position DTO.

Use `createFor($document)` to create a position and
`$document->updatePosition($position)` to update it. Dedicated article creation
sends `article_id`; article updates omit that immutable field. Position updates
omit `parent_id`. Quotes and orders accept `is_optional` on every position type;
invoice position requests omit it because invoices reject it. A non-null parent
can still be set for supported nested position creation.

Positions passed to a document's `create()` are sent inline. A document that
contains article or subposition positions is created empty first, and then all
of its positions are added in order through the dedicated endpoints, because
Bexio rejects inline subpositions. Positions with a `parent_id` can't be part
of a document create: create the document, then `attachTo()` the created parent
and `createFor()` the document.

To see the exact body a position or document sends, call
`toWritePayload(WriteOperation::CREATE, KbDocumentType::OFFER)` (or `UPDATE`).

All seven types were verified through disposable invoice, order and quote
create/show/list/update, hydrated reuse and deletion on 2026-10-02, and the
write rules were re-verified live on 2026-10-23. The live schema is stricter
than some [official position samples](https://docs.bexio.com/#operation/v2CreateItemPosition).

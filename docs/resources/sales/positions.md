# Sales positions

Invoices, orders and quotes support article, custom, text, subposition, subtotal,
discount and pagebreak positions. Deliveries only hydrate embedded positions.

Fetched positions preserve calculated values such as `pos`, `position_total`,
`tax_value`, `unit_name`, quantities, group `total_sum` and `show_pos_prices`.
Those fields are excluded when a hydrated position is reused for create/update.
Invoice/quote `SalesTax` summaries also preserve the returned `value`.
Dedicated creation returns the concrete position DTO.

Use `createFor($document)` to create a position and
`$document->updatePosition($position)` to update it. Dedicated article creation
sends `article_id`; article updates omit that immutable field. Position updates
omit `parent_id`. Invoice position requests omit `is_optional`, which their live
widget schema rejects. A non-null parent can still be set for supported nested
position creation.

All seven types were verified through disposable invoice, order and quote
create/show/list/update, hydrated reuse and deletion on 2026-10-02. The live schema is stricter than some
[official position samples](https://docs.bexio.com/#operation/v2CreateItemPosition).

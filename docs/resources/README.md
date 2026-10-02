# Resource Guides

Detailed package usage lives in segmented resource guides under `docs/resources/` so the root `README.md` can stay focused on installation, authentication, and package overview.

## Shared Query Pattern

- Use `Resource::useClient($client)->query()->get()` to fetch collections through a query builder.
- Use `first()` for a single result.
- Common builder methods are `limit()`, `offset()`, `forPage()`, `orderBy()`, and `when()`.
- Search-enabled builders switch from the list endpoint to the matching search endpoint as soon as you add a `where(...)`, `whereIn(...)`, `whereNull()`, `whereNotNull()`, or `whereBetween()` clause.
- The public collection method is `get()`. Do not use the removed `search()` API from older examples.

## Contacts

- [Contacts module index](contacts/README.md)
- [Contacts](contacts/contacts.md)
- [Contact Relations](contacts/contact-relations.md)
- [Contact Groups](contacts/contact-groups.md)
- [Contact Sectors](contacts/contact-sectors.md)
- [Additional Addresses](contacts/additional-addresses.md)
- [Salutations](contacts/salutations.md)
- [Titles](contacts/titles.md)

## Sales

- [Sales guides index](sales/README.md)
- [Orders](sales/orders.md)
- [Quotes](sales/quotes.md)
- [Position metadata and writes](sales/positions.md)
- [Document templates](sales/document-templates.md)

## Payroll

- [Paystub downloads](payroll/documents.md)
- [Employees and absences](payroll/employees-and-absences.md)

## Accounting

- [VAT periods](accounting/vat-periods.md)
- [Response metadata](accounting/response-metadata.md)
- [Manual entries and attachments](accounting/manual-entries.md)

## Banking

- [Bank accounts](banking/bank-accounts.md)
- [V4 payments](banking/payments.md)

## Other

- [Note and task mappings](other/notes-and-tasks.md)

## Projects

- [Project numbering](projects/projects.md)
- [Timesheets](projects/timesheets.md)

## Purchase

- [OAuth scopes](purchase/scopes.md)
- [Response metadata](purchase/response-metadata.md)
- [Outgoing payments](purchase/outgoing-payments.md)

## Source Of Truth

- Package behavior: `src/`
- Live usage examples: `tests/Resources/`
- Bundled upstream API reference: `docs/bexio-api-docs.md`

# Audit Findings Fix Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Fix all five correctness and verification findings from the API-client audit with focused regression tests.

**Architecture:** Preserve the existing Resource, Saloon request, and Spatie Data patterns. Fix each defect at its narrowest boundary: query hydration, multipart serialization, payroll request defaults, payment update serialization, and order-repetition response validation.

**Tech Stack:** PHP 8.2+, Saloon, Spatie Laravel Data, Pest 3, PHPStan.

---

### Task 1: Attach the client to queried resources

**Files:**
- Modify: `src/Support/QueryBuilder.php`
- Test: `tests/Unit/QueryBuilderTest.php`

- [x] **Step 1: Write a failing query-result behavior test**

Add a mocked resource query which returns an `Order`, then call an instance operation such as `refresh()` on that result. Mock both the list and show requests and assert the refreshed DTO is returned. The test must fail first because `Resource::$client` is uninitialized.

- [x] **Step 2: Run the focused test and verify RED**

Run: `php vendor/bin/pest tests/Unit/QueryBuilderTest.php --filter='attaches the client' --colors=never`

Expected: failure caused by accessing the uninitialized resource client.

- [x] **Step 3: Attach clients at the query execution boundary**

After `createDtoFromResponse`, map returned values and call `attachClient($this->client)` only for instances of `Bexio\Resources\Resource`. Preserve non-resource arrays and scalar values unchanged.

- [x] **Step 4: Run focused and related tests**

Run: `php vendor/bin/pest tests/Unit/QueryBuilderTest.php --colors=never`

Expected: all tests pass.

- [x] **Step 5: Commit only this task**

Commit subject: `fix: attach client to query results`

### Task 2: Preserve uploaded file bytes and metadata

**Files:**
- Modify: `src/Resources/Files/Requests/CreateFileRequest.php`
- Create: `tests/Unit/Resources/Files/FileUploadPayloadTest.php`

- [x] **Step 1: Write failing multipart serialization tests**

Create temporary text content in the test. Build `CreateFileRequest`, inspect its multipart value, and assert the stream bytes exactly equal the original bytes, the original filename is retained, and the MIME type is `text/plain`. Also assert an extensionless filename is not changed to `.pdf`.

- [x] **Step 2: Run the focused test and verify RED**

Run: `php vendor/bin/pest tests/Unit/Resources/Files/FileUploadPayloadTest.php --colors=never`

Expected: failure because current code rewrites text to pseudo-PDF and renames extensionless files.

- [x] **Step 3: Implement transparent multipart upload**

Remove automatic `.pdf` suffixing and the `text/plain` conversion block. Continue opening the source stream, using the explicitly supplied name or basename, detecting/using MIME type, and passing the original stream to `MultipartValue`.

- [x] **Step 4: Run focused tests**

Run: `php vendor/bin/pest tests/Unit/Resources/Files/FileUploadPayloadTest.php --colors=never`

Expected: all tests pass.

- [x] **Step 5: Commit only this task**

Commit subject: `fix: preserve uploaded file contents`

### Task 3: Always send the required employee snapshot date

**Files:**
- Modify: `src/Resources/Payroll/Employees/Requests/GetEmployeeRequest.php`
- Test: `tests/Resources/Payroll/Employees/EmployeeRequestsTest.php`

- [x] **Step 1: Write failing request and refresh-oriented tests**

Assert `new GetEmployeeRequest($id)` includes today's `Y-m-d` value in `date`. Keep the explicit-date assertion to prove caller input wins. Use Carbon's test clock for deterministic behavior. Add a mocked `Employee::refresh()` case if needed to cover the inherited call path.

- [x] **Step 2: Run the focused test and verify RED**

Run: `php vendor/bin/pest tests/Resources/Payroll/Employees/EmployeeRequestsTest.php --filter='employee requests' --colors=never`

Expected: failure because the current default query omits `date`.

- [x] **Step 3: Default missing dates at the request boundary**

In `defaultQuery()`, emit the explicit date or `Carbon\CarbonImmutable::now()->toDateString()`. Never omit the API-required query key. Preserve the current optional public method argument for backward compatibility.

- [x] **Step 4: Run the payroll request tests**

Run: `php vendor/bin/pest tests/Resources/Payroll/Employees/EmployeeRequestsTest.php --colors=never`

Expected: all tests pass.

- [x] **Step 5: Commit only this task**

Commit subject: `fix: default employee snapshot date`

### Task 4: Separate payment update serialization

**Files:**
- Modify: `src/Resources/Banking/Payments/Payment.php`
- Modify: `src/Resources/Banking/Payments/Requests/UpdatePaymentRequest.php`
- Create or modify: `tests/Unit/Resources/Banking/PaymentPayloadTest.php`

- [x] **Step 1: Write a failing update-body test**

Hydrate a payment containing response/create-only fields. Assert an update body contains only the documented `PaymentUpdate` fields: `allowance`, `amount`, `currency`, `execution_date`, `is_salary`, `recipient`, `is_editing_restricted`, and `message`. Specifically reject `account_id`, `type`, `qr_reference_number`, and `additional_information`.

- [x] **Step 2: Run the focused test and verify RED**

Run: `php vendor/bin/pest tests/Unit/Resources/Banking/PaymentPayloadTest.php --colors=never`

Expected: failure because the update request reuses the create serializer.

- [x] **Step 3: Add a dedicated update serializer**

Add `Payment::toUpdateApi()` using `only(...)` for the documented update fields. Change `UpdatePaymentRequest::defaultBody()` to serialize `toUpdateApi()`. Leave create serialization unchanged.

- [x] **Step 4: Run focused tests**

Run: `php vendor/bin/pest tests/Unit/Resources/Banking/PaymentPayloadTest.php --colors=never`

Expected: all tests pass.

- [x] **Step 5: Commit only this task**

Commit subject: `fix: restrict payment update payload`

### Task 5: Validate order-repetition response payloads

**Files:**
- Modify: `src/Resources/Sales/Orders/OrderRepetition.php`
- Test: `tests/Unit/Resources/Sales/OrderEndpointTest.php`

- [x] **Step 1: Write a failing malformed-response test**

Call `OrderRepetition::fromApiPayload()` with missing or incorrectly typed `start` or `repetition` data and assert a clear `UnexpectedValueException`, rather than undefined-index/type errors.

- [x] **Step 2: Run the focused test and verify RED**

Run: `php vendor/bin/pest tests/Unit/Resources/Sales/OrderEndpointTest.php --filter='rejects malformed order repetition' --colors=never`

Expected: failure because current code indexes the unvalidated array.

- [x] **Step 3: Validate the untrusted response boundary**

Broaden the input annotation to accept a generic API array, validate required `start` and `repetition`, validate optional `end`, and throw `UnexpectedValueException` with an actionable message for invalid payloads. Keep valid DTO mapping unchanged.

- [x] **Step 4: Run tests and PHPStan**

Run: `php vendor/bin/pest tests/Unit/Resources/Sales/OrderEndpointTest.php --colors=never`

Run: `composer test:types`

Expected: tests pass and PHPStan reports zero errors.

- [x] **Step 5: Commit only this task**

Commit subject: `fix: validate order repetition responses`

### Final Verification

- [x] Run `php vendor/bin/pest tests/Unit --colors=never`.
- [x] Run `composer test:types`.
- [x] Run relevant safe request-construction tests without invoking mutating live API operations.
- [x] Review whether `AGENTS.md`, code comments, public resource docs, or the Boost skill require durable updates; do not document speculative behavior.

# Employees and absences

Employee `address` accepts structured `street_name` and `house_number`; the
legacy `street` field is deprecated upstream. `stay_permit_category`, employment
level, working hours and calculated vacation values are response metadata and
are excluded from employee writes. A successful PATCH with HTTP 204 returns the
submitted DTO because the server supplies no replacement body.

Absence requests require employee context. List, show and create responses retain
the route's employee ID so a returned absence can be passed directly to its
update request. HTTP 204 updates retain the submitted absence. The list request
requires `businessYear`.

The shared trial account cannot access payroll. Exact request/response contract
tests cover these boundaries; live payroll tests remain enabled for full
accounts. This is an explicit test-account limitation, not verified live payroll
compatibility. [Official contract](https://docs.bexio.com/#tag/Employees), reviewed
2026-10-02.

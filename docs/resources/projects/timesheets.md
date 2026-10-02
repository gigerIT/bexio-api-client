# Timesheets

Supply `tracking` when creating or updating a timesheet. Duration tracking uses
`['type' => 'duration', 'date' => '2026-10-02', 'duration' => '01:15']`; range
tracking uses `type`, `start`, and `end`. Responses can also contain stopwatch
tracking.

The API calculates top-level `date`, `duration`, `running` and travel fields.
The client retains them when reading and excludes them from writes. Live duration
responses use strings such as `1:15` and `0:30` without a leading zero on hours.

Create/update/show/search/delete with a disposable project were verified on
2026-10-02. [Official contract](https://docs.bexio.com/#operation/v2CreateTimesheet).

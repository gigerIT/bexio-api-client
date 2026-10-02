# Project numbering

When Bexio manages project numbers automatically, leave `document_nr` unset.
Create and update requests omit a null value because the live form rejects
that field even when null. Explicit values remain available for accounts
configured for manual numbering, as documented by Bexio.

Response-only `id`, `uuid`, and `nr` are excluded from writes. These rules also
apply when updating a hydrated project.

Automatic-numbering create/update/delete was verified on a disposable project
on 2026-10-02. Explicit manual-number payload preservation is unit-tested;
manual-numbering accounts were not exercised.

Source: [create project](https://docs.bexio.com/#operation/v2CreateProject).

## Milestone updates

`Milestone::update()` sends `PATCH /3.0/projects/{project_id}/milestones/{milestone_id}`.
The official [edit milestone operation](https://docs.bexio.com/#operation/EditMilestone)
still lists POST. On 2026-10-02, POST returned 404 for a retrievable disposable
milestone while PATCH returned 200; create/update/show/delete then passed.
Keep project context on the DTO by creating it with `project_id` or using
`Milestone::useClient($client)->forProject($projectId)` for lookups.

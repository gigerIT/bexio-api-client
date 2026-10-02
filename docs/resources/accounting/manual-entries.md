# Manual entries

Manual entries expose `created_by_user_id`, `edited_by_user_id`, `is_locked`
and `locked_info` as response metadata. Write amounts, currencies and descriptions
inside `entries`; create payloads omit the top-level ID, while updates retain it.
The API has no individual manual-entry show endpoint.

Attachment requests accept the manual-entry ID and, for single/group entries,
the entry-line ID. Omitting the line ID selects the compound-entry route.
Uploads use multipart file streams. File DTOs preserve creation time, extension,
archive/reference flags, source/uploader information and base64 `data` when
returned. Removing an attachment connection does not delete the underlying file.

Disposable single-entry create/update, attachment upload/list/show/unlink and
cleanup were verified on 2026-10-02.
[Official contract](https://docs.bexio.com/#operation/ListManualEntries).

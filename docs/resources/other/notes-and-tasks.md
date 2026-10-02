# Note and task response mappings

Notes and tasks expose `project_id` and send it as `pr_project_id`. Both wire
names hydrate the same public property, so reading and then updating a record
preserves its project association.

Tasks expose `has_reminder` as a boolean. Writes use `have_remember`. Responses
may use either the documented boolean `have_remember` or the live API's string
`has_reminder` (`"true"` / `"false"`); the package normalizes these values.

```php
use Bexio\Resources\Other\Tasks\Task;

$task = Task::useClient($client)->find($taskId);
$projectId = $task->project_id;
$reminderEnabled = $task->has_reminder;

$task->subject = 'Review project';
$updated = $task->update();
```

Changing reminder state on update also requires `remember_type_id` and
`remember_time_id`. The package omits the reminder flag when those are absent.

Project-linked note and task create/read/update/delete flows were verified on
disposable records on 2026-10-02. Sources:
[notes](https://docs.bexio.com/#operation/v2ShowNote) and
[tasks](https://docs.bexio.com/#operation/v2ShowTask).

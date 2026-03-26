# Bexio API Client

This is a client for the Bexio API. It is built with [Saloon](https://saloon.dev/) and [Laravel Data](https://laravel-data.com/).

## Resources

- Properties included in the create request are constructor promoted properties. Other properties that are added by responses of the API are defined as normal class properties.
- `Sales\Invoices\Invoice` uses `createFromApiPayload()` to normalize response-only reporting aliases like `invoice_date` and `toApi()` to keep response-only invoice fields out of create payloads.

## AGENTS.md Maintenance

- Update `AGENTS.md` immediately whenever codebase or project-context changes affect documented components, workflows, architecture, behavior, or any other guidance captured here.
- If you discover missing, unclear, or undocumented context that would have been useful upfront, add it to `AGENTS.md` during the same task so the guide keeps improving for future agents.
- Base `AGENTS.md` updates only on verified changes or context from the current task; do not guess or add unverified guidance.
- Keep the file optimized for signal over volume: summarize, deduplicate, and prune stale or obvious guidance so it stays focused on real project caveats and does not waste tokens over time.
- Apply required documentation updates as part of the same task whenever those conditions are met.
- Treat the task as incomplete until the needed `AGENTS.md` updates are made, or you have verified that no `AGENTS.md` update is needed.
- Before finalizing, verify that any `AGENTS.md` changes are consistent with the completed codebase or project-context changes.

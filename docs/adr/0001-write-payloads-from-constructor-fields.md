# Write payloads come from constructor fields, with attribute exceptions

A sales document's or item position's write payload is its constructor-promoted properties, minus properties marked `#[ResponseOnly]`, plus properties marked `#[Writable]`. Operation, null, and document-type exceptions are declared on the property they govern. This makes the existing "constructor = writable" convention enforceable and keeps each Bexio write quirk next to its field, instead of in per-document strip lists spread across DTOs and requests. The mechanism lives in Sales until another domain adopts it, then moves to `src/Support/`.

## Considered Options

- **Explicit allowlist per document and operation**: rejected; it repeats about 25 field names per document beside the constructor.
- **Central denylist of response-only fields**: rejected; fields filled in by a fetch leak into writes until someone lists them, which is how the scattered strip lists grew.
- **Operation and document-type rules coded in the serializer**: rejected; a reader of a field would have to find its rules elsewhere.

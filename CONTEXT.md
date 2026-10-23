# Bexio API Client

A Laravel package that models the Bexio API as typed resources that read from and write to one Bexio account.

## Language

### Sales

**Sales document**:
An invoice, order, or quote issued to a contact.
_Avoid_: kb document, kb item

**Item position**:
One line of a sales document, typed as article, custom, discount, text, subtotal, subposition, or page break.
_Avoid_: line item (reserved for purchase bills), position row

**Inline position**:
An item position written as part of its sales document's create rather than created on its own afterwards.
_Avoid_: embedded position

**Deferred position**:
An item position created on its own right after its sales document, because it cannot or should not go inline.
_Avoid_: shell-first position, late position

### Writing

**Write payload**:
The body a resource becomes when it is sent to Bexio to create or update a record.
_Avoid_: API payload, request body, write schema

**Response-only field**:
A field Bexio returns on a resource but never accepts in a write payload.
_Avoid_: read-only field, metadata field, reporting field

# Administrator declaration contract

`AdministratorContributionAdmission` is an immutable declaration envelope with a mandatory canonical
Capability and validated same-owner references. It uses released ContributionOwner, SurfaceIdentifierPolicy
and Capability types. It validates definition ownership, workspace/view/template/surface references and
preserves declared route/navigation capability. Each view/workspace receives an explicit access descriptor.

The envelope is not an authorization result. Core must evaluate trust, lifecycle, execution context and
permissions before registry activation or dispatch. No alternate renderer, dispatcher, authentication flow
or active registry is supplied.

## Bounds and compatibility

Paths are limited to 2048 bytes; template references to 255 bytes. Labels, descriptions and keywords retain
their documented character budgets and must be valid UTF-8. Public constructor ordering and declaration
serialization remain compatible with the documented API. Malformed or unbounded inputs are refused.

HTTP renderer/factory bindings accept host requests/handlers and remain SDK/Core delivery contracts.
The package supplies neutral owned declarations and does not import HTTP interfaces.

## Verification and ownership

Package tests cover declaration and admission invariants, ownership, references and hostile boundaries.
The API gate checks Markdown and JSON signatures, defaults, public properties and constant values.
Core retains authorization, lifecycle, persistence and browser/integration assertions.

[Source mappings](source-map.json) record SDK provenance at an exact historical commit. Check current
consumer drift before replacing imports; the source map is not a current deployment report. Values and
ports use direct construction without a container provider. See [integration](integration.md).

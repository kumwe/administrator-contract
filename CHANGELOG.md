# Changelog

## [0.2.0] - 2026-09-07

- Add an owned, versioned admission envelope with a mandatory canonical Capability and validated same-owner references. Bound declaration paths/templates and enforce valid UTF-8 labels.
- Verify API documentation, full method signatures, parameter defaults, properties and constant values against deterministic generated metadata.
- Add package-owned regression and hostile-input tests; refresh the extraction handoff and dependency status.
- This is a release candidate record. Publication follows human merge and the package gate; independent release verification and App integration are separate.

## [0.1.0] - 2026-09-07

- Extract the canonical runtime types recorded in docs/source-map.json and their behavior tests.
- Add standalone Composer, strict analysis, API, archive and clean consumer gates.
- Use published Access Control 0.1.0 and preserve the package-owned behavior and clean consumer gates.
- NRM-2026-036: enabling-refactor; completion_claim: false.

- Add automatic publication of the recorded version after the complete post-merge package gate.
- Independent artifact verification and App adoption remain separate follow-up work.

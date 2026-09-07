# Architecture

Host-neutral administrator contribution declarations and bounded presentation contracts.

Source provenance is recorded in [source-map.json](source-map.json). The package has no App or Extension SDK production dependency. Ports define persistence requirements; concrete implementations remain host-owned. No global state, DI registration or alternate host is introduced.

The current baseline is Extension SDK, not App. Host executable HTTP bindings remain SDK/App-owned until a coordinated neutral-contract successor is released. Contribution owns identity and registry policy; access-control owns capability grammar.

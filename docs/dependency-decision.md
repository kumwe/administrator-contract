# Dependency status

Access Control is exact-pinned to the published 0.1.0 release at
54dbaa1dbffeb09ba390a5e75e8adc951c437a41, identical to the previously reviewed
main source. Existing published Access Context, Contribution and Localization
requirements remain unchanged where used. No development branch or dependency
alias is needed by this package.

Publication resolves the production dependencies and verifies every selected
Kumwe version tag against its Composer source and dist commit. This does not
require a GitHub immutable-release setting or an external attestation.
Independent artifact verification and App integration remain separate stages.

Access Control is not yet indexed by Packagist. Keep its explicit GitHub VCS
repository to resolve the real 0.1.0 release archive. Composer does not inherit
repository configuration from dependencies, so App must configure this repository
at its root until the package is registered. The isolated consumer exercises the
same repository configuration with stable-only dependency selection.

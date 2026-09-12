# Dependencies

Runtime requirements in [composer.json](../composer.json) use exact published Kumwe versions.
The corresponding Git tags resolve to these commits:

| Package | Version | Tag commit |
| --- | --- | --- |
| `kumwe/access-control` | `0.1.2` | `c2420d1ed03bc39eaf5d8b9f5540580c297e3b57` |
| `kumwe/contribution` | `0.1.1` | `2fc75742aa5a7d78418d2f586fa3043271e70082` |

These packages are listed on Packagist. PHP 8.5 and ext-mbstring are also required. This table records
dependency identity, not independent release attestation. Each new exact pin must agree with transitive
exact requirements and pass the package dependency and clean archive consumer gates.

Composer repository configuration is root-only; the package's explicit VCS entry is not inherited by
consumers. Standard registry installation uses the published package coordinates. Verify source and dist
identity from the actual installed graph when qualifying a release.

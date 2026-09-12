---
schema: kumwe-package-release-record/v1
artifact_kind: framework_php
migration_id: KUMWE-MIG-2026-036
change_set: KUMWE-CS-2026-034
source:
  app:
    repository: https://github.com/kumwe/app
    baseline_commit: null
    examined_paths: []
    old_namespace_roots:
      - Kumwe\Extension\Spi\Contribution\
    capability_index_sha256: null
  semantic_inputs:
    - owner: https://github.com/kumwe/extension-sdk
      version_or_commit: e8ec23f155c5836c6bd083f154a8efb6e50aec66
      manifest_or_corpus: src/Spi/Contribution/AdministratorNavigationDefinition.php
      sha256: 8222751a689392979c1fca67710893d34452511570f726c63f1b84d2242f080d
    - owner: https://github.com/kumwe/extension-sdk
      version_or_commit: e8ec23f155c5836c6bd083f154a8efb6e50aec66
      manifest_or_corpus: src/Spi/Contribution/AdministratorRouteDefinition.php
      sha256: 1ad5c2fdc3c318a5f1a9a9e3255e6a4608d01a25f7406969a47a053607632408
    - owner: https://github.com/kumwe/extension-sdk
      version_or_commit: e8ec23f155c5836c6bd083f154a8efb6e50aec66
      manifest_or_corpus: src/Spi/Contribution/AdministratorViewDefinition.php
      sha256: 8501f0653b742c1153d7f73b50664c641a0018e9b915e03690d888a25f3883c9
    - owner: https://github.com/kumwe/extension-sdk
      version_or_commit: e8ec23f155c5836c6bd083f154a8efb6e50aec66
      manifest_or_corpus: src/Spi/Contribution/AdministratorWorkspaceDefinition.php
      sha256: e6260ff8b756b7a934b21804b0aa04182319ec4ec6e83cbbae8493079182f0c4
  examined_dependencies:
    - php ^8.5
    - ext-mbstring *
    - kumwe/access-control 0.1.2
    - kumwe/contribution 0.1.1
target:
  repository: https://github.com/kumwe/administrator-contract
  artifact_identity: kumwe/administrator-contract
  canonical_namespace_or_abi: Kumwe\Administrator\Contract\
ownership:
  responsibility: Host-neutral administrator contribution declarations and bounded presentation contracts.
  non_responsibilities:
    - authorization
    - transactions
    - persistence adapters
    - active registries
    - trust and lifecycle
    - HTTP and rendering
  allowed_dependency_ceiling:
    - php
    - ext-mbstring
    - kumwe/access-control
    - kumwe/contribution
  implementation_owner: kumwe/administrator-contract
  next_consumer: kumwe/app
  public_manifests:
    - path: resources/public-api/v1.json
      sha256: 358f0c10db36d24336a9d9a9eb4aa7883fa52bef89a6405e8ec144045c323234
    - path: resources/capabilities/v1.json
      sha256: 80354d28a5f45f9fdbb832f68f8ef0f4db75d8a626dd31a4d9a0694babdd1bbe
    - path: resources/service-map/v1.json
      sha256: 70639318efb922d2385cd9a099ba020ed3777810e2c3bcd66ab4ce35e038c580
    - path: resources/public-api/signature-details-v1.json
      sha256: f91fd1762fc22d82a4e7238c315c4e21cb3b14e90bd9264c3fcf720b32e7e3a1
  intentionally_excluded:
    - SDK HTTP bindings and renderers remain host-owned
framework_php:
  composer_package: kumwe/administrator-contract
  canonical_namespace: Kumwe\Administrator\Contract\
  public_api_manifest: resources/public-api/v1.json
  capability_manifest: resources/capabilities/v1.json
  service_map: resources/service-map/v1.json
  extracted_symbols:
    - old_fqcn: Kumwe\Extension\Spi\Contribution\AdministratorNavigationDefinition
      new_fqcn: Kumwe\Administrator\Contract\AdministratorNavigationDefinition
      source_path: src/Spi/Contribution/AdministratorNavigationDefinition.php
      target_path: src/AdministratorNavigationDefinition.php
      kind: class
      public_methods:
        - __construct
        - identifier
        - toArray
      public_properties:
        - capability
        - id
        - workspace
        - label
        - description
        - path
        - icon
        - priority
        - keywords
        - surface
      public_constants: []
      compatibility: Canonical namespace ownership move; see COMPATIBILITY.md for validation changes and docs/public-api.md for exact signatures.
      exceptions:
        - InvalidArgumentException
      serialization_contract: Public toArray shape is documented in docs/public-api.md and covered by package-owned tests.
    - old_fqcn: Kumwe\Extension\Spi\Contribution\AdministratorRouteDefinition
      new_fqcn: Kumwe\Administrator\Contract\AdministratorRouteDefinition
      source_path: src/Spi/Contribution/AdministratorRouteDefinition.php
      target_path: src/AdministratorRouteDefinition.php
      kind: class
      public_methods:
        - __construct
        - identifier
        - toArray
      public_properties:
        - methods
        - capability
        - name
        - path
        - view
      public_constants: []
      compatibility: Canonical namespace ownership move; see COMPATIBILITY.md for validation changes and docs/public-api.md for exact signatures.
      exceptions:
        - InvalidArgumentException
      serialization_contract: Public toArray shape is documented in docs/public-api.md and covered by package-owned tests.
    - old_fqcn: Kumwe\Extension\Spi\Contribution\AdministratorViewDefinition
      new_fqcn: Kumwe\Administrator\Contract\AdministratorViewDefinition
      source_path: src/Spi/Contribution/AdministratorViewDefinition.php
      target_path: src/AdministratorViewDefinition.php
      kind: class
      public_methods:
        - __construct
        - identifier
        - toArray
      public_properties:
        - name
        - template
      public_constants: []
      compatibility: Canonical namespace ownership move; see COMPATIBILITY.md for validation changes and docs/public-api.md for exact signatures.
      exceptions:
        - InvalidArgumentException
      serialization_contract: Public toArray shape is documented in docs/public-api.md and covered by package-owned tests.
    - old_fqcn: Kumwe\Extension\Spi\Contribution\AdministratorWorkspaceDefinition
      new_fqcn: Kumwe\Administrator\Contract\AdministratorWorkspaceDefinition
      source_path: src/Spi/Contribution/AdministratorWorkspaceDefinition.php
      target_path: src/AdministratorWorkspaceDefinition.php
      kind: class
      public_methods:
        - __construct
        - assertIdentifier
        - identifier
        - toArray
      public_properties:
        - id
        - label
        - description
        - priority
      public_constants: []
      compatibility: Canonical namespace ownership move; see COMPATIBILITY.md for validation changes and docs/public-api.md for exact signatures.
      exceptions:
        - InvalidArgumentException
      serialization_contract: Public toArray shape is documented in docs/public-api.md and covered by package-owned tests.
  consumers:
    app_code:
      - src/Administrator/Navigation/AdministratorNavigationRegistry.php
      - src/Extension/Contribution/AdministratorRouteRegistry.php
      - src/Extension/Contribution/AdministratorViewRegistry.php
      - src/Extension/Contribution/AdministratorWorkspaceRegistry.php
      - src/Extension/Contribution/CoreContributionRegistrar.php
      - src/Extension/Contribution/CoreExtensionContributions.php
    configuration_and_di: []
    reflection_and_string_references: []
    fixtures_and_examples: []
    external:
      - kumwe/extension-sdk successor deletes moved SDK declarations
  dependency_injection:
    mode: direct
    provider: null
    factories: []
    aliases: []
    service_lifetimes: []
    configuration_keys: []
    provider_absence_reason: Values, ports and deterministic stateless algorithms capture no collaborator or ambient state.
native_cpp: null
php_extension: null
tests:
  moved_or_added:
    - tests/AdmissionBoundaryTest.php
    - tests/ContributionContractTest.php
  remain_in_app_or_consumer:
    - tests/Unit/Administrator/Http/Handler/AdministratorDashboardPreferencesHandlerTest.php
    - tests/Unit/Administrator/Presentation/AdministratorContributionRendererTest.php
    - tests/Unit/InterfaceStandard/SurfaceIdentifierParityTest.php
  split_tests: []
  prohibited_duplicates: []
  corpora:
    - tests/AdmissionBoundaryTest.php
    - tests/ContributionContractTest.php
documentation:
  charter: CHARTER.md
  readme: README.md
  public_api: docs/public-api.md
  architecture: docs/architecture.md
  integration_or_consumer: docs/integration.md
  examples:
    - examples/standalone.php
  changelog_record: "CHANGELOG.md ## 0.2.1"
release_expectations:
  version_policy: SemVer; current published release 0.2.1. Exact consumer pins follow independent artifact verification.
  expected_artifact_types:
    - Composer ZIP
  required_checks:
    - "@composer:validate"
    - "@lint"
    - "@api"
    - "@architecture"
    - "@analyse"
    - "@cs"
    - "@test"
    - "@examples"
    - "@security"
    - "@clean-consumer"
    - "@manifests"
  required_registry_or_installer: Composer
  required_external_attestation: true
governance:
  completion_claim: false
decisions:
  - Canonical namespace move; no aliases or dual production ownership after adoption
  - See docs/dependencies.md for the published stable dependency coordinates
  - Full original source digests remain in docs/source-map.json; governed extracted-symbol inventory uses the exact v2 schema.
  - Owner package contracts are implemented; Core replacement requires verified compatibility and host test retention.
blockers: []
consumer_contract:
  permitted_only_when:
    - The selected published artifact is independently verified.
    - Current SDK/Core consumers and test ownership are checked against the recorded source map.
  consumer_repository: https://github.com/kumwe/app
  dependency_or_native_change: Independently verify and adopt exact kumwe/administrator-contract 0.2.1 with its stable dependency graph; no floating latest or dev aliases.
  namespace_or_api_replacements:
    - Kumwe\Extension\Spi\Contribution\AdministratorNavigationDefinition -> Kumwe\Administrator\Contract\AdministratorNavigationDefinition
    - Kumwe\Extension\Spi\Contribution\AdministratorRouteDefinition -> Kumwe\Administrator\Contract\AdministratorRouteDefinition
    - Kumwe\Extension\Spi\Contribution\AdministratorViewDefinition -> Kumwe\Administrator\Contract\AdministratorViewDefinition
    - Kumwe\Extension\Spi\Contribution\AdministratorWorkspaceDefinition -> Kumwe\Administrator\Contract\AdministratorWorkspaceDefinition
  files_to_update:
    - src/Administrator/Navigation/AdministratorNavigationRegistry.php
    - src/Extension/Contribution/AdministratorRouteRegistry.php
    - src/Extension/Contribution/AdministratorViewRegistry.php
    - src/Extension/Contribution/AdministratorWorkspaceRegistry.php
    - src/Extension/Contribution/CoreContributionRegistrar.php
    - src/Extension/Contribution/CoreExtensionContributions.php
    - tests/Unit/Administrator/Http/Handler/AdministratorDashboardPreferencesHandlerTest.php
    - tests/Unit/Administrator/Presentation/AdministratorContributionRendererTest.php
    - tests/Unit/InterfaceStandard/SurfaceIdentifierParityTest.php
    - composer.json
    - composer.lock
  files_to_remove: []
  tests_to_remove: []
  tests_to_retain_or_add:
    - tests/Unit/Administrator/Http/Handler/AdministratorDashboardPreferencesHandlerTest.php
    - tests/Unit/Administrator/Presentation/AdministratorContributionRendererTest.php
    - tests/Unit/InterfaceStandard/SurfaceIdentifierParityTest.php
  di_or_provisioning_changes:
    - No provider or factories; retain host services and bind host persistence ports explicitly.
  capability_index_changes:
    - Replace implementation owner with exact verified package manifest
  changelog_and_evidence_changes:
    - Record enabling-refactor; completion_claim false
  verification_commands:
    - composer validate --strict
    - composer check
    - Applicable App integration, database, authority and delivery tests
---
# Release contract

## Package contract

This record preserves source provenance, canonical manifests and consumer qualification requirements.
Migration/change-set IDs are stable evidence references; [integration](integration.md) defines the current Core boundary.

## Public API and responsibility

The package owns neutral administrator declarations and bounded presentation contracts. The governed manifests,
[public API](public-api.md) and [declaration contract](contract.md) define exported types, parameters and limits.
No ConfigProvider is needed for direct values and host-supplied ports.

## Dependencies and semantic inputs

[Dependencies](dependencies.md) records the exact current package graph. The source map retains SDK provenance;
the package has no Core or SDK runtime dependency. Contribution owns identity and Access Control owns capability grammar.

## Consumer contract

Use exact independently verified dependencies and canonical types. Core supplies ports and owns authorization,
transactions, persistence, active registries, trust/lifecycle, HTTP/rendering and recovery. The admission envelope
checks portable invariants and never grants execution authority.

## Test ownership

Portable declaration, ownership/reference and bounded-input tests belong here. Core retains service, database,
trust/lifecycle, delivery, browser, recovery and composition tests. Remove implementation-only duplicates together
with their retired implementation after compatibility is proven; split mixed assertions by responsibility.

## Consumer verification

Follow [releasing](releasing.md) for exact source/tag, archive, manifest, registry and no-dev consumer checks.
Published package availability and independently verified Core integration remain distinct evidence states.

## Compatibility and drift

Review [source mappings](source-map.json) against current consumers before replacing old namespace declarations.
Preserve declared access capabilities and explicit host delivery bindings. Portable semantic changes require a
reviewed successor; do not replace newer host behavior with a historical source copy.

## Validation

Run `composer check` for dependency identity, syntax, API/docs, governed manifest checks, architecture, static analysis,
style, tests, examples, security and an isolated no-dev archive consumer. Runtime source and API signatures are unchanged.

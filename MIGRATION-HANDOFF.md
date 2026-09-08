---
schema: "kumwe-migration-handoff/v2"
artifact_kind: "framework_php"
migration_id: "KUMWE-MIG-2026-036"
change_set: "KUMWE-CS-2026-034"
state: "draft_pr_open"
source:
  app:
    repository: "https://github.com/kumwe/app"
    baseline_commit: null
    examined_paths: []
    old_namespace_roots:
      - "Kumwe\\Extension\\Spi\\Contribution\\"
    capability_index_sha256: null
  semantic_inputs:
    -
      owner: "https://github.com/kumwe/extension-sdk"
      version_or_commit: "e8ec23f155c5836c6bd083f154a8efb6e50aec66"
      manifest_or_corpus: "src/Spi/Contribution/AdministratorNavigationDefinition.php"
      sha256: "8222751a689392979c1fca67710893d34452511570f726c63f1b84d2242f080d"
    -
      owner: "https://github.com/kumwe/extension-sdk"
      version_or_commit: "e8ec23f155c5836c6bd083f154a8efb6e50aec66"
      manifest_or_corpus: "src/Spi/Contribution/AdministratorRouteDefinition.php"
      sha256: "1ad5c2fdc3c318a5f1a9a9e3255e6a4608d01a25f7406969a47a053607632408"
    -
      owner: "https://github.com/kumwe/extension-sdk"
      version_or_commit: "e8ec23f155c5836c6bd083f154a8efb6e50aec66"
      manifest_or_corpus: "src/Spi/Contribution/AdministratorViewDefinition.php"
      sha256: "8501f0653b742c1153d7f73b50664c641a0018e9b915e03690d888a25f3883c9"
    -
      owner: "https://github.com/kumwe/extension-sdk"
      version_or_commit: "e8ec23f155c5836c6bd083f154a8efb6e50aec66"
      manifest_or_corpus: "src/Spi/Contribution/AdministratorWorkspaceDefinition.php"
      sha256: "e6260ff8b756b7a934b21804b0aa04182319ec4ec6e83cbbae8493079182f0c4"
  examined_dependencies:
    - "php ^8.5"
    - "ext-mbstring *"
    - "kumwe/access-control 0.1.0"
    - "kumwe/contribution 0.1.0"
  active_related_pull_requests: []
target:
  repository: "https://github.com/kumwe/administrator-contract"
  artifact_identity: "kumwe/administrator-contract"
  canonical_namespace_or_abi: "Kumwe\\Administrator\\Contract\\"
  branch: codex/integration-readiness-20260908
  pull_request: "https://github.com/kumwe/administrator-contract/pull/4"
ownership:
  responsibility: "Host-neutral administrator contribution declarations and bounded presentation contracts."
  non_responsibilities:
    - "authorization"
    - "transactions"
    - "persistence adapters"
    - "active registries"
    - "trust and lifecycle"
    - "HTTP and rendering"
  allowed_dependency_ceiling:
    - "php"
    - "ext-mbstring"
    - "kumwe/access-control"
    - "kumwe/contribution"
  implementation_owner: "kumwe/administrator-contract"
  next_consumer: "kumwe/app"
  public_manifests:
    -
      path: "resources/public-api/v1.json"
      sha256: "358f0c10db36d24336a9d9a9eb4aa7883fa52bef89a6405e8ec144045c323234"
    -
      path: "resources/capabilities/v1.json"
      sha256: "544befcb798ea27deb239b7004ae1ef5b18712409eb3cd6a0b54c3cd1f798692"
    -
      path: "resources/service-map/v1.json"
      sha256: "70639318efb922d2385cd9a099ba020ed3777810e2c3bcd66ab4ce35e038c580"
    -
      path: "resources/public-api/signature-details-v1.json"
      sha256: "63ecabed005aa145b968cabc14d25acff3f89d3451a023662a2d76084a9de252"
  intentionally_excluded:
    - "SDK HTTP bindings and renderers remain host-owned"
framework_php:
  composer_package: "kumwe/administrator-contract"
  canonical_namespace: "Kumwe\\Administrator\\Contract\\"
  public_api_manifest: "resources/public-api/v1.json"
  capability_manifest: "resources/capabilities/v1.json"
  service_map: "resources/service-map/v1.json"
  extracted_symbols:
    -
      old_fqcn: "Kumwe\\Extension\\Spi\\Contribution\\AdministratorNavigationDefinition"
      new_fqcn: "Kumwe\\Administrator\\Contract\\AdministratorNavigationDefinition"
      source_path: "src/Spi/Contribution/AdministratorNavigationDefinition.php"
      target_path: "src/AdministratorNavigationDefinition.php"
      kind: "class"
      public_methods:
        - "__construct"
        - "identifier"
        - "toArray"
      public_properties:
        - "capability"
        - "id"
        - "workspace"
        - "label"
        - "description"
        - "path"
        - "icon"
        - "priority"
        - "keywords"
        - "surface"
      public_constants: []
      compatibility: "Canonical namespace ownership move; see COMPATIBILITY.md for validation changes and docs/public-api.md for exact signatures."
      exceptions:
        - "InvalidArgumentException"
      serialization_contract: "Public toArray shape is documented in docs/public-api.md and covered by package-owned tests."
    -
      old_fqcn: "Kumwe\\Extension\\Spi\\Contribution\\AdministratorRouteDefinition"
      new_fqcn: "Kumwe\\Administrator\\Contract\\AdministratorRouteDefinition"
      source_path: "src/Spi/Contribution/AdministratorRouteDefinition.php"
      target_path: "src/AdministratorRouteDefinition.php"
      kind: "class"
      public_methods:
        - "__construct"
        - "identifier"
        - "toArray"
      public_properties:
        - "methods"
        - "capability"
        - "name"
        - "path"
        - "view"
      public_constants: []
      compatibility: "Canonical namespace ownership move; see COMPATIBILITY.md for validation changes and docs/public-api.md for exact signatures."
      exceptions:
        - "InvalidArgumentException"
      serialization_contract: "Public toArray shape is documented in docs/public-api.md and covered by package-owned tests."
    -
      old_fqcn: "Kumwe\\Extension\\Spi\\Contribution\\AdministratorViewDefinition"
      new_fqcn: "Kumwe\\Administrator\\Contract\\AdministratorViewDefinition"
      source_path: "src/Spi/Contribution/AdministratorViewDefinition.php"
      target_path: "src/AdministratorViewDefinition.php"
      kind: "class"
      public_methods:
        - "__construct"
        - "identifier"
        - "toArray"
      public_properties:
        - "name"
        - "template"
      public_constants: []
      compatibility: "Canonical namespace ownership move; see COMPATIBILITY.md for validation changes and docs/public-api.md for exact signatures."
      exceptions:
        - "InvalidArgumentException"
      serialization_contract: "Public toArray shape is documented in docs/public-api.md and covered by package-owned tests."
    -
      old_fqcn: "Kumwe\\Extension\\Spi\\Contribution\\AdministratorWorkspaceDefinition"
      new_fqcn: "Kumwe\\Administrator\\Contract\\AdministratorWorkspaceDefinition"
      source_path: "src/Spi/Contribution/AdministratorWorkspaceDefinition.php"
      target_path: "src/AdministratorWorkspaceDefinition.php"
      kind: "class"
      public_methods:
        - "__construct"
        - "assertIdentifier"
        - "identifier"
        - "toArray"
      public_properties:
        - "id"
        - "label"
        - "description"
        - "priority"
      public_constants: []
      compatibility: "Canonical namespace ownership move; see COMPATIBILITY.md for validation changes and docs/public-api.md for exact signatures."
      exceptions:
        - "InvalidArgumentException"
      serialization_contract: "Public toArray shape is documented in docs/public-api.md and covered by package-owned tests."
  consumers:
    app_code:
      - "src/Administrator/Navigation/AdministratorNavigationRegistry.php"
      - "src/Extension/Contribution/AdministratorRouteRegistry.php"
      - "src/Extension/Contribution/AdministratorViewRegistry.php"
      - "src/Extension/Contribution/AdministratorWorkspaceRegistry.php"
      - "src/Extension/Contribution/CoreContributionRegistrar.php"
      - "src/Extension/Contribution/CoreExtensionContributions.php"
    configuration_and_di: []
    reflection_and_string_references: []
    fixtures_and_examples: []
    external:
      - "kumwe/extension-sdk successor deletes moved SDK declarations"
  dependency_injection:
    mode: "direct"
    provider: null
    factories: []
    aliases: []
    service_lifetimes: []
    configuration_keys: []
    provider_absence_reason: "Values, ports and deterministic stateless algorithms capture no collaborator or ambient state."
native_cpp: null
php_extension: null
tests:
  moved_or_added:
    - "tests/AdmissionBoundaryTest.php"
    - "tests/ContributionContractTest.php"
  remain_in_app_or_consumer:
    - "tests/Unit/Administrator/Http/Handler/AdministratorDashboardPreferencesHandlerTest.php"
    - "tests/Unit/Administrator/Presentation/AdministratorContributionRendererTest.php"
    - "tests/Unit/InterfaceStandard/SurfaceIdentifierParityTest.php"
  split_tests: []
  prohibited_duplicates: []
  corpora:
    - "tests/AdmissionBoundaryTest.php"
    - "tests/ContributionContractTest.php"
documentation:
  charter: "CHARTER.md"
  readme: "README.md"
  public_api: "docs/public-api.md"
  architecture: "docs/architecture.md"
  integration_or_consumer: "docs/integration.md"
  examples:
    - "examples/standalone.php"
  changelog_record: "CHANGELOG.md ## 0.2.1"
release_expectations:
  version_policy: "SemVer; 0.2.1 successor release record, published baseline 0.2.0. Exact consumer pins follow independent artifact verification."
  expected_artifact_types:
    - "Composer ZIP"
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
  required_registry_or_installer: "Composer"
  required_external_attestation: true
next_task:
  phase_name: "Independent release verification, followed by separately authorized App Phase 2"
  permitted_only_when:
    - "Human review and merge"
    - "All dependencies and this release independently attested"
    - "Current App drift reconciled upstream"
  consumer_repository: "https://github.com/kumwe/app"
  dependency_or_native_change: "After publication and independent verification, adopt exact kumwe/administrator-contract 0.2.0 with its verified stable dependency graph; no floating latest or dev aliases."
  namespace_or_api_replacements:
    - "Kumwe\\Extension\\Spi\\Contribution\\AdministratorNavigationDefinition -> Kumwe\\Administrator\\Contract\\AdministratorNavigationDefinition"
    - "Kumwe\\Extension\\Spi\\Contribution\\AdministratorRouteDefinition -> Kumwe\\Administrator\\Contract\\AdministratorRouteDefinition"
    - "Kumwe\\Extension\\Spi\\Contribution\\AdministratorViewDefinition -> Kumwe\\Administrator\\Contract\\AdministratorViewDefinition"
    - "Kumwe\\Extension\\Spi\\Contribution\\AdministratorWorkspaceDefinition -> Kumwe\\Administrator\\Contract\\AdministratorWorkspaceDefinition"
  files_to_update:
    - "src/Administrator/Navigation/AdministratorNavigationRegistry.php"
    - "src/Extension/Contribution/AdministratorRouteRegistry.php"
    - "src/Extension/Contribution/AdministratorViewRegistry.php"
    - "src/Extension/Contribution/AdministratorWorkspaceRegistry.php"
    - "src/Extension/Contribution/CoreContributionRegistrar.php"
    - "src/Extension/Contribution/CoreExtensionContributions.php"
    - "tests/Unit/Administrator/Http/Handler/AdministratorDashboardPreferencesHandlerTest.php"
    - "tests/Unit/Administrator/Presentation/AdministratorContributionRendererTest.php"
    - "tests/Unit/InterfaceStandard/SurfaceIdentifierParityTest.php"
    - "composer.json"
    - "composer.lock"
  files_to_remove: []
  tests_to_remove: []
  tests_to_retain_or_add:
    - "tests/Unit/Administrator/Http/Handler/AdministratorDashboardPreferencesHandlerTest.php"
    - "tests/Unit/Administrator/Presentation/AdministratorContributionRendererTest.php"
    - "tests/Unit/InterfaceStandard/SurfaceIdentifierParityTest.php"
  di_or_provisioning_changes:
    - "No provider or factories; retain host services and bind host persistence ports explicitly."
  capability_index_changes:
    - "Replace implementation owner with exact verified package manifest"
  changelog_and_evidence_changes:
    - "Record enabling-refactor; completion_claim false"
  verification_commands:
    - "composer validate --strict"
    - "composer check"
    - "Applicable App integration, database, authority and delivery tests"
concurrency:
  likely_conflict_files:
    - "composer.json"
    - "composer.lock"
  related_migrations:
    - "KUMWE-MIG-2026-004"
    - "KUMWE-MIG-2026-005"
    - "KUMWE-MIG-2026-006"
    - "KUMWE-MIG-2026-009"
  ownership_conflicts:
    - "SDK successor must remove old definitions in coordination"
  integration_train: null
  resolution_rule: "semantic-preservation"
governance:
  roadmap_source_sha256: "a202155ef1a65f5ab293d4f8397ebf4ac430db7f1e877c776bbe7851e6fe18d8"
  roadmap_refs: []
  non_roadmap_refs:
    - "NRM-2026-036"
  completion_claim: false
decisions:
  - "Canonical namespace move; no aliases or dual production ownership after adoption"
  - "See docs/dependency-decision.md for the published stable dependency coordinates"
  - "Full original source digests remain in docs/source-map.json; governed extracted-symbol inventory uses the exact v2 schema."
  - "Owner package contracts are implemented; App adoption and legacy deletion remain a separate consumer phase."
blockers:
  - "Review and merge the 0.2.0 source release record after required CI passes."
  - "Verify default-branch publication, exact artifact digest and independent release verification before App adoption."
---
# Migration handoff

## Migration/implementation summary

A versioned owned admission declaration requires an explicit canonical capability and same-owner references. Existing declarations retain their constructors and serialization. UTF-8 text and path/template budgets are enforced. This branch records candidate 0.2.0; the published baseline remains 0.1.0.

## Public API and responsibility

Host-neutral administrator contribution declarations and bounded presentation contracts. The governed API, capability and service manifests above enumerate the complete public surface. resources/public-api/signature-details-v1.json and docs/public-api.md preserve parameter defaults and constant values outside the closed governed schema. See docs/readiness-review.md for closure and host exclusions. No ConfigProvider is needed for directly constructed values, pure algorithms and ports.

## Capability reuse/semantic input review

The examined source files and semantic input digests above preserve extraction provenance. docs/dependency-decision.md records actual stable tag identities. No implementation source is relabeled as a stable release, and no App/SDK runtime dependency is introduced. The current App baseline was inspected read-only; no App source or tests were changed.

## Consumer inventory

The framework consumer inventory covers App production references, configuration/DI, string/reflection use, fixtures and external SDK bindings. The next-task file lists identify namespace replacements and legacy removals. Refresh those lists against the consumer current commit before integration. HTTP handlers, template rendering, active registries, authorization and infrastructure remain host concerns.

## Test ownership

All portable behavior and new boundary regression tests are owned by this repository. The machine-readable test inventory lists package tests, consumer tests to retain, split tests and prohibited duplicates. App acceptance and integration tests are retained for the later adoption phase. They were not run or claimed by this review.

## Next-task execution notes

The selected production dependency tuple is:

- kumwe/access-control 0.1.2
- kumwe/contribution 0.1.1

Published dependency identities and independent archive consumers must be verified before adoption.
The package gate enforces agreement between Composer constraints and the dependency evidence coordinates.

Merge only after required package checks pass. Publish through the existing default-branch release workflow, independently verify the actual archive, then advance the exact dependency pins as a coherent consumer train. The next-task block provides the concrete App changes for that later phase. Completed extraction implementation is documented as present behavior; publication and App acceptance remain open gates.

## Drift check

API JSON, signature details and Markdown are generated from source reflection and checked for byte drift. Capability and service maps use the actual App v2 governance schemas. Handoff manifest hashes describe this source tree. This is a candidate record and keeps completion_claim false; no release-verification attestation has been fabricated.

## Validation recipe and observed local results

Run composer validate --strict and composer check on PHP 8.5 with real stable dependencies. Local PHP 8.5.10 source validation passed 13 tests, 28 assertions, PHPStan at the configured maximum level, coding standards, syntax, architecture and API drift checks. Where registry access was unavailable, local source validation used dependencies archived from exact published Git tags. The complete Package CI passed at source commit cf9a3129c68754c943ed664cf231387515123858 ([run 34162282362](https://github.com/kumwe/administrator-contract/actions/runs/34162282362)), including real Composer installation, security audit, package tests, release automation and the clean built-archive consumer. The same-branch handoff/schema-gate follow-up must also pass required checks before merge. The actual App PackageManifests::read parser was also used read-only to check this package governed manifests and handoff.

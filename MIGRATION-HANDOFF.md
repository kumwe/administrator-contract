# Migration handoff

```yaml
schema: kumwe-migration-handoff/v2
artifact_kind: framework_php
migration_id: KUMWE-MIG-2026-036
change_set: KUMWE-CS-2026-034
state: draft_pr_open
source:
  app:
    repository: https://github.com/kumwe/app
    baseline_commit: null
    examined_paths: []
    old_namespace_roots:
    - Kumwe\Extension\Spi\Contribution
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
    php: ^8.5
    ext-mbstring: '*'
    kumwe/access-control: dev-main
    kumwe/contribution: 0.1.0
  active_related_pull_requests:
  - https://github.com/kumwe/access-control/pull/4
target:
  repository: https://github.com/kumwe/administrator-contract
  artifact_identity: kumwe/administrator-contract
  canonical_namespace_or_abi: Kumwe\Administrator\Contract\
  branch: agent/extract-administrator-contract-runtime-v2
  pull_request: https://github.com/kumwe/administrator-contract/pull/2
ownership:
  responsibility: Host-neutral administrator contribution declarations and bounded
    presentation contracts.
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
    sha256: ea891919a150b1450cac55608a525009ac384d1e6527fb03adf03e8ce05fe881
  - path: resources/capabilities/v1.json
    sha256: c760cca201ebb21d74aa55f1f57636e57a268f0833a8fbd15a6484f20b8e98fa
  - path: resources/service-map/v1.json
    sha256: f8da01ef90edd70f2234b19fa9c1dd340654163925b10b2031c18fb15d606085
  intentionally_excluded:
  - SDK HTTP bindings and renderers remain host-owned
framework_php:
  composer_package: kumwe/administrator-contract
  canonical_namespace: Kumwe\Administrator\Contract\
  public_api_manifest: resources/public-api/v1.json
  capability_manifest: resources/capabilities/v1.json
  service_map: resources/service-map/v1.json
  extracted_symbols:
  - repository: https://github.com/kumwe/extension-sdk
    old_fqcn: Kumwe\Extension\Spi\Contribution\AdministratorNavigationDefinition
    new_fqcn: Kumwe\Administrator\Contract\AdministratorNavigationDefinition
    source_path: src/Spi/Contribution/AdministratorNavigationDefinition.php
    target_path: src/AdministratorNavigationDefinition.php
    source_commit: e8ec23f155c5836c6bd083f154a8efb6e50aec66
    source_sha256: 8222751a689392979c1fca67710893d34452511570f726c63f1b84d2242f080d
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
    compatibility: namespace ownership move; see COMPATIBILITY.md
  - repository: https://github.com/kumwe/extension-sdk
    old_fqcn: Kumwe\Extension\Spi\Contribution\AdministratorRouteDefinition
    new_fqcn: Kumwe\Administrator\Contract\AdministratorRouteDefinition
    source_path: src/Spi/Contribution/AdministratorRouteDefinition.php
    target_path: src/AdministratorRouteDefinition.php
    source_commit: e8ec23f155c5836c6bd083f154a8efb6e50aec66
    source_sha256: 1ad5c2fdc3c318a5f1a9a9e3255e6a4608d01a25f7406969a47a053607632408
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
    compatibility: namespace ownership move; see COMPATIBILITY.md
  - repository: https://github.com/kumwe/extension-sdk
    old_fqcn: Kumwe\Extension\Spi\Contribution\AdministratorViewDefinition
    new_fqcn: Kumwe\Administrator\Contract\AdministratorViewDefinition
    source_path: src/Spi/Contribution/AdministratorViewDefinition.php
    target_path: src/AdministratorViewDefinition.php
    source_commit: e8ec23f155c5836c6bd083f154a8efb6e50aec66
    source_sha256: 8501f0653b742c1153d7f73b50664c641a0018e9b915e03690d888a25f3883c9
    kind: class
    public_methods:
    - __construct
    - identifier
    - toArray
    public_properties:
    - name
    - template
    public_constants: []
    compatibility: namespace ownership move; see COMPATIBILITY.md
  - repository: https://github.com/kumwe/extension-sdk
    old_fqcn: Kumwe\Extension\Spi\Contribution\AdministratorWorkspaceDefinition
    new_fqcn: Kumwe\Administrator\Contract\AdministratorWorkspaceDefinition
    source_path: src/Spi/Contribution/AdministratorWorkspaceDefinition.php
    target_path: src/AdministratorWorkspaceDefinition.php
    source_commit: e8ec23f155c5836c6bd083f154a8efb6e50aec66
    source_sha256: e6260ff8b756b7a934b21804b0aa04182319ec4ec6e83cbbae8493079182f0c4
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
    compatibility: namespace ownership move; see COMPATIBILITY.md
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
    provider_absence_reason: Values, ports and deterministic stateless algorithms
      capture no collaborator or ambient state.
native_cpp: null
php_extension: null
tests:
  moved_or_added:
  - tests/ContributionContractTest.php
  remain_in_app_or_consumer:
  - tests/Unit/Administrator/Http/Handler/AdministratorDashboardPreferencesHandlerTest.php
  - tests/Unit/Administrator/Presentation/AdministratorContributionRendererTest.php
  - tests/Unit/InterfaceStandard/SurfaceIdentifierParityTest.php
  split_tests: []
  prohibited_duplicates: &id001 []
  corpora:
  - path: tests/ContributionContractTest.php
    sha256: 9356b109b650025243a8b0b2e4c40befe16ae67d0bb2e374b601c5c368e9a62e
documentation:
  charter: CHARTER.md
  readme: README.md
  public_api: docs/public-api.md
  architecture: docs/architecture.md
  integration_or_consumer: docs/integration.md
  examples:
  - examples/standalone.php
  changelog_record: CHANGELOG.md / Unreleased
release_expectations:
  version_policy: SemVer; initial version chosen only after review; exact pre-1.0
    consumer pin after independent verification
  expected_artifact_types:
  - Composer ZIP
  required_checks:
  - '@composer:validate'
  - '@lint'
  - '@api'
  - '@architecture'
  - '@analyse'
  - '@cs'
  - '@test'
  - '@examples'
  - '@security'
  - '@clean-consumer'
  required_registry_or_installer: Composer
  required_external_attestation: true
next_task:
  phase_name: Independent release verification, followed by separately authorized
    App Phase 2
  permitted_only_when:
  - Human review and merge
  - All dependencies and this release independently attested
  - Current App drift reconciled upstream
  consumer_repository: https://github.com/kumwe/app
  dependency_or_native_change: Exact-pin independently verified immutable package;
    no adoption of development branches
  namespace_or_api_replacements:
  - old: Kumwe\Extension\Spi\Contribution\AdministratorNavigationDefinition
    new: Kumwe\Administrator\Contract\AdministratorNavigationDefinition
  - old: Kumwe\Extension\Spi\Contribution\AdministratorRouteDefinition
    new: Kumwe\Administrator\Contract\AdministratorRouteDefinition
  - old: Kumwe\Extension\Spi\Contribution\AdministratorViewDefinition
    new: Kumwe\Administrator\Contract\AdministratorViewDefinition
  - old: Kumwe\Extension\Spi\Contribution\AdministratorWorkspaceDefinition
    new: Kumwe\Administrator\Contract\AdministratorWorkspaceDefinition
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
  tests_to_remove: *id001
  tests_to_retain_or_add:
  - tests/Unit/Administrator/Http/Handler/AdministratorDashboardPreferencesHandlerTest.php
  - tests/Unit/Administrator/Presentation/AdministratorContributionRendererTest.php
  - tests/Unit/InterfaceStandard/SurfaceIdentifierParityTest.php
  di_or_provisioning_changes:
  - No provider or factories; retain host services and bind host persistence ports
    explicitly.
  capability_index_changes:
  - Replace implementation owner with exact verified package manifest
  changelog_and_evidence_changes:
  - Record enabling-refactor; completion_claim false
  verification_commands:
  - composer validate --strict
  - composer check
  - Applicable App integration, database, authority and delivery tests
concurrency:
  likely_conflict_files:
  - composer.json
  - composer.lock
  related_migrations:
  - access-context
  - access-control
  - contribution
  - localization
  ownership_conflicts:
  - SDK successor must remove old definitions in coordination
  integration_train: null
  resolution_rule: semantic-preservation
governance:
  roadmap_source_sha256: a202155ef1a65f5ab293d4f8397ebf4ac430db7f1e877c776bbe7851e6fe18d8
  roadmap_refs: []
  non_roadmap_refs:
  - NRM-2026-036
  completion_claim: false
decisions:
- Canonical namespace move; no aliases or dual production ownership after adoption
- See docs/dependency-decision.md; development inputs are not verified stable releases
blockers:
- Human review and independently verified immutable release pending
- Canonical dependency release verification pending
```

# Kumwe Administrator Contract

[![Packagist version][version-badge]][package]
[![CI][ci-badge]][ci]
[![PHP requirement][php-badge]](composer.json)
[![License][license-badge]](LICENSE)

[version-badge]: https://img.shields.io/packagist/v/kumwe/administrator-contract
[package]: https://packagist.org/packages/kumwe/administrator-contract
[ci-badge]: https://github.com/kumwe/administrator-contract/actions/workflows/ci.yml/badge.svg?branch=main
[ci]: https://github.com/kumwe/administrator-contract/actions/workflows/ci.yml?query=branch%3Amain
[php-badge]: https://img.shields.io/packagist/dependency-v/kumwe/administrator-contract/php
[license-badge]: https://img.shields.io/packagist/l/kumwe/administrator-contract

Host-neutral administrator contribution declarations and bounded presentation contracts.
The canonical namespace is `Kumwe\Administrator\Contract\`.

## Installation

Requires PHP 8.5, ext-mbstring and the exact runtime dependencies in [composer.json](composer.json).
Install the published version with an exact pre-1.0 pin:

```bash
composer require kumwe/administrator-contract:0.2.1
```

See [dependencies](docs/dependencies.md) and [release verification](docs/releasing.md) before upgrading.

## Usage

```php
use Kumwe\Administrator\Contract\AdministratorContributionAdmission;
use Kumwe\Administrator\Contract\AdministratorRouteDefinition;
use Kumwe\Administrator\Contract\AdministratorViewDefinition;
use Kumwe\Contribution\ContributionOwner;
use Kumwe\Access\Capability;

$view = new AdministratorViewDefinition('acme.editor.index', 'editor/index.twig');
$route = new AdministratorRouteDefinition(
    'acme.editor.route', '/editor', ['GET'], 'acme.editor.read', $view->identifier(),
);
$admission = new AdministratorContributionAdmission(
    ContributionOwner::extension('acme/editor'), $route, Capability::fromString('acme.editor.read'),
);
```

Admission validates declaration ownership and capability consistency. It is not an authorization result.
The host evaluates trust, lifecycle, execution context and permissions before activation or dispatch.
See the [standalone example](examples/standalone.php), [public API](docs/public-api.md) and
[declaration contract](docs/contract.md) for supported types, limits and refusal behavior.

## Core contract

Values are constructed directly and ports are supplied explicitly; there is no ConfigProvider or alias.
Pure operations capture no actor, site, request, connection or container. Core owns authorization,
transactions, persistence, active registries, dispatch, HTTP/rendering, deployment and recovery.
Contribution owns identity and surface policy; Access Control owns capability grammar.

Core retains acceptance, database, trust/lifecycle, delivery, browser and composition tests. This package
owns declaration and admission invariants. See [integration](docs/integration.md),
[architecture](docs/architecture.md) and [compatibility](COMPATIBILITY.md).

## Development

```bash
composer install
composer check
composer examples
```

The complete gate checks dependency identity, API and governed manifests, architecture, static analysis,
style, package behavior, examples, security and an isolated no-dev archive consumer. CI also verifies
release automation. [Release evidence](docs/release-record.md) preserves source provenance and consumer
qualification requirements. Licensed under [Apache-2.0](LICENSE); see [security reporting](SECURITY.md).

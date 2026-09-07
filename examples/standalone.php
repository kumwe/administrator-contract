<?php
declare(strict_types=1);
if (!class_exists(Composer\Autoload\ClassLoader::class, false)) {
    require dirname(__DIR__) . '/vendor/autoload.php';
}
use Kumwe\Administrator\Contract\AdministratorRouteDefinition;
use Kumwe\Administrator\Contract\AdministratorViewDefinition;
use Kumwe\Administrator\Contract\AdministratorContributionAdmission;
use Kumwe\Contribution\ContributionOwner;
use Kumwe\Access\Capability;
$view = new AdministratorViewDefinition('acme.editor.index', 'editor/index.twig');
$route = new AdministratorRouteDefinition('acme.editor.route', '/editor', ['GET', 'GET'], 'acme.editor.read', $view->identifier());
if ($route->methods !== ['GET']) { throw new RuntimeException('Route normalization failed.'); }
$admission = new AdministratorContributionAdmission(
    ContributionOwner::extension('acme/editor'), $route, Capability::fromString('acme.editor.read'),
);
if ($admission->identifier() !== $route->identifier()) { throw new RuntimeException('Admission changed identity.'); }
echo "Contract declaration example passed.\n";

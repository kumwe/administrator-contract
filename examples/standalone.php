<?php
declare(strict_types=1);
if (!class_exists(Composer\Autoload\ClassLoader::class, false)) {
    require dirname(__DIR__) . '/vendor/autoload.php';
}
use Kumwe\Administrator\Contract\AdministratorRouteDefinition;
use Kumwe\Administrator\Contract\AdministratorViewDefinition;
$view = new AdministratorViewDefinition('acme.editor.index', 'editor/index.twig');
$route = new AdministratorRouteDefinition('acme.editor.route', '/editor', ['GET', 'GET'], 'acme.editor.read', $view->identifier());
if ($route->methods !== ['GET']) { throw new RuntimeException('Route normalization failed.'); }
echo "Contract declaration example passed.\n";

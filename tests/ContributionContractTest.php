<?php

declare(strict_types=1);

namespace Kumwe\Administrator\Contract\Tests;

use InvalidArgumentException;
use Kumwe\Administrator\Contract\AdministratorRouteDefinition;
use Kumwe\Administrator\Contract\AdministratorViewDefinition;
use Kumwe\Administrator\Contract\AdministratorWorkspaceDefinition;
use Kumwe\Administrator\Contract\AdministratorNavigationDefinition;
use PHPUnit\Framework\TestCase;

final class ContributionContractTest extends TestCase
{
    public function testDeclarationsNormalizeAndSerializeWithoutHost(): void
    {
        $workspace = new AdministratorWorkspaceDefinition('acme.editor', 'Editor', 'Edit records', 10);
        $view = new AdministratorViewDefinition('acme.editor.index', 'editor/index.twig');
        $route = new AdministratorRouteDefinition('acme.editor.save', '/editor', ['POST', 'PATCH', 'POST'], 'acme.editor.write', $view->identifier());
        $navigation = new AdministratorNavigationDefinition('acme.editor.home', $workspace->identifier(), 'Editor', 'Edit records', '/editor', 'edit', 'acme.editor.read', 10);
        self::assertSame(['PATCH', 'POST'], $route->methods);
        self::assertSame('acme.editor.write', $route->toArray()['capability']);
        self::assertSame('acme.editor', $navigation->toArray()['workspace']);
        self::assertArrayNotHasKey('surface', $navigation->toArray());
        self::assertSame(['name' => 'acme.editor.index', 'template' => 'editor/index.twig'], $view->toArray());
    }

    public function testRouteRejectsMixedSafeAndMutatingVerbs(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new AdministratorRouteDefinition('acme.editor.route', '/editor', ['GET', 'POST'], 'acme.editor.read', 'acme.editor.view');
    }

    public function testUnownedAndUnboundedIdentifiersAreRejected(): void
    {
        foreach (['unowned', '', str_repeat('a', 192), 'acme.editor/unsafe', "acme.editor\0bad"] as $identifier) {
            try {
                AdministratorWorkspaceDefinition::assertIdentifier($identifier, 'workspace');
                self::fail('Invalid identifier was admitted.');
            } catch (InvalidArgumentException) {
                self::assertTrue(true);
            }
        }
    }

    public function testEstablishedOwnerDotsRemainRepresentable(): void
    {
        $workspace = new AdministratorWorkspaceDefinition('acme..editor.index', 'Éditeur', 'Edit records', 0);
        self::assertSame('acme..editor.index', $workspace->identifier());
    }

    public function testTemplateTraversalIsRejected(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new AdministratorViewDefinition('acme.editor.index', '../private.twig');
    }

    public function testMissingAccessIsRejected(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new AdministratorRouteDefinition('acme.editor.route', '/editor', ['GET'], '', 'acme.editor.view');
    }

    public function testWorkspaceLabelLimitIsEnforced(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new AdministratorWorkspaceDefinition('acme.editor', str_repeat('a', 81), 'Edit records', 1);
    }
}

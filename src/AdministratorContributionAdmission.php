<?php

declare(strict_types=1);

namespace Kumwe\Administrator\Contract;

use InvalidArgumentException;
use Kumwe\Administrator\Contract\AdministratorWorkspaceDefinition as WorkspaceDefinition;
use Kumwe\Administrator\Contract\AdministratorNavigationDefinition as NavigationDefinition;
use Kumwe\Administrator\Contract\AdministratorRouteDefinition as RouteDefinition;
use Kumwe\Administrator\Contract\AdministratorViewDefinition as ViewDefinition;
use Kumwe\Access\Capability;
use Kumwe\Contribution\ContributionDefinition;
use Kumwe\Contribution\ContributionOwner;
use Kumwe\Contribution\ContributionRejected;
use Kumwe\Contribution\SurfaceIdentifierPolicy;

/**
 * Versioned, owned declaration with an explicit access requirement.
 *
 * This immutable value validates declaration admission only. It does not authenticate,
 * authorize, activate, dispatch or render anything. The host must independently check
 * trust, lifecycle and the required capability in the current execution context.
 * Existing definition constructors remain serialization-compatible.
 *
 * @since 0.2.0
 */
final readonly class AdministratorContributionAdmission implements ContributionDefinition
{
    /**
     * Couple a declaration to its exact owner and enforceable access requirement.
     *
     * All workspace, view/template and optional surface references must be owned by
     * the same contributor. Route/navigation capabilities cannot be replaced by a
     * weaker requirement. Core identifiers use the explicit built-in owner policy.
     *
     * @param ContributionOwner $owner Canonical declared owner; does not establish trust.
     * @param WorkspaceDefinition|NavigationDefinition|RouteDefinition|ViewDefinition $definition Validated declaration.
     * @param Capability $requiredCapability Capability the host must enforce before exposure.
     * @throws ContributionRejected When a declaration or reference belongs to another owner.
     * @throws InvalidArgumentException When a route/navigation requirement disagrees.
     * @since 0.2.0
     */
    public function __construct(
        public ContributionOwner $owner,
        public WorkspaceDefinition|NavigationDefinition|RouteDefinition|ViewDefinition $definition,
        public Capability $requiredCapability,
    ) {
        $policy = SurfaceIdentifierPolicy::dotted('administrator', unnamespacedCore: true);
        $owner->assertOwns($definition->identifier(), $policy);
        if ($definition instanceof NavigationDefinition) {
            $owner->assertOwns($definition->workspace, $policy);
            if ($definition->surface !== null) {
                $owner->assertOwns($definition->surface, $policy);
            }
        }
        if ($definition instanceof RouteDefinition) {
            $owner->assertOwns($definition->view, $policy);
        }
        if (
            ($definition instanceof NavigationDefinition || $definition instanceof RouteDefinition)
            && $definition->capability !== $requiredCapability->value()
        ) {
            throw new InvalidArgumentException('An admission must preserve its declared capability requirement.');
        }
    }

    /**
     * Return the unchanged identifier for the canonical Contribution registry.
     *
     * @return string Owner-scoped declaration identifier.
     * @since 0.2.0
     */
    public function identifier(): string
    {
        return $this->definition->identifier();
    }

    /**
     * Export an ordered, versioned declaration; serialization performs no policy check.
     *
     * @return array<string, mixed> Schema, owner, required capability and declaration.
     * @since 0.2.0
     */
    public function toArray(): array
    {
        return [
            'schema' => 'kumwe-administrator-admission/v1',
            'owner' => $this->owner->identifier(),
            'required_capability' => $this->requiredCapability->value(),
            'definition' => $this->definition->toArray(),
        ];
    }
}

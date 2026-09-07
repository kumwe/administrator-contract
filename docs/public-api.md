# Public API

All values enforce the documented constructor invariants. Domain methods perform no I/O, own no transaction and make no authorization decisions. Immutable values are safe to share; host inputs and lookup ports must remain generation-stable for the duration of an operation. Exceptions and parameter detail appear below verbatim from the source contract.

## Kumwe\Administrator\Contract\AdministratorContributionAdmission

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

### __construct

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

```php
public function __construct(Kumwe\Contribution\ContributionOwner $owner, Kumwe\Administrator\Contract\AdministratorWorkspaceDefinition|Kumwe\Administrator\Contract\AdministratorNavigationDefinition|Kumwe\Administrator\Contract\AdministratorRouteDefinition|Kumwe\Administrator\Contract\AdministratorViewDefinition $definition, Kumwe\Access\Capability $requiredCapability);
```

### identifier

/**
     * Return the unchanged identifier for the canonical Contribution registry.
     *
     * @return string Owner-scoped declaration identifier.
     * @since 0.2.0
     */

```php
public function identifier(): string;
```

### toArray

/**
     * Export an ordered, versioned declaration; serialization performs no policy check.
     *
     * @return array<string, mixed> Schema, owner, required capability and declaration.
     * @since 0.2.0
     */

```php
public function toArray(): array;
```

### Public properties

- `readonly Kumwe\Contribution\ContributionOwner $owner`
- `readonly Kumwe\Administrator\Contract\AdministratorWorkspaceDefinition|Kumwe\Administrator\Contract\AdministratorNavigationDefinition|Kumwe\Administrator\Contract\AdministratorRouteDefinition|Kumwe\Administrator\Contract\AdministratorViewDefinition $definition`
- `readonly Kumwe\Access\Capability $requiredCapability`

## Kumwe\Administrator\Contract\AdministratorNavigationDefinition

/**
 * Capability-gated entry in an administrator workspace.
 *
 * @since 0.2.0
 */

### __construct

/**
     * @param string  $id           Owner-scoped item identifier.
     * @param string  $workspace    Declared workspace identifier.
     * @param string  $label        Visible label, at most 80 characters.
     * @param string  $description  Accessible description, at most 255 characters.
     * @param string  $path         Safe absolute path relative to the extension mount.
     * @param string  $icon         Portable lowercase icon token.
     * @param string  $capability   Required declared capability.
     * @param int     $priority     Sort weight from 0 through 100000.
     * @param string  $keywords     Optional search text, at most 500 characters.
     * @param ?string $surface      Optional owner-scoped KIS surface identifier.
     *
     * @throws InvalidArgumentException When any value is malformed or unbounded.
     *
     * @since 0.2.0
     */

```php
public function __construct(string $id, string $workspace, string $label, string $description, string $path, string $icon, string $capability, int $priority, string $keywords = '', ?string $surface = NULL);
```

### identifier

/** @return string Stable owner-scoped item identifier. @since 0.2.0 */

```php
public function identifier(): string;
```

### toArray

/** @return array<string, int|string> Canonical declaration. @since 0.2.0 */

```php
public function toArray(): array;
```

### Public properties

- `readonly string $capability`
- `readonly string $id`
- `readonly string $workspace`
- `readonly string $label`
- `readonly string $description`
- `readonly string $path`
- `readonly string $icon`
- `readonly int $priority`
- `readonly string $keywords`
- `readonly ?string $surface`

## Kumwe\Administrator\Contract\AdministratorRouteDefinition

/**
 * Validated declaration of one administrator HTTP route a contributor publishes.
 *
 * Construction is the validation boundary for a route contribution: a declaration that survives it
 * has a well-formed dotted name and view reference, a path that cannot traverse, one to eight
 * supported verbs with duplicates collapsed, and a normalized capability. That leaves
 * `AdministratorRouteRegistry` with only ownership and collision decisions to make, and lets the
 * contribution registrar compare a provider's route against its manifest by comparing two arrays.
 *
 * @since  0.1.0
 */

### __construct

/**
     * Validate and normalize one administrator route declaration.
     *
     * A route may not mix safe and mutating verbs. The registry decides once per route whether to
     * place the administrator CSRF guard in front of it, so a route answering both GET and POST
     * would drag that guard onto the safe verb as well.
     *
     * @param   string        $name        Dotted route identifier; ownership is checked when it is registered.
     * @param   string        $path        Route path; for an extension it is appended to its own mount prefix.
     * @param   array<mixed>  $methods     Declared verbs; must be a list of 1 to 8 of DELETE, GET, PATCH, POST, PUT.
     * @param   string        $capability  Capability the route requires, normalized through `Capability`.
     * @param   string        $view        Dotted identifier of the contributed view the route's handler renders.
     *
     * @throws  InvalidArgumentException  When an identifier, the path, the verb list, or the capability is
     *          rejected, or when safe and mutating verbs appear together.
     *
     * @since   0.1.0
     */

```php
public function __construct(string $name, string $path, array $methods, string $capability, string $view);
```

### identifier

/**
     * Report the identifier the contribution registries key this route by.
     *
     * @return  string  The dotted route name exactly as declared.
     *
     * @since   0.1.0
     */

```php
public function identifier(): string;
```

### toArray

/**
     * Export the declaration in the shape the manifest declaration is compared against.
     *
     * Both sides of that comparison are built from this method, and the verbs are normalized
     * first, so the check is insensitive to the order and repetition a declaration was written in.
     *
     * @return  array{name: string, path: string, methods: non-empty-list<string>, capability: string, view: string}
     *
     * @since   0.1.0
     */

```php
public function toArray(): array;
```

### Public properties

- `readonly array $methods`
- `readonly string $capability`
- `readonly string $name`
- `readonly string $path`
- `readonly string $view`

## Kumwe\Administrator\Contract\AdministratorViewDefinition

/**
 * Validated declaration binding a contributed administrator view name to its Twig template.
 *
 * An extension template is never named directly by a handler. `AdministratorRouteRenderer` is already view-bound;
 * a host registry resolves that signed view and prefixes the template with the Twig namespace isolated to the
 * extension. Constraining the template path here — relative, ending in
 * `.twig`, free of `..` — is what keeps that indirection from reaching outside the namespace.
 *
 * @since  0.1.0
 */

### __construct

/**
     * Validate one administrator view declaration.
     *
     * @param   string  $name      Dotted view identifier; ownership is checked when it is registered.
     * @param   string  $template  Template path relative to the owner's Twig namespace, ending in `.twig`.
     *
     * @throws  InvalidArgumentException  When the identifier is malformed or the template path is unsafe.
     *
     * @since   0.1.0
     */

```php
public function __construct(string $name, string $template);
```

### identifier

/**
     * Report the identifier the contribution registries key this view by.
     *
     * @return  string  The dotted view name exactly as declared.
     *
     * @since   0.1.0
     */

```php
public function identifier(): string;
```

### toArray

/**
     * Export the declaration in the shape the manifest declaration is compared against.
     *
     * @return  array{name: string, template: string}
     *
     * @since   0.1.0
     */

```php
public function toArray(): array;
```

### Public properties

- `readonly string $name`
- `readonly string $template`

## Kumwe\Administrator\Contract\AdministratorWorkspaceDefinition

/**
 * Validated declaration of an administrator workspace: the group navigation items are filed under.
 *
 * A workspace carries no behaviour of its own. It names and orders one section of the
 * administrator shell so that core and extension navigation merge into a single menu, which is why
 * the label, description, and sort weight are bounded here — an unbounded contribution would
 * distort a shell it does not own.
 *
 * This class also holds `assertIdentifier()`, the identifier grammar every administrator
 * contribution shares, because workspaces, navigation items, views, and routes must all be
 * checkable for namespace ownership by prefix.
 *
 * @since  0.1.0
 */

### __construct

/**
     * Validate one administrator workspace declaration.
     *
     * @param   string  $id           Dotted workspace identifier; ownership is checked when it is registered.
     * @param   string  $label        Heading shown for the menu group; 1 to 80 characters.
     * @param   string  $description  Sentence explaining the group to an operator; 1 to 255 characters.
     * @param   int     $priority     Sort weight among workspaces, 0 to 100000; lower sorts nearer the top.
     *
     * @throws  InvalidArgumentException  When the identifier is malformed, or the label, description, or
     *          priority falls outside its bounds.
     *
     * @since   0.1.0
     */

```php
public function __construct(string $id, string $label, string $description, int $priority);
```

### assertIdentifier

/**
     * Assert that a contributed administrator identifier has the shape every surface requires.
     *
     * A bounded lowercase identifier that starts and ends alphanumerically, includes at least one dot,
     * and otherwise uses letters, digits, dots, underscores, or hyphens. Internal repeated dots stay
     * representable for existing canonical package owners that contain them. This additive grammar
     * preserves the dotted namespace of extension identifiers across workspaces, navigation items,
     * views, routes, and KIS surfaces, while `ContributionOwner` still decides ownership with an exact
     * namespace prefix test.
     *
     * @param   string  $identifier  Candidate identifier as declared.
     * @param   string  $kind        Contribution kind named in the failure message, such as `route`.
     *
     * @return  void
     *
     * @throws  InvalidArgumentException  When the identifier does not match the shared grammar.
     *
     * @since   0.1.0
     */

```php
public static function assertIdentifier(string $identifier, string $kind): void;
```

### identifier

/**
     * Report the identifier the contribution registries key this workspace by.
     *
     * @return  string  The dotted workspace identifier exactly as declared.
     *
     * @since   0.1.0
     */

```php
public function identifier(): string;
```

### toArray

/**
     * Export the declaration in the shape the manifest declaration is compared against.
     *
     * The administrator navigation registry also builds its menu group from this array, adding a
     * DOM identifier of its own.
     *
     * @return  array{id: string, label: string, description: string, priority: int}
     *
     * @since   0.1.0
     */

```php
public function toArray(): array;
```

### Public properties

- `readonly string $id`
- `readonly string $label`
- `readonly string $description`
- `readonly int $priority`


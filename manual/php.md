Here is a comprehensive and expanded rewrite for the raw documentation template file (`php.md`). This manual explicitly defines the syntax rules for Joomla 6 (enforcing PHP 8.3+ and PER Coding Style / PSR-12), spanning all language elements, structural workflows, object-oriented parameters, types, and modern shorthand operators.

* * * * *

PHP Code Style Guide
--------------------

This section outlines the PHP coding standards for Joomla 6. The Joomla project has migrated all core and framework code to fully comply with the latest PHP-FIG PER Coding Style (and PSR-12) rules.

1\. Files, PHP Code Tags, and File Structure
--------------------------------------------

All files containing PHP source code must adhere strictly to file structural patterns:

-   Line Endings: Every file must use the Unix LF (linefeed) newline character.
-   Character Encoding: Code files must be stored as UTF-8 without a Byte Order Mark (BOM).
-   PHP Opening Tags: Code must use the long `<?php ... ?>` tags or the short-echo `<?= ... ?>` variants. Legacy custom shorthands or ASP tags are forbidden.
-   PHP Closing Tags: The closing `?>` tag must be omitted from files containing exclusively PHP code to prevent trailing white space injection.
-   File Termination: Every PHP file must terminate with a single, trailing blank line.

File Structure Declaration Order
--------------------------------

The layout inside a file must follow this specific arrangement, with each section separated by a single blank line:

1.  Opening `<?php` tag.
2.  File-level DocBlock metadata.
3.  Strict types declaration: `declare(strict_types=1);`.
4.  Namespace declaration of the file.
5.  Class/Interface import blocks via `use` statements.
6.  The actual implementation code (e.g., `class`, `interface`, or `enum`).

* * * * *

2\. General Formatting, Indentation, and Keywords
-------------------------------------------------

Consistency across general syntax prevents conflicts during automated pull requests:

-   Indentation: Code must use an indent of 4 spaces. Legacy tabs are deprecated and explicitly forbidden.
-   Line Length: There is no absolute hard limit on character counts. However, a soft warning is issued at 120 characters, and authors must endeavor to split lines when exceeding 150 characters to improve visibility.
-   Whitespace: Trailing whitespace at the end of any line is strictly prohibited.
-   Keywords: All PHP core reserved keywords and atomic data types must be written in lowercase (e.g., `true`, `false`, `null`, `bool`, `int`, `string`, `array`, `object`).

* * * * *

3\. Operators and Spacing Conventions
-------------------------------------

Operators must be clearly bounded by spaces to ensure clarity within dense functional math or comparisons.

Binary, Assignment, and Logical Operators
-----------------------------------------

All binary arithmetic, comparison, assignment, bitwise, and logical operators must be preceded and followed by a single space.

```
\$result = \$variable1 + \$variable2;
\$isValid = (\$status === 'active' && \$count > 0);

```

Unary Operators
---------------

Increment (`++`) and decrement (`--`) operators must not have spaces between the operator and the variable.

```
\$i++;
++\$count;

```

String Concatenation Operator
-----------------------------

The dot operator (`.`) must always have a single space before and after it.

```
\$greeting = 'Hello, ' . \$firstName . ' ' . \$lastName;

```

Modern Shorthand & Type Operators
---------------------------------

Joomla 6 relies heavily on modern type checking and safe evaluation operators introduced in recent PHP versions:

-   Ternary Operator: Spaces must surround both the `?` and `:` elements.
-   Null Coalescing Operator (`??`): Space before and after.
-   Null Coalescing Assignment Operator (`??=`): Space before and after.
-   Nullsafe Operator (`?->`): Do not insert spaces around this operator.

```
// Ternary, Null Coalescing, and Nullsafe implementations
\$displayTitle = \$titleIsSet ? \$title : 'Default Joomla Title';
\$theme = \$config['theme'] ?? 'cassiopeia';
\$config['cache_time'] ??= 900;

// Space-free chaining with nullsafe operator
\$userEmail = \$user?->getProfile()?->getEmail();

```

* * * * *

4\. Control Structures
----------------------

Control structures must leave a single space after the control keyword, but contain no space after the opening parenthesis or before the closing parenthesis. Opening braces `{` sit on the same line; closing braces `}` sit on a dedicated line directly following the structure body.

If, Elseif, and Else
--------------------

```
if (\$condition1 === true) {
    \$this->executeFirstTask();
} elseif (\$condition2 === false) {
    \$this->executeSecondTask();
} else {
    \$this->fallbackAction();
}

```

Multi-line conditional statements must split lines logically at boolean operators. Each split line is indented by an additional level, and the closing parenthesis sits directly next to the opening brace `{`:

```
if (\$longConditionOne === 'value'
    && \$anotherComplexConditionCheckingSomething
    || \$fallbackVerificationGate
) {
    \$this->processComplexWorkflow();
}

```

Switch and Match Expressions
----------------------------

For legacy structural branches, `switch` requires cases to be indented. For Joomla 6, the modern functional `match` expression is highly preferred:

```
// Traditional Switch Structure
switch (\$action) {
    case 'save':
        \$this->saveData();
        break;
    case 'delete':
        \$this->deleteData();
        break;
    default:
        throw new \InvalidArgumentException('Invalid action');
}

// Preferred Modern PHP Match Expression
\$result = match (\$action) {
    'save'   => \$this->saveData(),
    'delete' => \$this->deleteData(),
    default  => throw new \InvalidArgumentException('Invalid action'),
};

```

Loops: For, Foreach, While, and Do-While
----------------------------------------

```
// For loop
for (\$i = 0; \$i < 10; \$i++) {
    // Execution content
}

// Foreach loop with structural key/value indexing
foreach (\$articles as \$id => \$article) {
    \$this->renderRow(\$id, \$article);
}

// While loop
while (\$status === 'pending') {
    \$status = \$this->checkTaskStatus();
}

// Do-While loop
do {
    \$this->processChunk();
} while (\$processor->hasMoreData());

```

Try-Catch Blocks
----------------

```
try {
    \$database->insertObject(\$data);
} catch (\RuntimeException \$e) {
    \$this->logError(\$e->getMessage());
} finally {
    \$database->closeConnection();
}

```

* * * * *

5\. Classes, Methods, and Functions
-----------------------------------

Class Declaration
-----------------

Class, Interface, and Enum structural headers require the opening brace `{` to sit on its own dedicated line underneath the declaration line.

```
namespace Joomla\Component\Content\Site\Model;

use Joomla\CMS\MVC\Model\BaseDatabaseModel;

class ArticleModel extends BaseDatabaseModel implements ModelInterface
{
    // Implementation code
}

```

Properties and Visibility
-------------------------

Visibility attributes (`public`, `protected`, `private`) are mandatory for all property declarations. Var keywords are strictly banned. Type hinting is strongly requested for all properties.

```
private string \$title;

protected ?int \$articleId = null;

public static bool \$isLoaded = false;

```

Method Signature and Argument Formatting
----------------------------------------

Method names must be written in `camelCase`. Method opening braces `{` must be placed on a separate line below the declaration. Visibility modifiers are required. Spaces must not sit inside the argument parentheses. A single space follows every comma separator.

```
public function loadArticle(int \$id, string \$format = 'html'): ?ArticleObject
{
    return \$this->gateway->fetch(\$id, \$format);
}

```

Multi-line method signatures must have each argument listed on its own line, indented by an additional step. The closing parenthesis and return type sit on the line immediately preceding the opening brace:

```
protected function synthesizeComplexPayload(
    DatabaseDriver \$db,
    Registry \$config,
    array \$inputData,
    bool \$forceRefresh = false
): array {
    // Array parsing structure
}

```

* * * * *

6\. Arrays and Collections
--------------------------

Joomla 6 codebase enforces explicit short-form modern syntax for defining all array structures. The old `array()` keyword syntax is deprecated.

Single-line Arrays
------------------

```
\$options = ['cache' => true, 'lifetime' => 3600, 'driver' => 'redis'];

```

Multi-line Arrays
-----------------

Multi-line arrays require every item to be declared on a separate line, indented. A trailing comma is required on the final item to maintain clean Git structural diff trackings:

```
\$menuConfiguration = [
    'component' => 'com_content',
    'view'      => 'articles',
    'layout'    => 'default',
    'ordering'  => ['column' => 'id', 'direction' => 'DESC'],
];

```

* * * * *

7\. Modern PHP 8.x Features for Joomla 6
----------------------------------------

Since Joomla 6 has a minimum requirement baseline of PHP 8.3, you must leverage engine-native features rather than outdated polyfills or dockblocks:

-   Constructor Property Promotion: Use this to reduce redundant boilerplate code in factory or dependency injection pipelines:

    ```
    public function __construct(
        protected DatabaseDriver \$db,
        private Registry \$config,
        public Application \$app
    ) {}

    ```

-   Attributes: Use language-native attributes instead of legacy DocBlock annotations for plugin hooks or routing declarations:

    ```
    #[JoomlaPlugin(events: ['onContentBeforeSave'])]
    class LoggingPlugin extends CMSPlugin { }

    ```

-   Readonly Properties: Apply `readonly` visibility constraints to structural Data Transfer Objects (DTOs) or services that shouldn't change runtime instances.

* * * * *

To finalize your edit, verify the exact rendering of code snippets using the Preview tab on GitHub, click Commit changes..., choose a semantic commit summary (e.g., `style: upgrade php code manual to match modern per-style for joomla 6`), and open your pull request.

In the past, Joomla defined its own coding style. However, it became apparent that maintaining its own standard entailed a not inconsiderable amount of maintenance. Therefore, there was a long discussion about adapting the PHP Standard Recommendation [PSR-12][]. In December 2021, the Production Department decided to change the coding style and to use [PSR-12][] (effectively its successor [PER Coding Style][]) as soon as possible, but at the latest with Joomla 5.0.

The conversion to [PER Coding Style][] took place with Joomla 4.2 in 2022.

### PER Coding Style

A PHP Evolving Recommendation (PER) is a meta document accompanied by one or more artifacts that are set to evolve over time with multiple releases. In case of the [PER Coding Style][], the recommendation will be updated more or less frequently to cater for new features of PHP.

See the official website for [PER Coding Style][].

### Additional Rules

#### Language Constructs

Make a clear distinction between statements and functions. Statements are written without parentheses around the parameters.

~~~php
require_once __DIR__ . '/helpers/helper.php';
~~~

#### Error Surpression

The use of `@` for error suppression should be avoided. Use it only when it is really unavoidable.

#### References

Do not use reference operators for objects. Objects are always passed by reference anyway. Avoid references if possible. Use parameters and return values instead.

Bad example with the potential of unintended side effects:

~~~php

/**
 * Bad implementation
 * 
 * @param   string  $value  A string to be changed
 * @return  void
 */
function doSomething(string &$value): void
{
    $value .= '-foo';
}
~~~

Good example with functional approach:

~~~php

/**
 * Good implementation
 * 
 * @param   string  $value  A string to be changed
 * @return  string
 */
function doSomething(string $value): string
{
    return $value . '-foo';
}
~~~

#### Arrays

Assignments (the `=>` operator) in arrays may be aligned with spaces. When splitting array definitions onto several lines, the last value should also have a trailing comma. This is valid PHP syntax and helps to keep code diffs minimal. Use the short array syntax `[]` for Joomla 4.0.0 onwards.

For example:

~~~php
$options = [
    'foo'  => 'foo',
    'spam' => 'spam',
];

~~~

#### Mixed language usage (e.g. at the layout files)

In layout files and all files with a mix of PHP and HTML (all PHP files in the `view/tmpl` and `layout` folder) separate the code into data preparation (pure PHP) at the beginning of the file and data output (HTML with interspersed PHP) at the end of the file. In the output area wrap every line of PHP into a `<?php ... ?>` block and use the alternative syntax for control structures. This should make the code easier to read and make it easier to move blocks around without creating fatal errors due to missing `<?php ... ?>` tags.

Example:
Instead of
~~~php
<?php if ($test) : ?>
    <?php $var = 'True'; ?>
<?php elseif ($test === false) : ?>
    <?php $var = 'Really false'; ?>
<?php else : ?>
    <?php $var = 'A white lie'; ?>
<?php endif; ?>
~~~
use
~~~php
<?php
if ($test) {
    $var = 'True';
} elseif ($test === false) {
    $var = 'Really false';
} else {
    $var = 'A white lie';
}
?>

<?= $var ?>
~~~

Example with Control Structure:

~~~php
<?php
$showIt = $this->params->get('show_it', true);
?>

...
<?php if ($showIt) : ?>
    <div><?php echo $this->it; ?></div>
<?php endif ?>
~~~

#### Code Commenting

**DocBlock comments** for classes, methods, properties and constants are required.
~~~php
/**
 * A DocBlock comment
 *
 * This comment follows the C style comment syntax.
 * It is required for classes (also trait and interfaces), methods, properties and constants
 * and used for generation of developer documentation.
 * It should provide all information needed to make use of the documented element
 * without having to inspect the code.
 * Annotations (PHPDoc tags, keywords preceded by a `@`) are used to provide structured data. 
 * See upcoming [PSR-19][] for further information about PHPDoc tags.
 */
~~~
More details on DocBlock comments can be found in the chapter on [DocBlock Comments][].

**Inline comments** are used to explain code in-place. The follow the convention for C (`/* … */`) for multi-line comments and C++ (`// ...`) for single line comments. Code comments are strongly encouraged to help other people, including your future-self, follow the purpose of the code. Always provide comments where the code is performing particularly complex operations.

Avoid comments that could be replaced by speaking variable or method names. Check if the code block you would like to comment can be moved to its own method with a speaking name and matching DocBlock instead.

Example – redundant comment; avoid this:
~~~php
// Do something
$this->doSomething();
~~~

Example – replace comment with a speaking name:
Instead of
~~~php
// Permitted actions
$actions = $this->actions($user);
~~~
use
~~~php
$permittedActions = $this->getPermittedActionsForUser($user);

...

private function getPermittedActionsForUser(User $user): array
{
    ...
}
~~~

Perl/shell style comments (`#`) are not permitted in PHP files.

Blocks of code may, of course, be commented out for debugging purposes using any appropriate format, but must be removed before submitting patches for contribution back to the core code.

For example, do not include feature submissions like:

~~~php
// Must fix this code up one day.
//$code = broken($fixme);
~~~

The code will not be lost, anyway, because we use a source code management system (git).

More details on inline code comments can be found in the chapter on [Inline Code Comments][].

#### Naming Conventions

##### Classes

Classes should be given descriptive names. Avoid using abbreviations where possible. Class names should always begin with an uppercase letter and be written in PascalCase even if using traditionally uppercase acronyms (such as XML, HTML).

##### Class Members

Functions, methods and variables must be named using the camelCase style (also referred to as "bumpy case" or "studly case"). The initial letter of the name is lowercase, and each letter that starts a new "word" is capitalized.

For example:

- connect();
- getData();
- buildSomeWidget();

##### Constants

Do not introduce constants in the global namespace.

Example: Instead of

~~~php
const MY_EXTENSION_FOO = 0;
const MY_EXTENSION_BAR = 1;

$value = MY_EXTENSION_FOO;
~~~

use
~~~php
class MyExtension {
    public const FOO = 0;
    public const BAR = 1;
}

$value = MyExtension::FOO;
~~~

#### Exception Handling

Exceptions should be used for error handling. Provide specific exceptions for your component based on core and/or [SPL exceptions][].

The following section outlines how to semantically use the [SPL exceptions][] provided by PHP.

<dl>
    <dt>LogicException</dt>
    <dd>
        represents an error in the program logic. This kind of exception should lead directly to a fix in your code.
        <dl>
            <dt>BadFunctionCallException</dt>
            <dd>to be thrown if a callback refers to an undefined function or if some arguments are missing.</dd>
            <dt>BadMethodCallException</dt>
            <dd>to be thrown if a callback refers to an undefined method or if some arguments are missing.</dd>
            <dt>DomainException</dt>
            <dd>to be thrown if a value does not adhere to a defined valid data domain.</dd>
            <dt>InvalidArgumentException</dt>
            <dd>to be thrown if an argument is not of the expected type.</dd>
            <dt>LengthException</dt>
            <dd>to be thrown if a length is invalid.</dd>
            <dt>OutOfRangeException</dt>
            <dd>to be thrown when an illegal index was requested. This represents errors that can be detected at compile time.</dd>
        </dl>
    </dd>
    <dt>RuntimeException</dt>
    <dd>
        represents an error which can only be found on runtime occurs.
        <dl>
            <dt>OutOfBoundsException</dt>
            <dd>to be thrown if a value is not a valid key. This represents errors that cannot be detected at compile time.</dd>
            <dt>OverflowException</dt>
            <dd>to be thrown when adding an element to a full container.</dd>
            <dt>RangeException</dt>
            <dd>to be thrown to indicate range errors during program execution. Normally this means there was an arithmetic error other than under/overflow. This is the runtime version of DomainException.</dd>
            <dt>UnderflowException</dt>
            <dd>to be thrown when performing an invalid operation on an empty container, such as removing an element.</dd>
            <dt>UnexpectedValueException</dt>
            <dd>to be thrown  if a value does not match with a set of values. Typically this happens when a function calls another function and expects the return value to be of a certain type or value not including arithmetic or buffer related errors.</dd>
        </dl>
    </dd>
</dl>

##### Documenting exceptions

Each function or method must annotate the type of exception that it throws using a @throws tag and any downstream exceptions types that are thrown. The description should state the (possible) cause for the exception.

#### SQL Queries

SQL keywords must be written in uppercase, while all other identifiers (except for quoted text obviously) must be in lowercase.

All table names should use the `#__` prefix to access Joomla content and allow for the user defined database prefix to be applied. Tables should never have a static prefix such as `jos_`.

Avoid verbatim SQL. Use the DatabaseQuery API to create your queries. It encapsulates the data source's query language (in most cases SQL), hiding query-specific syntax from the developer and increasing the portability of the developer's source code.

Use Query chaining to connect a number of query methods, one after the other, with each method returning an object that can support the next method, This improves readability and simplifies the resulting code. Since the Joomla Framework introduced "query chaining" is now the recommended method for building database queries.

Always apply `quoteName()` on table and column names to properly escape them. Don't use backticks or the escape character from your favorite database management system, as that will lead to incompatibilities.

Always ensure the proper data type. Cast variables, if necessary.

Always apply `quote()` on stringy values like strings or dates.

Do not use the alias methods `q()` and `qn()`.

Example 1:
~~~php
/** \Joomla\Database\DatabaseDriver $db */
$query = $db->getQuery(true);
$query
    ->select($query->quoteName('u.*'))
    ->from($query->quoteName('#__users', 'u'))
    ;

$db->setQuery($query);
$users = $db->loadObjectList();
~~~

Example 2

~~~php
$query
    ->select($query->quoteName(['user_id', 'profile_key', 'profile_value', 'ordering']))
    ->from($query->quoteName('#__user_profiles'))
    ->where($query->quoteName('profile_key') . ' LIKE '. $query->quote('\'custom.%\''))
    ->order('ordering ASC')
    ;
~~~

Example 3

~~~php
$query = $db->getQuery(true)
    ->select([
        $query->quoteName('profile_key'),
        $query->quoteName('profile_value'),
    ])
    ->from($query->quoteName('#__user_profiles'))
    ->where($query->quoteName('user_id') . ' = ' . (int) $userId)
    ->order($query->quoteName('ordering'));
~~~

[PSR-12]: https://www.php-fig.org/psr/psr-12/
[PER Coding Style]: https://www.php-fig.org/per/coding-style
[DocBlock Comments]: /coding-standards/docblocks.html
[Inline Code Comments]: /coding-standards/inline-code-comments.html
[SPL exceptions]: https://secure.php.net/manual/en/spl.exceptions.php

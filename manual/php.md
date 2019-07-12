### Language Constructs

#### PHP Code Tags

Always use the full `<?php ... ?>` to delimit PHP code, not the `<? ... ?>` shorthand. This is the most portable way to include PHP code on differing operating systems and setups.

For files that contain only PHP code, the closing tag (`?>`) should not be included. It is not required by PHP. Leaving this out prevents trailing white space from being accidentally injected into the output that can introduce errors in the Joomla session (see the PHP manual on [Instruction separation](https://secure.php.net/basic-syntax.instruction-separation)).

Files should always end with a blank new line.

#### General

Pursuant to PSR-2 [Keywords and True/False/Null][]

> PHP [keywords][] MUST be in lower case.
> The PHP constants `true`, `false`, and `null` MUST be in lower case.

[Keywords and True/False/Null]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md#25-keywords-and-truefalsenull
[keywords]: https://secure.php.net/manual/en/reserved.keywords.php

#### Including Code

Anywhere you are unconditionally including a file, use `require_once`. Anywhere you are conditionally including a file (for example, factory methods), use `include_once`. Either of these will ensure that files are included only once. They share the same file list, so you don't need to worry about mixing them. A file included with `require_once` will not be included again by `include_once`.

> **Note**
>
> `include_once` and `require_once` are PHP language statements, not functions. The correct formatting is:
>
>
> `require_once JPATH_COMPONENT . '/helpers/helper.php';`

You should not enclose the filename in parentheses.

#### E_STRICT Compatible PHP Code

As of Joomla version 1.6 and for all versions of the Joomla Platform, adhering to object oriented programming practice as supported by PHP 5.3+ is required. Joomla is committed to progressively making the source code E_STRICT.

### Global Variables

Global variables should not be used. Use static class properties or constants instead of globals, following OOP and factory patterns.

### Control Structures (General Code)

For all control structures there is a space between the keyword and an opening parenthesis, then no space either after the opening parenthesis or before the closing bracket. This is done to distinguish control keywords from function names. All control structures must contain their logic within braces.

For all all control structures, such as `if`, `else`, `do`, `for`, `foreach`, `try`, `catch`, `switch` and `while`, both the keyword starts a newline and the opening and closing braces are each put on a new line.

Exclamation mark `!`, the logical operator `not` used in a condition, should not have spaces before or after the exclamation mark as shown in the examples.

#### An _if-else_ Example

```php
if ($test)
{
	echo 'True';
}

// Comments can go here.
// Note that "elseif" as one word is used.
elseif ($test === false)
{
	echo 'Really false';
}
elseif (!$condition)
{
	echo 'Not Condition';
}
else
{
	echo 'A white lie';
}
```

If a control structure goes over multiple lines, all lines must be indented with one tab and the closing brace must go on the same line as the last parameter.

```php
if ($test1
	&& $test2)
{
	echo 'True';
}
```

#### A _do-while_ Example

```php
do
{
	$i++;
}
while ($i < 10);
```

#### A _for_ Example

```php
for ($i = 0; $i < $n; $i++)
{
	echo 'Increment = ' . $i;
}
```

#### A _foreach_ Example

```php
foreach ($rows as $index => $row)
{
	echo 'Index = ' . $index . ', Value = ' . $row;
}
```

#### A _while_ Example

```php
while (!$done)
{
	$done = true;
}
```

#### A _switch_ example

When using a `switch` statement, the `case` keywords are indented. The `break` statement starts on a newline assuming the indent of the code within the case.

```php
switch ($value)
{
	case 'a':
		echo 'A';
		break;

	default:
		echo 'I give up';
		break;
}
```

#### A _try catch_ example
```php
try
{
	$table->bind($data);
}
catch (RuntimeException $e)
{
	throw new Exception($e->getMessage(), 500, $e);
}
```

### Mixed language usage (e.g. at the layout files)

For layout files and all files where we use a mix of PHP and HTML (all PHP files in the `view/tmpl` and `layout` folder) we additionally wrap every line into a `<?php ... ?>` block and use the alternative syntax for control structures. This should make the code easier to read and make it easier to move blocks around without creating fatal errors due to missing `<?php ... ?>` tags.

#### Example Control Structures

##### An _if-else_ Example

```php
<?php if ($test) : ?>
	<?php $var = 'True'; ?>
<?php elseif ($test === false) : ?>
	<?php $var = 'Really false'; ?>
<?php else : ?>
	<?php $var = 'A white lie'; ?>
<?php endif; ?>
```

### References

When using references, there should be a space before the reference operator and no space between it and the function or variable name.

For example:

```php
$ref1 = &$this->sql;
```

> **Note**
>
> In PHP 5, reference operators are not required for objects. All objects are handled by reference.


### Concatenation Spacing
There should always be a space before and after the concatenation operator ('.'). For example:

```php
$id = 1;
echo JRoute::_('index.php?option=com_foo&task=foo.edit&id=' . (int) $id);
```

If the concatenation operator is the first or last character on a line, both spaces are not required. For example:

```php
$id = 1
echo JRoute::_(
    'index.php?option=com_foo&task=foo.edit&id=' . (int) $id
    . '&layout=special'
);
```

### Arrays

Assignments (the `=>` operator) in arrays may be aligned with spaces. When splitting array definitions onto several lines, the last value should also have a trailing comma. This is valid PHP syntax and helps to keep code diffs minimal.

For example:

```php
$options = array(
	'foo'  => 'foo',
	'spam' => 'spam',
);
```

### Code Commenting

Inline comments to explain code follow the convention for C (`/* … */`) and C++ single line (`// ...`) comments. C-style blocks are generally restricted to documentation headers for files, classes and functions. The C++ style is generally used for making code notes. Code notes are strongly encouraged to help other people, including your future-self, follow the purpose of the code. Always provide notes where the code is performing particularly complex operations.

Perl/shell style comments (`#`) are not permitted in PHP files.

Blocks of code may, of course, be commented out for debugging purposes using any appropriate format, but should be removed before submitting patches for contribution back to the core code.

For example, do not include feature submissions like:

```php
// Must fix this code up one day.
//$code = broken($fixme);
```

More details on inline code comments can be found in the chapter on [Inline Code Comments](/coding-standards/inline-code-comments.html).

#### Comment Docblocks

Documentation headers for PHP and Javascript code in files, classes, class properties, methods and functions, called the docblocks, follow a convention similar to JavaDoc or phpDOC.

These "DocBlocks" borrow from the PEAR standard but have some variations specific for Joomla and the Joomla Platform.

More details on DocBlocks comments can be found in the chapter on [DocBlocks Comments](/coding-standards/docblocks.html).

### Function Calls

Functions should be called with no spaces between the function name and the opening parenthesis, and no space between this and the first parameter; a space after the comma between each parameter (if they are present), and no space between the last parameter and the closing parenthesis. There should be space before and exactly one space after the equals sign. Tab alignment over multiple lines is permitted.

```php
// An isolated function call.
$foo = bar($var1, $var2);

// Multiple aligned function calls.
$short  = bar('short');
$medium = bar('medium');
$long   = bar('long');
```

### Function Definitions

Function definitions start on a new line with no spaces between the function name and the opening parenthesis. Additionally, the opening and closing braces are also placed on new lines. An empty line should precede lines specifying the return value.

Function definitions must include a documentation comment in accordance with the Commenting section of this document. More details on DocBlocks Function comments can be found in the chapter on [DocBlocks Comments](/coding-standards/docblocks.html).

```php
/**
 * A utility function.
 *
 * @param   string  $path  The library path in dot notation.
 *
 * @return  void
 *
 * @since   1.6
 */
function jimport($path)
{
	// Body of method.
}
```

If a function definition goes over multiple lines, all lines must be indented with one tab and the closing brace must go on the same line as the last parameter.

```php
function fooBar($param1, $param2,
	$param3, $param4)
{
	// Body of method.
}
```

### Closures / Anonymous functions
Closures/Anonymous functions should have a space between the Closure's/Anonymous function's name and the opening parenthesis. Method signatures don't have the space.

```php
$fieldIds = array_map(
	function ($f)
	{
		return $f->id;
	},
	$fields
);
```

### Class Definitions

Class definitions start on a new line and the opening and closing braces are also placed on new lines. Class methods must follow the guidelines for Function Definitions. Properties and methods must follow OOP standards and be declared appropriately (using public, protected, private and static as applicable).

Class definitions, properties and methods must each be provided with a DocBlock in accordance with the following sections.

More details on DocBlocks Class comments can be found in the chapter on [DocBlocks Comments](/coding-standards/docblocks.html).

#### Class Property DocBlocks

More details on Class Property DocBlocks can be found in the chapter on [DocBlocks Comments](docblocks.md).

#### Class Method DocBlocks

The DocBlock for class methods follows the same convention as for PHP functions.

More details on DocBlocks Class Method comments can be found in the chapter on [DocBlocks Comments](docblocks.md).

### Class Definition Example
```php
/**
 * A utility class.
 *
 * @package     Joomla.Platform
 * @subpackage  XBase
 * @since       1.6
 */
class JClass extends JObject
{
	/**
	 * Human readable name
	 *
	 * @var    string
	 * @since  1.6
	 */
	public $name;

	/**
	 * Method to get the name of the class.
	 *
	 * @param   string  $case  Optionally return in upper/lower case.
	 *
	 * @return  boolean  True if successfully loaded, false otherwise.
	 *
	 * @since   1.6
	 */
	public function getName($case = null)
	{
		// Body of method.
		return $this->name;
	}
}
```

### Naming Conventions

#### Classes

Classes should be given descriptive names. Avoid using abbreviations where possible. Class names should always begin with an uppercase letter and be written in CamelCase even if using traditionally uppercase acronyms (such as XML, HTML). One exception is for Joomla Platform classes which must begin with an uppercase 'J' with the next letter also being uppercase.

For example:

- JHtmlHelper
- JXmlParser
- JModel

#### Functions and Methods

Functions and methods should be named using the "studly caps" style (also referred to as "bumpy case" or "camel caps"). The initial letter of the name is lowercase, and each letter that starts a new "word" is capitalized. Function in the Joomla framework must begin with a lowercase 'j'.

For example:

- connect();
- getData();
- buildSomeWidget();
- jImport();
- jDoSomething();

Private class members (meaning class members that are intended to be used only from within the same class in which they are declared) are preceded by a single underscore. Properties are to be written in underscore format (that is, logical words separated by underscores) and should be all lowercase.

For example:

```php
class JFooHelper
{
	protected $field_name = null;

	private $_status = null;

	protected function sort()
	{
		// Code goes here
	}
}
```

#### Namespaces

Namespaces are formatted according to this flow. First there is the file docblock followed by the namespace the file lives in. When required, the namespace is followed by the `defined` check. Lastly, the imported classes using the `use` keyword. All namespace imports must be alphabetically ordered.

```php
/**
 * @package     Joomla.Administrator
 * @subpackage  mod_quickicon
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\Module\Quickicon\Administrator\Helper;

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Plugin\PluginHelper;
use Joomla\CMS\Router\Route;
use Joomla\Module\Quickicon\Administrator\Event\QuickIconsEvent;
```

#### Constants

Constants should always be all-uppercase, with underscores to separate words. Prefix constant names with the uppercase name of the class/package they are used in. For example, the constants used by the `JError` class all begin with `JERROR_`.

#### Regular Variables and Class Properties

Regular variables, follow the same conventions as function.

Class variables should be set to null or some other appropriate default value.

### Exception Handling

Exceptions should be used for error handling.

The following sections outline how to semantically use [SPL exceptions](https://secure.php.net/manual/en/spl.exceptions.php).

#### Logic Exceptions

The LogicException is thrown when there is an explicit problem with the way the API is being used. For example, if a dependency has failed (you try to operate on an object that has not been loaded yet).

The following child classes can also be used in appropriate situations:

##### BadFunctionCallException

This exception can be thrown if a callback refers to an undefined function or if some arguments are missing. For example if `is_callable()`, or similar, fails on a function.

##### BadMethodCallException

This exception can be thrown if a callback refers to an undefined method or if some arguments are missing. For example `is_callable()`, or similar, fails on a class method.  Another example might be if arguments passed to a magic call method are missing.

##### InvalidArgumentException

This exception can be thrown if there is invalid input.

##### DomainException

This exception is similar to the InvalidArgumentException but can be thrown if a value does not adhere to a defined valid data domain. For example trying to load a database driver of type "mongodb" but that driver is not available in the API.

##### LengthException

This exception can be thrown is a length check on an argument fails. For example a file signature was not a specific number of characters.

##### OutOfRangeException

This exception has few practical applications but can be thrown when an illegal index was requested.

#### Runtime Exceptions

The RuntimeException is thrown when some sort of external entity or environment causes a problem that is beyond your control providing the input is valid. This exception is the default case for when the cause of an error can't explicitly be determined. For example you tried to connect to a database but the database was not available (server down, etc).  Another example might be if an SQL query failed.

##### UnexpectedValueException

This type of exception should be used when an unexpected result is encountered. For example a function call returned a string when a boolean was expected.

##### OutOfBoundsException

This exception has few practical applications but may be thrown if a value is not a valid key.

##### OverflowException

This exception has few practical applications but may be thrown when you add an element into a full container.

##### RangeException

This exception has few practical applications but may be thrown to indicate range errors during program execution. Normally this means there was an arithmetic error other than under/overflow. This is the runtime version of DomainException.

##### UnderflowException

This exception has few practical applications but may thrown when you try to remove an element of an empty container.

#### Documenting exceptions

Each function or method must annotate the type of exception that it throws using an @throws tag and any downstream exceptions types that are thrown. Each type of exception need only be annotated once. No description is necessary.

### SQL Queries

SQL keywords are to be written in uppercase, while all other identifiers (with the exception of quoted text obviously) is to be in lowercase.

All table names should use the `#__` prefix to access Joomla content and allow for the user defined database prefix to be applied. Queries should also use the JDatabaseQuery API. Tables should never have a static prefix such as `jos_`.

To query our data source we can call a number of JDatabaseQuery methods; these methods encapsulate the data source's query language (in most cases SQL), hiding query-specific syntax from the developer and increasing the portability of the developer's source code.

Use Query chaining to connect a number of query methods, one after the other, with each method returning an object that can support the next method, This improves readability and simplifies the resulting code. Since the Joomla Framework was introduced "query chaining" is now the recommended method for building database queries.

Table names and table column names should always be enclosed in the `quoteName()` method to escape the table name and table columns.
Field values checked in a query should always be enclosed in the `quote()` method to escape the value before passing it to the database. Integer field values checked in a query should also be type cast to `(int)`.

```php
// Get the database connector.
$db = JFactory::getDbo();

// Get the query from the database connector.
$query = $db->getQuery(true);

// Build the query programatically (example with chaining)
// Note: You can use the qn alias for the quoteName method.
$query->select($db->qn('u.*'))
	->from($db->qn('#__users', 'u'));

// Tell the database connector what query to run.
$db->setQuery($query);

// Invoke the query or data retrieval helper.
$users = $db->loadObjectList();
```

#### Longer Chaining Example
```php
// Using chaining when possible.
$query->select($db->quoteName(array('user_id', 'profile_key', 'profile_value', 'ordering')))
    ->from($db->quoteName('#__user_profiles'))
    ->where($db->quoteName('profile_key') . ' LIKE '. $db->quote('\'custom.%\''))
    ->order('ordering ASC');
```

#### Chaining With Select Array And Type Casting Of Integer Field Value Example
```php
$query  = $db->getQuery(true)
	->select(array(
		$db->quoteName('profile_key'),
		$db->quoteName('profile_value'),
	))
	->from($db->quoteName('#__user_profiles'))
	->where($db->quoteName('user_id') . ' = ' . (int) $userId)
	->order($db->quoteName('ordering'));
```

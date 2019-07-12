Documentation headers for PHP code in: files, classes, class properties, methods and functions, called the docblocks, follow a convention similar to JavaDoc or phpDOC.

These "DocBlocks" borrow from the PEAR standard but have some variations specific for Joomla and the Joomla projects.

Whereas normal code indenting uses real tabs, all whitespace in a Docblock uses real spaces. This provides better readability in source code browsers. The minimum whitespace between any text elements, such as tags, variable types, variable names and tag descriptions, is two real spaces. Variable types and tag descriptions should be aligned according to the longest Docblock tag and type-plus-variable respectively.

Code contributed to the Joomla project that will become the copyright of the project is not allowed to include @author tags. You should update the contribution log in CREDITS.php. Joomla's philosophy is that the code is written "all together" and there is no notion of any one person "owning" any section of code. The @author tags are permitted in third-party libraries that are included in the core libraries.

Files included from third party sources must leave DocBlocks intact. Layout files use the same DocBlocks as other PHP files.

### File DocBlock Headers
The file header DocBlock consists of the following required and optional elements in the following order:
Short description (optional unless the file contains more than two classes or functions), followed by a blank line). Long description (optional, followed by a blank line).

* @version (optional and must be first)
* @category (optional and rarely used)
* @package (generally optional but required when files contain only procedural code. Always optional in namespaced code)
* @subpackage (optional)
* @author (optional but only permitted in non-Joomla source files)
* @copyright (required)
* @license (required and must be compatible with the Joomla license)
* @link (optional)
* @see (optional)
* @since (generally optional but required when files contain only procedural code)
* @deprecated (optional)

Example of a DocBlock Header:

```php
/**
 * @package     Joomla.Installation
 * @subpackage  Controller
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
```

### Class Definitions
Class definitions start on a new line and the opening and closing braces are also placed on new lines. Class methods must follow the guidelines for Function Definitions. Properties and methods must follow OOP standards and be declared appropriately (using public, protected, private and static as applicable). Class definitions, properties and methods must each be provided with a DocBlock in accordance with the following sections.

#### Class DocBlock Headers
The class Docblock consists of the following required and optional elements in the fol-lowing order.
Short description (required, unless the file contains more than two classes or functions), followed by a blank line). Long description (optional, followed by a blank line).

* @category (optional and rarely used)
* @package (optional)
* @subpackage (optional)
* @author (optional but only permitted in non-Joomla source files)
* @copyright (optional unless different from the file Docblock)
* @license (optional unless different from the file Docblock)
* @link (optional)
* @see (optional)
* @since (required, being the version of the software the class was introduced)
* @deprecated (optional)

Example of a Class file DocBlock header:
```php
/**
 * Controller class to initialise the database for the Joomla Installer.
 *
 * @package     Joomla.Installation
 * @subpackage  Controller
 * @since       3.1
 */
```

#### Class Property DocBlocks
The class property Docblock consists of the following required and optional elements in the following order.
Short description (required, followed by a blank line)

* @var (required, followed by the property type)
* @since (required)
* @deprecated (optional)

Example of Class property DocBlock:

```php
	/**
	 * The generated user ID
	 *
	 * @var    integer
	 * @since  3.1
	 */
	protected static $userId = 0;
```

#### Class Method DocBlocks and Functions DocBlocks
Function definitions start on a new line and the opening and closing braces are also placed on new lines. An empty line should precede lines specifying the return value.

Function definitions must include a documentation comment in accordance with the Commenting section of this document.

* Short description (required, followed by a blank line)
* Long description (optional, followed by a blank line)
* @param (required if there are method or function arguments, the last @param tag is followed by a blank line)
* @return (required, followed by a blank line)
* @since (required, followed by a blank line if there are additional tags)
* @throws (required if method or function arguments throws a specific type of exception)
* All other tags in alphabetical order.

**Note:**
Commonly a line after the tag @param consists of the following three parts in order of appearance:
* variable type (There must be 3 spaces before variable type.)
* variable name (There must be 2 spaces after the longest type.)
* variable description (There must be 2 spaces after the longest variable name.)

If there are more than one @param the type, names and description have to be aligned.

Example of Method DocBlock:
```php
	/**
	 * Set a controller class suffix for a given HTTP method.
	 *
	 * @param   string  $method  The HTTP method for which to set the class suffix.
	 * @param   string  $suffix  The class suffix to use when fetching the controller name for a given request.
	 *
	 * @return  JApplicationWebRouter  This object for method chaining.
	 *
	 * @since   12.2
	 *
	 * @throws  InvalidArgumentException   Thrown if the provided arguments is not of type string.
	 * @throws  \UnexpectedValueException  May be thrown if the container has not been set.
	 */
	public function setHttpMethodSuffix($method, $suffix)
```

If a function definition goes over multiple lines, all lines must be indented with one tab and the closing brace must go on the same line as the last parameter.

```php
function fooBar($param1, $param2,
    $param3, $param4)
{
    // Body of method.
}
```

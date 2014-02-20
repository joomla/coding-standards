## Naming Conventions

Use descriptive words or abbreviated phrases for names, avoiding [reserved words](http://es5.github.io/#x7.6.1)

Variable and function names should be camel case, starting with a lowercase letter. The only exception to this is
for where a function is intended to be invoked with the `new` prefix. In that case, the function name must start
with a capital letter.

Examples:

```javascript
var scalar = 'ABC123';

var anObject = {
    foo: 'bar'
}

var squared = function(a) {
    return a * a;
}

console.log(squared(2));

var Class = function(name) {
    this.name = name;
}

var myClass = new Class('foo');
```

### Spacing
- Unary special-character operators (e.g., `!`, `++`) must not have space next to their operand.
- Any `,` and `;` must not have preceding space.
- Any `;` used as a statement terminator must be at the end of the line.
- Any `:` after a property name in an object definition must not have preceding space.
- The `?` and `:` in a ternary conditional must have space on both sides.
- No filler spaces in empty constructs (e.g., {}, [], fn())

**Examples**

```javascript
//
// Arrays.
//

var array = ['foo', 'bar'];

//
// Function calls.
//

foo(arg);

// Function call with multiple arguments.
foo('string', object);

//
// Conditional blocks.
//

if (condition) {
    // statements
}
else {
    // statements
}

while (condition) {
    // statements
}

for (prop in object) {
    // statements
}

//
// Objects and functions as arguments.
//

// First or only argument is an object, array or callback function.**
foo({
    a: 'bar',
    b: 'baz'
});

foo(function() {
    // statements
}, options ); // space after options argument

// Function with a callback, object, or array as the last argument:**
foo( data, function() {
    // statements
});
```

### Commas

**Place commas after:**

- variable declarations
- key/value pairs

#### Arrays

Do not include a trailing comma, this will add 1 to your array's length.

```javascript
// This is the wrong way.
array = ['foo', 'bar',];

// This is the right way.
array = ['foo', 'bar'];
```

### Semicolons

Use them where expected.

Semicolons should be included at the end of function expressions, but not at the end of function declarations.

**Function Expression:**

```
var foo = function() {
    return true;
};
```

**Function Declaration:**

```
function foo() {
    return true;
}
```

### Quotes

Use `'` instead of `"`.

## Variables

### Multiple Variable Declarations

Use one `var` declaration and separate each variable on a newline ending with a comma.

```javascript
// Not desirable.
var foo = 'bar';
var bar = 'baz';
var baz = 'qux';

// Preferred.
var foo = 'bar',
	bar = 'baz',
    baz = 'qux';
```

## Types

### String

- Concatenate long strings.
- Place space before closing quote at the end of each string.
- Concatenation operator at the end of each subsequent string.

```
var longString = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. ' +
    'Sed placerat, tellus eget egestas tincidunt, lectus dui ' +
    'sagittis massa, id mollis est tortor a enim. In hac ' +
    'habitasse platea dictumst. Duis erat justo, tincidunt ac ' +
    'enim iaculis, malesuada condimentum mauris. Vestibulum vel ' +
    'cursus mauris.';
```

```
var foo = 'bar';
```

### Number

Use `parseInt()` or `parseFloat()` instead of unary plus, for readability.

**No:**

```
var count = +document.getElementById('inputId').value;
```

**Yes:**

```
var count = parseInt(document.getElementById('inputId').value);
```

### Objects

If an object contains more than one key/value pair or an array as a value, each key/value pair should be on its own line.

```
var myObj = {
	foo: 'bar',
	bar: 'baz',
	baz: 'qux'
};
```

### Arrays

Use the literal, not constructor, syntax

**No:**

```
var myArr = new Array();
```
**Yes:**

```
var myArr = [];
```

## Functions

### Chaining Method Calls

```
$('.someElement')
	.hide()
	.delay(1000)
	.fadeIn();
```

## Conditional Statements

Use ternary syntax if:

- One condition
- Result of either evaluation is one operation.

```
joomlaRocks ? 'This is true' : 'else it is false';
```

Otherwise, use standard syntax:

```
if ( condition ) {
	// statements
} else {
	// statements
}
```

**With more than one condition:**

```
if ( condition &&
	condition2 &&
	condition3 ) {
    // statements
} else {
    // statements
}
```

### Equality

Use strict equality operator === so that type is considered in comparison. Using == can produce false positives.


```
// evaluates true
1 == "1"
```

```
// evaluates false
1 === "1"
```


## Blocks & Multi-line Statements

Use curly braces on all blocks.

**Block with one statement:**

```
if (test) {
    return false;
}
```

**Block with more than one statement:**

```
if (test) {
    var foo = 'some string';
    return foo;
}
```

## Comments

Use `//` for all general comments, including mulit-line comments.

```
// Single comment.
var foo = bar;

// I am a multiline comment.
// Line two
// Line three
var bar = foo;
```

Files should include a DocBlock header to descirbed the function of the file and include the copyright and license statements.

```
/**
 * A module to do cool stuff.
 *
 * @copyright   Copyright 2005 - 2014 Open Source Matters. All rights re-served.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
```

Functions should also be provided with DocBlock to describe parameters and return values (refer to the PHP guidelines for guidance).

## Naming Conventions

Use descriptive words or terse phrases for names.

Variables and Functions should be camel case, starting with a lowercase letter: `likeThis`

### Strings

**Use names that describe what the string is:**

`var element = document.getElementByID('elementId');`

**Iterators are the exception**

Use i for index in a loop (and subsequent letters when necessary for nested iteration).

### Functions

**Use names that describe what the function does:**

```
function getSomeData() {
	// statements
}
```

### Reserved Words

Do not use reserved words for anything other than their intended use. The list of: [Reserved Words](http://es5.github.io/#x7.6.1)

---

## Syntax Style

### Indentation
- Don't mix tabs and spaces.
- Tabs, 4 spaces


### Spacing
- No whitespace at the end of line or on blank lines.
- Unary special-character operators (e.g., !, ++) must not have space next to their operand.
- Any , and ; must not have preceding space.
- Any ; used as a statement terminator must be at the end of the line.
- Any : after a property name in an object definition must not have preceding space.
- The ? and : in a ternary conditional must have space on both sides.
- No filler spaces in empty constructs (e.g., {}, [], fn())
- New line at the end of each file.

**Array:**

```
var array = [ 'foo', 'bar' ];
```

**Function call:**

```
foo( arg );
```

**Function call with multiple arguments:**

```
foo( 'string', object );
```

**Conditional Statements**

```
if ( condition ) {
    // statements
} else {
    // statements
}
```

```
while ( condition ) {
    // statements
}
```

```
for ( prop in object ) {
    // statements
}
```


#### Exceptions

** First or only argument is an object, array or callback function.**

**No space before the first argument:**

```
foo({
    a: 'bar',
    b: 'baz'
});
```

```
foo(function() {
    // statements
}, options ); // space after options argument
```

**Function with a callback, object, or array as the last argument:**

```

**No space after the last argument:**

```
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

**No:**

```
array = [ 'foo', 'bar', ];
```

**Yes:**

```
array = [ 'foo', 'bar' ];
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

Use ' instead of "


---


## Variables

### Avoid Global Variables

**No:**

```
foo = 'bar';
```

**No: implied global**

```
function() {
    foo = 'bar';
}
```

**Yes:**

```
var foo = 'bar';
```

### Multiple Variable Declarations

Use one `var` declaration and separate each variable on a newline ending with a comma.

**No:**

```
var foo = 'bar';
var bar = 'baz';
var baz = 'qux';
```

**Yes:**

```
var foo = 'bar',
    bar = 'baz',
    baz = 'qux';
```

## Types

### String

Concatenate long strings. Space separating each string should be at the end with the concatenation operator at the front of each subsequent string.

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

### Type Checks

- String: `typeof object === 'string'`
- Number: `typeof object === 'number'`
- Boolean: `typeof object === 'boolean'`
- Object: `typeof object === 'object'`
- Plain Object: `jQuery.isPlainObject( object )`
- Function: `jQuery.isFunction( object )`
- Array: `jQuery.isArray( object )`
- Element: `object.nodeType`
- null: `object === null`
- null or undefined: `object == null`

**Undefined:**

- Global Variables: `typeof variable === 'undefined'`
- Local Variables: `variable === undefined`
- Properties: `object.prop === undefined`

### Objects

Use the literal, not constructor, syntax.

**No:**

```
var myObj = new Object();
```
**Yes:**

```
var myObj = {};
```

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

If you don't know array length use push method. This will replace the current array.

```
var myArr = [];
myArr.push('foo');
```

## Functions

### Properties

// TODO

### Hoisting

// TODO

### Chaining Method Calls

// TODO

## Conditional Statements

// TODO ternary/with braces

**Cache length in variable for performance:**

```
var i,
    j = myArr.length;

for ( i = 0; i < j; i++ ) {
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

### Switch Statements

// TODO


### Equality

// TODO


## Events

// TODO


## Blocks & Multi-line Statements

Use curly braces on blocks that have more than one statement.

**Block with one statement:**

```
if ( test ) return false;
```

**Block with more than one statement:**

```
if ( test ) {
    var foo = 'some string';
    return foo;
}
```


## Comments

**Single Line**

- Place above the code it refers to.
- A space between double forward slashes and comment text.

`// I am a single line comment.`

**Multiline**

- Place above the code it refers to.
- Opening token placed on the line above first comment line, closing placed below last comment line.
- Each comment line begins with two astericks followed by a space.

```
/*
** I am a multiline comment.
** Line two
** Line three
*/
```

---

#### TODO

- Finish Conditionals
- Functions/subsections
- Switch Statements
- Equality Operators
- Events
- Add jQuery examples
- Double check accuracy of all examples
**With help from:**

- [jQuery JS Style Guide](https://contribute.jquery.org/style-guide/js)
- [Idiomatic JS](https://github.com/rwaldron/idiomatic.js)
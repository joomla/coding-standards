### Contents

1. [Naming Conventions](#naming-conventions)
    - [Variables](#naming-conventions-variables)
    - [Functions](#naming-conventions-functions)
    - [Reserved Words](#naming-conventions-reserved)
2. [Syntax Style](#syntax-style)
    - [Indentation](#syntax-indentation)
    - [Spacing](#syntax-spacing)
    - [Commas](#syntax-commas)
    - [Semicolons](#syntax-semicolons)
    - [Quotes](#syntax-quotes)
3. [Types](#types)
4. [Functions](#functions)
5. [Conditional Statements](#conditional-statements)
6. [Blocks & Multi-line Statements](#blocks)
7. [Comments](#comments)

<a name="naming-conventions"></a>
### Naming Conventions

Use descriptive words or terse phrases for names.

Variables and Functions should be camel case, starting with a lowercase letter: `likeThis`

<a name="naming-conventions-variables"></a>
#### Variables

**Use names that describe what the variable is:**

`var element = document.getElementById('elementId');`

**Iterators are the exception**

Use i for index in a loop (and subsequent letters when necessary for nested iteration).

<a name="naming-conventions-functions"></a>
#### Functions

**Use names that describe what the function does:**

```js
function getSomeData() {
	// statements
}
```

<a name="naming-conventions-reserved"></a>
#### Reserved Words

Do not use reserved words for anything other than their intended use. The list of: [Reserved Words](http://es5.github.io/#x7.6.1)

---

<a name="syntax-style"></a>
### Syntax Style

<a name="syntax-indentation"></a>
#### Indentation
- Don't mix tabs and spaces.
- Tabs, 4 spaces

<a name="syntax-spacing"></a>
#### Spacing
- No whitespace at the end of line or on blank lines.
- Unary special-character operators (e.g., !, ++) must not have space next to their operand.
- Any , and ; must not have preceding space.
- Any ; used as a statement terminator must be at the end of the line.
- Any : after a property name in an object definition must not have preceding space.
- The ? and : in a ternary conditional must have space on both sides.
- No filler spaces in empty constructs (e.g., {}, [], fn())
- New line at the end of each file.

**Array:**

```js
var array = [ 'foo', 'bar' ];
```

**Function call:**

```js
foo( arg );
```

**Function call with multiple arguments:**

```js
foo( 'string', object );
```

**Conditional Statements**

```js
if ( condition ) {
    // statements
} else {
    // statements
}
```

```js
while ( condition ) {
    // statements
}
```

```js
for ( prop in object ) {
    // statements
}
```


##### Exceptions

**First or only argument is an object, array or callback function.**

**No space before the first argument:**

```js
foo({
    a: 'bar',
    b: 'baz'
});
```

```js
foo(function() {
    // statements
}, options ); // space after options argument
```

**Function with a callback, object, or array as the last argument:**

No space after the last argument.

```js
foo( data, function() {
    // statements
});
```

<a name="syntax-commas"></a>
#### Commas

**Place commas after:**

- variable declarations
- key/value pairs

#### Arrays

Do not include a trailing comma, this will add 1 to your array's length.

**No:**

```js
array = [ 'foo', 'bar', ];
```

**Yes:**

```js
array = [ 'foo', 'bar' ];
```

<a name="syntax-semicolons"></a>
#### Semicolons

Use them where expected.

Semicolons should be included at the end of function expressions, but not at the end of function declarations.

**Function Expression:**

```js
var foo = function() {
    return true;
};
```

**Function Declaration:**

```js
function foo() {
    return true;
}
```

<a name="syntax-quotes"></a>
#### Quotes

Use ' instead of "


---

<a name="variables"></a>
### Variables

### Avoid Global Variables

**No:**

```js
foo = 'bar';
```

**No: implied global**

```js
function() {
    foo = 'bar';
}
```

**Yes:**

```js
var foo = 'bar';
```

#### Multiple Variable Declarations

Use one `var` declaration and separate each variable on a newline ending with a comma.

**No:**

```js
var foo = 'bar';
var bar = 'baz';
var baz = 'qux';
```

**Yes:**

```js
var foo = 'bar',
	bar = 'baz',
    baz = 'qux';
```


---

<a name="types"></a>
### Types

#### String

- Concatenate long strings.
- Place space before closing quote at the end of each string.
- Concatenation operator at the end of each subsequent string.

```js
var longString = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. ' +
    'Sed placerat, tellus eget egestas tincidunt, lectus dui ' +
    'sagittis massa, id mollis est tortor a enim. In hac ' +
    'habitasse platea dictumst. Duis erat justo, tincidunt ac ' +
    'enim iaculis, malesuada condimentum mauris. Vestibulum vel ' +
    'cursus mauris.';
```

#### Number

Use `parseInt()` or `parseFloat()` instead of unary plus, for readability.

**No:**

```js
var count = +document.getElementById('inputId').value;
```

**Yes:**

```js
var count = parseInt(document.getElementById('inputId').value);
```

#### Type Checks

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

#### Objects

Use the literal, not constructor, syntax.

**No:**

```js
var myObj = new Object();
```

**Yes:**

```js
var myObj = {};
```

If an object contains more than one key/value pair or an array as a value, each key/value pair should be on its own line.

```js
var myObj = {
	foo: 'bar',
	bar: 'baz',
	baz: 'qux'
};
```

#### Arrays

Use the literal, not constructor, syntax

**No:**

```js
var myArr = new Array();
```

**Yes:**

```js
var myArr = [];
```

If you don't know array length use push method. This will replace the current array.

```js
var myArr = [];
myArr.push('foo');
```


---

<a name="functions"></a>
### Functions

#### Chaining Method Calls

```js
$('.someElement')
	.hide()
	.delay(1000)
	.fadeIn();
```


---

<a name="conditional-statements"></a>
### Conditional Statements

Use ternary syntax if:

- One condition
- Result of either evaluation is one operation. 

```js
joomlaRocks ? 'This is true' : 'else it is false';
```

Otherwise, use standard syntax:

```js
if ( condition ) {
	// statements
} else {
	// statements
}
```

**Cache length in variable for performance:**

```js
var i,
    j = myArr.length;

for ( i = 0; i < j; i++ ) {
    // statements
}
```

**With more than one condition:**

```js
if ( condition &&
	condition2 &&
	condition3 ) {
    // statements
} else {
    // statements
}
```

#### Equality

Use strict equality operator === so that type is considered in comparison. Using == can produce false positives.


```js
// evaluates true
1 == "1"
```

```js
// evaluates false
1 === "1"
```


---

<a name="blocks"></a>
### Blocks & Multi-line Statements

Use curly braces on blocks that have more than one statement.

**Block with one statement:**

```js
if ( test ) return false;
```

**Block with more than one statement:**

```js
if ( test ) {
    var foo = 'some string';
    return foo;
}
```


---

<a name="comments"></a>
### Comments

**Single Line**

- Place above the code it refers to.
- A space between double forward slashes and comment text.

```js
// I am a single line comment.
```


**Multiline**

- Place above the code it refers to.
- Opening token placed on the line above first comment line, closing placed below last comment line.
- Each comment line begins with two astericks followed by a space.

```js
/*
** I am a multiline comment.
** Line two
** Line three
*/
```

---

### TODO

- Switch Statements vs other methods like Objects
- Add jQuery examples
- Double check accuracy of all examples

**With help from:**

- [jQuery JS Style Guide](https://contribute.jquery.org/style-guide/js)
- [Idiomatic JS](https://github.com/rwaldron/idiomatic.js)

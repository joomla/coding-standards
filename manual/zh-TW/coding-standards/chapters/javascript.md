## JavaScript

### 本文

1. [命名準則](#naming-conventions)
    - [變數](#naming-conventions-variables)
    - [函式](#naming-conventions-functions)
    - [保留字元](#naming-conventions-reserved)
2. [語法](#syntax-style)
    - [縮排](#syntax-indentation)
    - [空白](#syntax-spacing)
    - [逗號](#syntax-commas)
    - [分號](#syntax-semicolons)
    - [引號](#syntax-quotes)
3. [變數類型](#types)
4. [函式](#functions)
5. [條件式](#conditional-statements)
6. [程式區塊 (單行與多行)](#blocks)
7. [註解](#comments)

<a name="naming-conventions"></a>
## 命名準則

Use descriptive words or terse phrases for names.
命名應以具有描述性或簡潔為準則

Variables and Functions should be camel case, starting with a lowercase letter: `likeThis`
變數與函式應以駝峰式命名，並以小寫英文字母開頭：`likeThis`

<a name="naming-conventions-variables"></a>
### 變數

**Use names that describe what the variable is:**
**使用描述變數意義的命名準則**

`var element = document.getElementById('elementId');`

**Iterators are the exception**
遞回函式內的變數則不在此限

Use i for index in a loop (and subsequent letters when necessary for nested iteration).
例如在迴圈中允許使用 `i` 作為索引值 (遇到巢狀結構時使用下一個英文字母：`j`)

<a name="naming-conventions-functions"></a>
### 函式

**Use names that describe what the function does:**
**使用描述函式功能的命名準則**

```
function getSomeData() {
	// statements
}
```
<a name="naming-conventions-reserved"></a>
### 保留字元

Do not use reserved words for anything other than their intended use. The list of: [Reserved Words](http://es5.github.io/#x7.6.1)
非必要狀況下不要使用保留字元作為命名。完整的保留字元列表：[保留字元列表](http://es5.github.io/#x7.6.1)

---

<a name="syntax-style"></a>
## 語法

<a name="syntax-indentation"></a>
### 縮排
- Don't mix tabs and spaces.
請勿混淆 tab 與 spaces
- Tabs, 4 spaces
Tab 等同 4 個 spaces

<a name="syntax-spacing"></a>
### 空白
- No whitespace at the end of line or on blank lines.
行末不可含有空白字元 (空行亦同)
- Unary special-character operators (e.g., !, ++) must not have space next to their operand.
單元運算子(例如：!, ++)前後不可包含空白字元
- Any , and ; must not have preceding space.
任何 , 以及 ; 不可前綴空白字元 (例如：[ 'name', 'age' ])
- Any ; used as a statement terminator must be at the end of the line.
以分號(;)結束程式區塊時，分號(;)必須放在行末
- Any : after a property name in an object definition must not have preceding space.
在物件內定義屬性時使用的冒號(:)不可前綴空白字元 (例如：{"name": "jack"})
- The ? and : in a ternary conditional must have space on both sides.
三元運算式中的 ? 以及 : 前後都必須包含空白字元
- No filler spaces in empty constructs (e.g., {}, [], fn())
空白宣告中不需要包含空白字元 (例如：{}, [], fn())
- New line at the end of each file.
檔案末尾需有一行空白

**Array:**
**陣列:**

```
var array = [ 'foo', 'bar' ];
```

**Function call:**
**函式呼叫:**

```
foo( arg );
```

**Function call with multiple arguments:**
**多變數的函式呼叫:**

```
foo( 'string', object );
```

**Conditional Statements**
**條件式**

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


#### 空白字元例外狀況

**First or only argument is an object, array or callback function.**
**函式的第一個變數是物件、陣列或是 callback 函式時:**

**No space before the first argument:**
**第一個變數不需前綴空白字元**

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
**函式的最後一個變數是物件、陣列或是 callback 函式時:**

No space after the last argument.
**最後一個變數不需後綴空白字元:**

```
foo( data, function() {
    // statements
});
```

<a name="syntax-commas"></a>
### 逗號

**Place commas after:**
**下列情形必須後綴逗號:**

- variable declarations
- 變數宣告
- key/value pairs
- 索引/值 配對

#### Arrays
#### 陣列

Do not include a trailing comma, this will add 1 to your array's length.
最後一個元素不需後綴逗號，這會造成陣列長度多了 1

**No:**
**錯誤:**

```
array = [ 'foo', 'bar', ];
```

**Yes:**
**正確:**

```
array = [ 'foo', 'bar' ];
```

<a name="syntax-semicolons"></a>
### 分號

Use them where expected.
在預期狀況下使用

Semicolons should be included at the end of function expressions, but not at the end of function declarations.
以變數宣告函式時必須以分號結尾，單純宣告函式時則不需要

**Function Expression:**
**以變數宣告函式:**

```
var foo = function() {
    return true;
};
```

**Function Declaration:**
**宣告函式:**

```
function foo() {
    return true;
}
```

<a name="syntax-quotes"></a>
### 引號

Use ' instead of "
使用單引號而非雙引號


---

<a name="variables"></a>
## 變數

### Avoid Global Variables
### 避免宣告全域變數

**No:**
**錯誤:**

```
foo = 'bar';
```

**No: implied global**
**錯誤: 在函式範疇但仍為全域宣告**

```
function() {
    foo = 'bar';
}
```

**Yes:**
**正確:**

```
var foo = 'bar';
```

### Multiple Variable Declarations
### 多個變數宣告

Use one `var` declaration and separate each variable on a newline ending with a comma.
只使用一個 `var` 作為宣告，其餘變數每個以逗號隔開並換新行

**No:**
**錯誤:**

```
var foo = 'bar';
var bar = 'baz';
var baz = 'qux';
```

**Yes:**
**正確:**

```
var foo = 'bar',
	bar = 'baz',
    baz = 'qux';
```

<a name="types"></a>
## 變數類別

### 字串

- Concatenate long strings.
- 過長字串應以串接形式宣告 (使用 +)
- Place space before closing quote at the end of each string.
- 結束字串的引號應前綴空白字元
- Concatenation operator at the end of each subsequent string.
- 串接運算子應放在每個字串片段的結尾

```
var longString = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. ' +
    'Sed placerat, tellus eget egestas tincidunt, lectus dui ' +
    'sagittis massa, id mollis est tortor a enim. In hac ' +
    'habitasse platea dictumst. Duis erat justo, tincidunt ac ' +
    'enim iaculis, malesuada condimentum mauris. Vestibulum vel ' +
    'cursus mauris.';
```

### 數字

Use `parseInt()` or `parseFloat()` instead of unary plus, for readability.
為了閱讀性考量，運算為數字的變數時應使用`parseInt()` 或 `parseFloat()`，而非單純的 +

**No:**
**錯誤:**

```
var count = +document.getElementById('inputId').value;
```

**Yes:**
**正確:**

```
var count = parseInt(document.getElementById('inputId').value);
```

### Type Checks
### 變數類型檢查

- String: `typeof object === 'string'`
- 字串: `typeof object === 'string'`
- Number: `typeof object === 'number'`
- 數字: `typeof object === 'number'`
- Boolean: `typeof object === 'boolean'`
- 布林: `typeof object === 'boolean'`
- Object: `typeof object === 'object'`
- 物件: `typeof object === 'object'`
- Plain Object: `jQuery.isPlainObject( object )`
- 空白物件: `jQuery.isPlainObject( object )`
- Function: `jQuery.isFunction( object )`
- 函式: `jQuery.isFunction( object )`
- Array: `jQuery.isArray( object )`
- 陣列: `jQuery.isArray( object )`
- Element: `object.nodeType`
- HTML元素: `object.nodeType`
- null: `object === null`
- null or undefined: `object == null`

**Undefined:**

- Global Variables: `typeof variable === 'undefined'`
- 全域變數: `typeof variable === 'undefined'`
- Local Variables: `variable === undefined`
- 區域變數: `variable === undefined`
- Properties: `object.prop === undefined`
- 屬性: `object.prop === undefined`

### Objects
### 物件

Use the literal, not constructor, syntax.
使用大括號建立物件，而非建構方式

**No:**
**錯誤:**

```
var myObj = new Object();
```
**Yes:**
**正確:**

```
var myObj = {};
```

If an object contains more than one key/value pair or an array as a value, each key/value pair should be on its own line.
如果物件包含多組 索引/值，每一組 索引/值 都必須是一個獨立的行

```
var myObj = {
	foo: 'bar',
	bar: 'baz',
	baz: 'qux'
};
```

### Arrays
### 陣列

Use the literal, not constructor, syntax
使用中括號建立物件，而非建構方式

**No:**
**錯誤:**

```
var myArr = new Array();
```
**Yes:**
**正確:**

```
var myArr = [];
```

If you don't know array length use push method. This will replace the current array.
陣列長度未知的狀況下使用 `push()`，這會取代現有陣列

```
var myArr = [];
myArr.push('foo');
```

<a name="functions"></a>
## Functions
## 函式

### Chaining Method Calls
### 呼叫連鎖方法

```
$('.someElement')
	.hide()
	.delay(1000)
	.fadeIn();
```

<a name="conditional-statements"></a>
## Conditional Statements
## 條件式

Use ternary syntax if:
在下列情況使用三元運算式:

- One condition
- 只有一個條件
- Result of either evaluation is one operation.
- 看不太懂 by Tim 2014-09-24

```
joomlaRocks ? 'This is true' : 'else it is false';
```

Otherwise, use standard syntax:
否則就使用標準語法

```
if ( condition ) {
	// statements
} else {
	// statements
}
```

**Cache length in variable for performance:**
**將變數長度做快取以提升效能:**

```
var i,
    j = myArr.length;

for ( i = 0; i < j; i++ ) {
    // statements
}
```

**With more than one condition:**
**一組以上的條件時:**

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
### 等式判斷

Use strict equality operator === so that type is considered in comparison. Using == can produce false positives.
使用最嚴謹的 === 判斷，這會將變數類型一同比較。使用 == 可能會造成以假為真


```
// evaluates true
1 == "1"
```

```
// evaluates false
1 === "1"
```

<a name="blocks"></a>
## Blocks & Multi-line Statements
## 程式區塊 & 多行敘述

Use curly braces on blocks that have more than one statement.
多行程式敘述時應以大括號區隔範圍

**Block with one statement:**
**單一敘述的區塊:**

```
if ( test ) return false;
```

**Block with more than one statement:**
**多行敘述的區塊:**

```
if ( test ) {
    var foo = 'some string';
    return foo;
}
```

<a name="comments"></a>
## 註解

**Single Line**
**單行**

- Place above the code it refers to.
- 註解放置在程式碼上方
- A space between double forward slashes and comment text.
- 雙斜線與註解之間應空一格

```
// I am a single line comment.
```


**Multiline**
**多行註解**

- Place above the code it refers to.
- 多行註解應放置在說明的目標程式碼上方
- Opening token placed on the line above first comment line, closing placed below last comment line.
- 註解起始字元 `/*` 應放在第一行註解上方，註解結束字元 `*/` 應放在最後一行註解下方，
- Each comment line begins with two astericks followed by a space.
- 每一行註解應以 2 個星號與 1 個空白字元開頭

```
/*
** I am a multiline comment.
** Line two
** Line three
*/
```

---

#### TODO

- Switch Statements vs other methods like Objects
- Add jQuery examples
- Double check accuracy of all examples

**With help from:**

- [jQuery JS Style Guide](https://contribute.jquery.org/style-guide/js)
- [Idiomatic JS](https://github.com/rwaldron/idiomatic.js)

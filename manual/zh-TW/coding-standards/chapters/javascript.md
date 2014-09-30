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

**變數名稱應該描述其變數意義**

變數與函式應以駝峰式命名，並以小寫英文字母開頭：`likeThis`

<a name="naming-conventions-variables"></a>
### 變數

**使用描述變數意義的命名準則**

`var element = document.getElementById('elementId');`

**迭代子則不在此限**

例如在迴圈中允許使用 `i` 作為索引值 (遇到巢狀結構時使用下一個英文字母：`j`)

<a name="naming-conventions-functions"></a>
### 函式

**函數名稱應該描述該函數之功能意義**

```
function getSomeData() {
	// statements
}
```
<a name="naming-conventions-reserved"></a>
### 保留字元

除非需要用到保留字功能的場合，否則不要在任何地方使用到保留字。完整的保留字元列表：[保留字元列表](http://es5.github.io/#x7.6.1)

---

<a name="syntax-style"></a>
## 語法

<a name="syntax-indentation"></a>
### 縮排
- 請勿混用 tab 與 spaces
- Tab 等同 4 個 spaces

<a name="syntax-spacing"></a>
### 空白
- 行末與空行不能有空白字元
- 一元運算子(例如：!, ++)前後不可包含空白字元
- 任何 , 以及 ; 不可前綴空白字元 (例如：[ 'name', 'age' ])
- 以分號(;)結束程式區塊時，分號(;)必須放在行末
- 在物件內定義屬性時使用的冒號(:)不可前綴空白字元 (例如：{"name": "jack"})
- 三元運算子中的 ? 以及 : 前後都必須包含空白字元
- 空白宣告中不需要包含空白字元 (例如：{}, [], fn())
- 檔案末尾需有一空行

**陣列:**

```
var array = [ 'foo', 'bar' ];
```

**函式呼叫:**

```
foo( arg );
```

**多變數的函式呼叫:**

```
foo( 'string', object );
```

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

**函式的第一個變數是物件、陣列或是 callback 函式時:**

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

**函式的最後一個變數是物件、陣列或是 callback 函式時:**

**最後一個變數不需後綴空白字元:**

```
foo( data, function() {
    // statements
});
```

<a name="syntax-commas"></a>
### 逗號

**下列情形必須後綴逗號:**

- 變數宣告
- 索引/值 配對

#### Arrays
#### 陣列

最後一個元素不需後綴逗號，這會造成陣列長度多了 1

**錯誤:**

```
array = [ 'foo', 'bar', ];
```

**正確:**

```
array = [ 'foo', 'bar' ];
```

<a name="syntax-semicolons"></a>
### 分號

在預期狀況下使用

以變數宣告函式時必須以分號結尾，單純宣告函式時則不需要

**以變數宣告函式:**

```
var foo = function() {
    return true;
};
```

**宣告函式:**

```
function foo() {
    return true;
}
```

<a name="syntax-quotes"></a>
### 引號

使用單引號(')而非雙引號(")

---

<a name="variables"></a>
## 變數

### 避免宣告全域變數

**錯誤:**

```
foo = 'bar';
```

**錯誤: 在函式範疇但仍為全域宣告**

```
function() {
    foo = 'bar';
}
```

**正確:**

```
var foo = 'bar';
```

### 多個變數宣告

只使用一個 `var` 作為宣告，一行只能存在一個變數並在行末以逗號作為結束

**錯誤:**

```
var foo = 'bar';
var bar = 'baz';
var baz = 'qux';
```

**正確:**

```
var foo = 'bar',
	bar = 'baz',
	baz = 'qux';
```

<a name="types"></a>
## 變數類別

### 字串

- 過長字串應以串接形式宣告 (使用 +)
- 有需要隔斷單字的空白，需要放在每一行字串的尾部，而非下一行字串的開頭
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

為了閱讀性考量，應使用parseInt() 或 parseFloat() 將變數轉為數字，而非用一元運算子 +

**錯誤:**

```
var count = +document.getElementById('inputId').value;
```

**正確:**

```
var count = parseInt(document.getElementById('inputId').value);
```

### 變數類型檢查

- 字串: `typeof object === 'string'`
- 數字: `typeof object === 'number'`
- 布林: `typeof object === 'boolean'`
- 物件: `typeof object === 'object'`
- 空白物件: `jQuery.isPlainObject( object )`
- 函式: `jQuery.isFunction( object )`
- 陣列: `jQuery.isArray( object )`
- HTML元素: `object.nodeType`
- null: `object === null`
- null or undefined: `object == null`

**Undefined:**

- 全域變數: `typeof variable === 'undefined'`
- 區域變數: `variable === undefined`
- 屬性: `object.prop === undefined`

### 物件

使用大括號建立物件，而非建構子方式

**錯誤:**

```
var myObj = new Object();
```

**正確:**

```
var myObj = {};
```

如果物件包含多組索引/值或陣列，每一組 索引/值 都必須是一個獨立的行

```
var myObj = {
	foo: 'bar',
	bar: 'baz',
	baz: 'qux'
};
```

### 陣列

使用中括號建立物件，而非建構子方式

**錯誤:**

```
var myArr = new Array();
```

**正確:**

```
var myArr = [];
```

陣列長度未知的狀況下使用 `push()`，來增加新的元素

```
var myArr = [];
myArr.push('foo');
```

<a name="functions"></a>
## 函式

### 鏈狀呼叫

```
$('.someElement')
	.hide()
	.delay(1000)
	.fadeIn();
```

<a name="conditional-statements"></a>
## 條件式

在下列情況使用三元運算子:

- 只有一個條件
- 程式區塊內只包含一個操作時

```
joomlaRocks ? 'This is true' : 'else it is false';
```

否則就使用標準語法

```
if ( condition ) {
	// statements
} else {
	// statements
}
```

**將變數長度做快取以提升效能:**

```
var i,
    j = myArr.length;

for ( i = 0; i < j; i++ ) {
    // statements
}
```

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

### 等式判斷

使用強型別等號運算子 === 判斷，這會將變數類型一同比較。使用 == 可能會造成以假為真


```
// evaluates true
1 == "1"
```

```
// evaluates false
1 === "1"
```

<a name="blocks"></a>
## 程式區塊 & 多行敘述

多行程式敘述時應以大括號區隔範圍

**單一敘述的區塊:**

```
if ( test ) return false;
```

**多行敘述的區塊:**

```
if ( test ) {
    var foo = 'some string';
    return foo;
}
```

<a name="comments"></a>
## 註解

**單行**

- 註解放置在程式碼上方
- 雙斜線與註解之間應空一格

```
// I am a single line comment.
```

**多行註解**

- 多行註解應放置在說明的目標程式碼上方
- 註解起始字元 `/*` 應放在第一行註解上方，註解結束字元 `*/` 應放在最後一行註解下方，
- 每一行註解應加上 2 個星號後綴一個空白

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

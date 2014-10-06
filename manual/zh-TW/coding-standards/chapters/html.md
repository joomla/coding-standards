## html

這份準則是透過檢視一些新興的程式實作、想法、以及現有的編碼規範所集思廣益而成，並引用以下清單中所使用的概念：

1. [Google's html styleguide](http://google-styleguide.googlecode.com/svn/trunk/htmlcssguide.xml)
2. [JQuery's HTML Styleguide](http://contribute.jquery.org/style-guide/html/)
3. [Nicolas Ghallager's "Principles of writing consistent, idiomatic HTML"](https://github.com/necolas/idiomatic-html)
4. [Harry Robert's "My HTML/CSS coding style"](http://csswizardry.com/2012/04/my-html-css-coding-style/)
4. [The BBC's Media Standards and Guidelines](http://www.bbc.co.uk/guidelines/futuremedia/technical/semantic_markup.shtml)


### Doctype

永遠使用精簡且不帶版本號的 html 文件宣告。

```html
<!doctype html>
```

### 語言

永遠定義該頁面所使用的語言

```html
<html lang="en">
```

### 編碼

永遠需定義字源編碼。編碼在程式之中越早定義越好。
確認你的編輯器是使用 UTF-8 的字源編碼，且不使用 BOM (byte order mark 位元組順序記號)。
不要在樣式表中設定編碼，因為樣式表的編碼已經預設為 UTF-8。

```html
<meta charset="utf-8">
```

[更多有關如何以及何時設定這些編碼，請見此篇文章 Handling character encodings in HTML and CSS](http://www.w3.org/International/tutorials/tutorial-char-enc/)

### Capitalisation
### 大小寫規則

所有 html 皆必須為小寫；元素名稱、屬性、屬性值(除非是 text/CDATA)、CSS 選擇器、變數、變數值(字串例外，可有大小寫)。此外，在使用內嵌的 JavaScript 時不需使用跳脫字串 CDTA，這在以前是為了讓 XHTML 符合 XML 標準時所要求的規定。

```html
<!-- 正確 -->
<img src="joomla.png" alt="Joomla">

<!-- 錯誤 -->
<A HREF="/">Home</A>
```

```html
<!-- 正確 -->
a {
    color: #a3a3a3;
}

<!-- 錯誤 -->
a {
    color: #A3A3A3;
}
```

### 通訊協定

在圖片、多媒體、樣式表或任何腳本程式的 URLs 連結上，省略通訊協定的部分 (http:, https:)，除非其來源不屬於這兩種通訊協定的範疇。

這可以避免混合內容的安全性問題，並小量減少檔案大小。

```html
<!-- 正確 -->
<link rel="stylesheet" href="//joomla.org/css/main.css">

<!-- 錯誤 -->
<link rel="stylesheet" href="http://joomla.org/css/main.css">
```

### 元素及屬性

永遠加入 html，head 和 body 標籤。

### Type 屬性
引入樣式表時不要使用 type 屬性(除非不是使用CSS)。引入腳本程式時不要使用 type 屬性(除非不是使用JavaScript)。

```html
<!-- 正確 -->
<link rel="stylesheet" href="//joomla.org/css/main.css">

<!-- 錯誤 -->
<link rel="stylesheet" href="//joomla.org/css/main.css" type="text/css">
```

### Language 屬性
使用 Script 標籤時不要使用 language 屬性。

```html
<!-- 正確 -->
<script href="//code.jquery.com/jquery-latest.js">

<!-- 錯誤 -->
<script href="//code.jquery.com/jquery-latest.js" language="javascript">
```


### 屬性
屬性的值需在前後使用雙引號("")，並且忽略可選(Optional)之屬性。

```html
<!-- 正確 -->
<script src="//code.jquery.com/jquery-latest.js"></script>
<!-- 錯誤 -->
<script src='//code.jquery.com/jquery-latest.js'></script>
```
布林值形態的屬性需使用 屬性/值 對。
```html
<!-- 正確 -->
<input type="checkbox" value="on" checked="checked">
<!-- 錯誤 -->
<input type="checkbox" value="on" checked>
```

HTML 元素中的屬性值應以 class 為首並建議依以下順序排列，這同時反映出 class 名稱在 css 與 javascript 中是最主要的選擇器 (selector)

1. class
2. id
3. data-*
4. 任何其他的屬性
```html
<!-- 正確 -->
<a class="[some-value]" id="[some-value]" data-name="[some-value]" href="[some-value]">Text</a>
<!-- 錯誤 -->
<a href="[some-value]" class="[some-value]" id="[some-value]" data-name="[some-value]">Text</a>
```

當元素標籤擁有多個屬性值的時候可以以多行顯示，來提升文件的可讀性並產生更好用的 diffs:

```html
<a class="[some-value]"
 data-action="[some-value]"
 data-id="[some-value]"
 href="[some-value]">
    <span>Text</span>
</a>
```

### 元素

當元素結尾標籤是可選的時候，永遠不要省略結尾標籤。

```html
<!-- 正確 -->
<p>The quick brown fox jumps over the lazy dog.</p>
<!-- 錯誤 -->
<p>The quick brown fox jumps over the lazy dog.
```

可以自我閉合(Self-closing)的元素不應該有閉合標籤，結尾的斜線以及空白必須忽略。

```html
<!-- 正確 -->
<img src="//images/logo.png" alt="">
<!-- 錯誤 -->
<img src="//images/logo.png" alt="" />
```


### 格式
每個區塊標籤(div, list 或 table)都應該使用單獨的一行，並在每一個子元素縮排。

```html
<!-- 正確 -->
<div>
	<ul>
	  <li>Home</li>
	  <li>Blog</li>
	</ul>
</div>

<!-- 錯誤 -->
<div><ul>
  <li>Home</li>
  <li>Blog</li>
</ul></div>
```

當維護程式碼時，相較於節省檔案大小我們偏好以可讀性作為優先考量。我們鼓勵適當且足夠的空白。使用空白來使不同的群組在視覺上有所區分，並提高您的 HTML 的可維護性以及可讀性。主要的大區塊以兩行空白隔開，其大區塊之內的小區塊以一行空白隔開。注意維持其一致性。如果您擔心文件的大小，空白(包含一些重複被使用的字串、class 等等)是被很適合被壓縮的目標之一，您可以使用一些標記語言的壓縮器來縮減檔案大小。

單行的長度應維持在適當的合理範圍內，如: 80 columns

小技巧：設定您的編輯器選項為 "show invisibles"。這個選項可以替您消除不必要的空白，不會讓您的 commit 被過多的空行所影響顯示。

```html
<blockquote>
    <p><em>Space</em>, the final frontier.</p>
</blockquote>


<ul>
    <li>Moe</li>
    <li>Larry</li>
    <li>Curly</li>
</ul>


<table>
    <thead>
        <tr>
            <th scope="col">Income</th>
            <th scope="col">Taxes</th>
        </tr>
    <tbody>
    <tr>
        <td>$ 5.00</td>
        <td>$ 4.50</td>
    </tr>
</table>
```

### 縮排
html、body、script 或 style 等等的標籤底下不需要縮排。head 以及任何其他的標籤底下都需縮排。
縮排一次是四個空白。不要使用 tab 縮排或是把 tab 和空白混著使用。


```html
<!-- 正確 -->
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Sample Page</title>
 
    <link rel="stylesheet" href="/style.css">
    <style>
    body {
        font-size: 100em;
    }
    </style>
 
    <script src="/jquery.js"></script>
    <script>
    $(function() {
        $( "p" ).text( $.fn.jquery );
    });
    </script>
</head>
<body>
 
<p>Joomla! is awesome!<p>
 
</body>
</html>
```

### 後綴空白

移除後綴的空白。後綴空白是不必要的而且會造成複雜的 diffs 顯示.

```html
<!-- 正確 -->
<p>Yes please.</p>

<!-- 錯誤 -->
<p>No, thank you. </p>
```


### Entity References

不要使用字符實體引用(entity references)。若開發團隊中每位成員的編輯器編碼都相同的話(都為UTF-8)，便不需要使用例如 &mdash;、&rdquo; 或 &#x263a。

唯有的例外是，當該字符在 HTML 之中具有特殊意義 (如 < 和 &)、控制碼或屬於 "看不見 (invisible) " 的字元時(像是 ```&nbsp;``` non-breaking spaces)

```html
<!-- 正確 -->
<p>The currency symbol for the Euro is “€”.</p>

<!-- 錯誤 -->
<p>The currency symbol for the Euro is &ldquo;&eur;&rdquo;.</p>
```

### 行內樣式(Inline CSS)

不要使用行內樣式。當使用 JavaScript 去改變樣式或狀態時，如果可以，儘量使用 Unobtrusive JavaScript(一種將Javascript從HTML結構抽離的設計概念)的模式去改變或新增 class 名稱。

```html
<!-- 正確 -->
<a class="is-link-disabled" href="//index.php">Home</a>

<!-- 錯誤 -->
<a href="//index.php" style="text-decoration: line-through;">Home</a>
```

@todo more meaningful example.

### Style 屬性

你不應該使用 border、align、valign 或 clear 等等的屬性。不要使用 style 屬性。避免使用 style 屬性，除非使用 syndicated content 或 internal syndicating systems。

### 語意化

根據其意義使用 HTML。舉例來說，使用標題元素(h1 ~ h6)來表示標題，段落元素 p 表示段落，連結元素 a 表示連結等等。

依據不同的考量來使用 HTML 對於易使用性、重複使用性以及程式碼效率等等是相當重要的。

```html
<!-- 正確 -->
<a href="subscriptions/">View subscriptions</a>

<!-- 錯誤 -->
<div onclick="goToSubscriptions();">View subscriptions</div>
```

### 標記(Markup)

#### 圖片標籤
圖片元素 (<img>) 必須包含 alt 屬性. Height 和 width 屬性是可選的，可以被忽略。


@todo add examples from here http://www.bbc.co.uk/guidelines/futuremedia/technical/semantic_markup.shtml

### 註解
@todo: comment styles in JS, CSS, HTML
HTML 中複雜的區塊可以在結束標籤之後加上一段註解：

```html
<div class="parent">

    <div class="child">
    </div><!-- /child -->

</div><!-- /parent -->
```

### 在檔案中標記 Todo
在檔案中註解待完成清單時可以使用 TODO 關鍵字，例如：

```html
<!-- TODO: add active item class -->
<ul>
  <li>Home</li>
  <li>Blog</li>
</ul>
```

### 標記驗證工具
@todo: list various testing tools:
* http://validator.w3.org/nu/
* http://csslint.net/

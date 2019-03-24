These guidelines have been assembled following an examination of emerging practices, ideas and existing styleguides, and include items from:

1. [Google's HTML styleguide](https://google.github.io/styleguide/htmlcssguide.html)
2. [jQuery's HTML Styleguide](http://contribute.jquery.org/style-guide/html/)
3. [Nicolas Ghallager's "Principles of writing consistent, idiomatic HTML"](https://github.com/necolas/idiomatic-html)
4. [Harry Robert's "My HTML/CSS coding style"](http://csswizardry.com/2012/04/my-html-css-coding-style/)
4. [The BBC's Media Standards and Guidelines](http://www.bbc.co.uk/guidelines/futuremedia/technical/semantic_markup.shtml)

### Doctype

Always use the minimal, versionless doctype.

```html
<!doctype html>
```

### Language

Always define which language the page is written in.

```html
<html lang="en">
```

### Encoding

Always define the character encoding. The encoding should be defined as early as possible. Make sure your editor uses UTF-8 as character encoding, without a byte order mark (UTF-8, no BOM). Do not specify the encoding of style sheets as these assume UTF-8.

```html
<meta charset="utf-8">
```

More on encodings and when and how to specify them can be found in [Handling character encodings in HTML and CSS](http://www.w3.org/International/tutorials/tutorial-char-enc/)

### Capitalisation
All HTML should be lowercase; element names, attributes, attribute values (unless text/CDATA), CSS selectors, properties, and property values (with the exception of strings). Additionally, there is no need to use CDATA to escape inline JavaScript, formerly a requirement to meet XML strictness in XHTML.

```html
<!-- Good -->
<img src="joomla.png" alt="Joomla">

<!-- Bad -->
<A HREF="/">Home</A>
```

```html
<!-- Good -->
a {
    color: #a3a3a3;
}

<!-- Bad -->
a {
    color: #A3A3A3;
}
```

### Protocol

Omit the protocol portion (http:, https:) from URLs pointing to images and other media files, style sheets, and scripts unless they are not available over both protocols.

This prevents mixed content issues and results in minor file size savings.

```html
<!-- Good -->
<link rel="stylesheet" href="//joomla.org/css/main.css">

<!-- Bad -->
<link rel="stylesheet" href="http://joomla.org/css/main.css">
```

### Elements and Attributes

Always include `<html>`, `<head>`, and `<body>` tags.

### Type attributes

Do not use type or attributes for style sheets (unless not using CSS) and scripts (unless not using JavaScript).

```html
<!-- Good -->
<link rel="stylesheet" href="//joomla.org/css/main.css">

<!-- Bad -->
<link rel="stylesheet" href="//joomla.org/css/main.css" type="text/css">
```

### Language attributes

Do not use language attributes on script tags.
```html
<!-- Good -->
<script href="//code.jquery.com/jquery-latest.js">

<!-- Bad -->
<script href="//code.jquery.com/jquery-latest.js" language="javascript">
```

### Attributes

Attribute values should be quoted using double ("") quotes. Optional attributes should be omitted.

```html
<!-- Good -->
<script src="//code.jquery.com/jquery-latest.js"></script>

<!-- Bad -->
<script src='//code.jquery.com/jquery-latest.js'></script>
```

Use attribute/value pairs for boolean attributes

```html
<!-- Good -->
<input type="checkbox" value="on" checked="checked">

<!-- Bad -->
<input type="checkbox" value="on" checked>
```

HTML attributes should be listed in an order that reflects the fact that class names are the primary interface through which CSS and JavaScript select elements.

1. class
2. id
3. data-*
4. Everything else

```html
<!-- Good -->
<a class="[some-value]" id="[some-value]" data-name="[some-value]" href="[some-value]">Text</a>

<!-- Bad -->
<a href="[some-value]" class="[some-value]" id="[some-value]" data-name="[some-value]">Text</a>
```

Elements with multiple attributes can have attributes arranged across multiple lines in an effort to improve readability and produce more useful diffs:

```html
<a class="[some-value]"
 data-action="[some-value]"
 data-id="[some-value]"
 href="[some-value]">
    <span>Text</span>
</a>
```

### Elements

Optional closing tags may not be omitted.

```html
<!-- Good -->
<p>The quick brown fox jumps over the lazy dog.</p>

<!-- Bad -->
<p>The quick brown fox jumps over the lazy dog.
```

Self-closing (void) elements should not be closed. Trailing forward slashes and spaces should be omitted.

```html
<!-- Good -->
<img src="//images/logo.png" alt="">

<!-- Bad -->
<img src="//images/logo.png" alt="" />
```

### Formatting

Use a new line for every block, list, or table element, and indent every such child element.

```html
<!-- Good -->
<div>
    <ul>
        <li>Home</li>
        <li>Blog</li>
    </ul>
</div>

<!-- Bad -->
<div><ul>
  <li>Home</li>
  <li>Blog</li>
</ul></div>
```

We prefer readability over file-size savings when it comes to maintaining existing files. Plenty of whitespace is encouraged. Use whitespace to visually separate groups of related markup and to improve the readability and maintainability of your HTML. Use two empty lines between larger blocks, and use a single empty line between child blocks of larger blocks. Be consistent. (If you are worried about your document's size, spaces (as well as repeated use of the same strings - for instance class names) are excellent candidates for compression. Also, you may use a markup minifier to decrease your document's file size.)

Keep line-length to a sensible maximum, e.g., 80 columns.

Tip: configure your editor to "show invisibles". This will allow you to eliminate end of line whitespace, eliminate unintended blank line whitespace, and avoid polluting commits.

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
    </tbody>
</table>
```

### Indentation

Don't indent inside `<html>`, `<body>`, `<script>`, or `<style>`. Indent inside `<head>` and all other elements. Indent by four spaces at a time. Don’t use tabs or mix tabs and spaces for indentation.

```html
<!-- Good -->
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

### Trailing Whitespace

Remove trailing white spaces. Trailing white spaces are unnecessary and can complicate diffs.

```html
<!-- Good -->
<p>Yes please.</p>

<!-- Bad -->
<p>No, thank you. </p>
```

### Entity References

Do not use entity references. There is no need to use entity references like &mdash;, &rdquo;, or &#x263a;, assuming the same encoding (UTF-8) is used for files and editors as well as among teams.

The only exceptions apply to characters with special meaning in HTML (like < and &) as well as control or “invisible” characters (like no-break spaces).

```html
<!-- Good -->
<p>The currency symbol for the Euro is “€”.</p>

<!-- Bad -->
<p>The currency symbol for the Euro is &ldquo;&eur;&rdquo;.</p>
```

### Inline CSS

Inline CSS must be avoided. When altering states using JavaScript, use CSS to define your states, and only use unobtrusive JavaScript to alter class names whenever possible.

```html
<!-- Good -->
<a class="is-link-disabled" href="//index.php">Home</a>

<!-- Bad -->
<a href="//index.php" style="text-decoration: line-through;">Home</a>
```

@todo more meaningful example.

### Style Attributes

You should not use border, align, valign, or clear attributes. Avoid use of style attributes, except where using syndicated content or internal syndicating systems.

### Semantics

Use HTML according to its purpose. For example, use heading elements for headings, `<p>` elements for paragraphs, `<a>` elements for anchors, etc.

Using HTML according to its purpose is important for accessibility, reuse, and code efficiency reasons.

```html
<!-- Good -->
<a href="subscriptions/">View subscriptions</a>

<!-- Bad -->
<div onclick="goToSubscriptions();">View subscriptions</div>
```

### Markup

#### Image Tags

Image elements (`<img>`) must have an alt attribute. Height and width attributes are optional and may be omitted.

@todo add examples from here http://www.bbc.co.uk/guidelines/futuremedia/technical/semantic_markup.shtml

### Comments

@todo: comment styles in JS, CSS, HTML

For more complex blocks of HTML, it may be useful to add a comment to the closing tag:

```html
<div class="parent">

    <div class="child">
    </div><!-- /child -->

</div><!-- /parent -->
```

### Mark todos
Highlight todos by using the keyword TODO, eg:

```html
<!-- TODO: add active item class -->
<ul>
    <li>Home</li>
    <li>Blog</li>
</ul>
```

### Adding line breaks

Always use `<br />` instead of `<br>` and `<br/>` eg:

```html
This text contains<br />a line break.
```

### Markup validation tools

@todo: list various testing tools:

* http://validator.w3.org/nu/
* http://csslint.net/

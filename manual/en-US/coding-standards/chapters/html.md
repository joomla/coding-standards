## html

These guidelines have been assembled following an examination of emerging practices, ideas and existing styleguides, and include items from:

1. [Google's html styleguide](http://google-styleguide.googlecode.com/svn/trunk/htmlcssguide.xml)

### Protocol

Omit the protocol portion (http:, https:) from URLs pointing to images and other media files, style sheets, and scripts unless they are not available over both protocols.

This prevents mixed content issues and results in minor file size savings.

```html
<!-- Good -->
<link rel="stylesheet" href="//joomla.org/css/main.css">

<!-- Bad -->
<link rel="stylesheet" href="http://joomla.org/css/main.css">
```

### Type attributes
Do not use type attributes for style sheets (unless not using CSS) and scripts (unless not using JavaScript).
```html
<!-- Good -->
<link rel="stylesheet" href="//joomla.org/css/main.css">

<!-- Bad -->
<link rel="stylesheet" href="//joomla.org/css/main.css" type="text/css">
```

### Capitalisation
All html should be lowercase; element names, attributes, attribute values (unless text/CDATA), CSS selectors, properties, and property values (with the exception of strings).

```html
<!-- Good -->
<img src="joomla.png" alt="Joomla">

<!-- Bad -->
<A HREF="/">Home</A>
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

### Semantics
Use HTML according to its purpose. For example, use heading elements for headings, p elements for paragraphs, a elements for anchors, etc.

Using HTML according to its purpose is important for accessibility, reuse, and code efficiency reasons.
```html
<!-- Good -->
<a href="subscriptions/">View subscriptions</a>

<!-- Bad -->
<div onclick="goToSubscriptions();">View subscriptions</div>
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

## General html formatting

These guidelines have been assembled following an examination of emerging practices, ideas and existing styleguides, namely:

1. [Google's html styleguide](http://google-styleguide.googlecode.com/svn/trunk/htmlcssguide.xml)

### Protocol

Omit the protocol portion (http:, https:) from URLs pointing to images and other media files, style sheets, and scripts unless the respective files are not available over both protocols.

This prevents mixed content issues and results in minor file size savings.

```html
<!-- Good -->
<script src="//www.google.com/js/gweb/analytics/autotrack.js"></script>
<!-- Bad -->
<script src="http://www.google.com/js/gweb/analytics/autotrack.js"></script>
```

### Capitalisation
All html shoudl be lowercase: This applies to HTML element names, attributes, attribute values (unless text/CDATA), CSS selectors, properties, and property values (with the exception of strings).


```html
<!-- Good -->
<img src="joomla.png" alt="Joomla">
<!-- Bad -->
<A HREF="/">Home</A>
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

## Html formatting
Use a new line for every block, list, or table element, and indent every such child element.

```html
<!-- Good -->
<div>
	<ul>
	  <li>Home</li>
	  <li>Blog</li>
	</ul>
</div>

<!-- Bad - ul is a block element -->
<div><ul>
  <li>Home</li>
  <li>Blog</li>
</ul></div>
```
These guidelines have been assembled following an examination of emerging practices, ideas and existing styleguides, namely:

1. [OOCSS Code Standards](https://github.com/stubbornella/oocss-code-standards)
2. [Oneweb Style Guide](https://github.com/nternetinspired/OneWeb/blob/master/STYLEGUIDE.md)
3. [Idiomatic CSS](https://github.com/necolas/idiomatic-css)

### Commenting

#### Major sections
Major code sections should be named in caps and within a full comment block, eg:

```css
/* ==========================================================================
   PRIMARY NAVIGATION
   ========================================================================== */
```

#### Sub sections
Subsections should be normally cased and within an open comment block.

```css
/* Mobile navigation
   ========================================================================== */
```

#### Verbose comments

```css
/**
 * Short description using Doxygen-style comment format
 *
 * The first sentence of the long description starts here and continues on this
 * line for a while finally concluding here at the end of this paragraph.
 *
 * The long description is ideal for more detailed explanations and
 * documentation. It can include example HTML, URLs, or any other information
 * that is deemed necessary or useful.
 *
 * @tag This is a tag named 'tag'
 *
 * TODO: This is a todo statement that describes an atomic task to be completed
 *   at a later date. It wraps after 80 characters and following lines are
 *   indented by 2 spaces.
 */
 ```

#### Basic comments

```css
/* Basic comment */
```

#### Uncompiled LESS/Scss comments

```css
// These are stripped on compile.
```

### CSS selectors
Only use classes for CSS selectors, *never IDs* as they introduce unwanted specificity to the cascade. Using an ID as a CSS selector is like firing the first nuke; you begin a specifity war that can only escalate, with terrible consequence.

To put it another way; Don't use a Sith Lord when just two Storm Troopers will suffice: [CSS Specificity Wars](http://www.stuffandnonsense.co.uk/archives/css_specificity_wars.html)

#### Class naming convention
Use dashes to create compound class names:

```css
/* Good - use dashes */
.compound-class-name {…}

/* Good - uses camelCase */
.compoundClassName {…}

/* Bad - uses underscores */
.compound_class_name {…}

/* Bad - does not use seperators */
.compoundclassname {…}
```

#### Indentation
Rules should be indented one tab (equal to 4 spaces):

```css
/* Good */
.example {
	color: #000;
	visibility: hidden;
}

/* Bad - all on one line */
.example {color: #000; visibility: hidden;}
```

#### Alignment
The opening brace must be on the same line as the last selector and preceded by a space. The closing brace must be on its own line after the last property and be indented to the same level as the opening brace.

```css
/* Good */
.example {
    color: #fff;
}

/* Bad - closing brace is in the wrong place */
.example {
    color: #fff;
    }

/* Bad - opening brace missing space */
.example{
    color: #fff;
}
```

#### Property Format
Each property must be on its own line and indented one level. There should be no space before the colon and one space after. All properties must end with a semicolon.

```css
/* Good */
.example {
    background: black;
    color: #fff;
}

/* Bad - missing spaces after colons */
.example {
    background:black;
    color:#fff;
}

/* Bad - missing last semicolon */
.example {
    background: black;
    color: #fff
}
```

#### HEX values
HEX values must be declared in lowercase and shorthand:

```css
/* Good */
.example {
    color: #eee;
}

/* Bad */
.example {
    color: #EEEEEE;
}
```

#### Attribute selectors
Always use double quotes around attribute selectors.

```css
/* Good */
input[type="button"] {
    ...
}

/* Bad - missing quotes */
input[type=button] {
    ...
}

/* Bad - using single quote */
input[type='button'] {
    ...
}
```

#### Zero value units
Zero values should not carry units.

```css
/* Good */
.example {
   padding: 0;
}

/* Bad - uses units */
.example {
   padding: 0px;
}
```

These guidelines have been assembled following an examination of emerging practices, ideas and existing styleguides, namely:

1. [Code Guide](http://codeguide.co) (by @mdo)

### Commenting

#### Major sections
Major code sections should be named in caps and within a full comment block, eg:

```scss
// Major comment
//
// Major comment description goes here
// and continues here
```

#### Sub sections
Subsections should be normally cased and within an open comment block.
```scss
//
// Sub section comment
//
```

#### Basic comments
```scss
// Basic comment
```

### Class naming
Use dashes to create compound class names:

```scss
// Good - use dashes
.compound-class-name {…}

// Good - uses camelCase
.compoundClassName {…}

// Bad - uses underscores
.compound_class_name {…}

// Bad - does not use seperators
.compoundclassname {…}
```

### Indentation
Rules should be indented with 2 spaces:

```scss
// Good
.example {
  color: #000;
  visibility: hidden;
}

// Bad - using tabs or 4 spaces
.example {
    color: #000;
    visibility: hidden;
}
```

SCSS should also be nested, with child selectors and rules indented again. Nested rules should also be spaced by one line:

```scss
// Good
.example {

  > li {
    float: none;

    + li {
      margin-top: 2px;
      margin-left: 0;
    }

  }

}

// Bad - nested rules indented with tab or 4 spaces
.example {

    > li {
        float: none;

        + li {
            margin-top: 2px;
            margin-left: 0;
        }

    }

}
```

### Alignment
The opening brace must be on the same line as the last selector and preceded by a space. The closing brace must be on its own line after the last property and be indented to the same level as the opening brace.

```scss
// Good
.example {
  color: #fff;
}

// Bad - closing brace is in the wrong place
.example {
  color: #fff;
  }

// Bad - opening brace missing space
.example{
  color: #fff;
}
```

### Declaration order
Related property declarations should be grouped together following the order:

1. Positioning
2. Box model
3. Typographic
4. Visual

```scss
// Good
.example {
  // Positioning
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 100;

  // Box-model
  display: block;
  float: right;
  width: 100px;
  height: 100px;

  // Typography
  font-family: Arial, sans-serif;
  font-size: 14px;
  line-height: 1.2;
  color: #333;
  text-align: center;

  // Visual
  background-color: #f5f5f5;
  border: 1px solid #e5e5e5;
  border-radius: 3px;

  // Misc
  opacity: 1;
}
```

Within each group, you'll also need to order the properties. If any mistakes are made, the compiler will notify you and provide the correct order

### Property Format
Each property must be on its own line and indented one level. There should be no space before the colon and one space after. All properties must end with a semicolon.

```scss
// Good
.example {
  background: black;
  color: #fff;
}

// Bad - missing spaces after colons
.example {
  background:black;
  color:#fff;
}

// Bad - missing last semicolon
.example {
  background: black;
  color: #fff
}
```

### HEX values
HEX values must be declared in lowercase and shorthand:

```scss
// Good
.example {
  color: #eee;
}

// Bad
.example {
  color: #EEEEEE;
}
```

### Attribute selectors
Always use double quotes around attribute selectors.

```scss
// Good
input[type="button"] {
  ...
}

// Bad - missing quotes
input[type=button] {
  ...
}

// Bad - using single quote
input[type='button'] {
  ...
}
```

### Zero value units
Zero values should not carry units.

```scss
// Good
.example {
  padding: 0;
}

// Bad - uses units
.example {
  padding: 0px;
}
```

### Prefixing properties
There is no need to prefix properties, as this will be automatically taken care of when compiling your code

```scss
// Good
.example {
  transform: rotate(30px);
}

// Bad - uses prefix
.example {
  -webkit-transform: rotate(30px);
  transform: rotate(30px);
}
```

### End of file
The end of the SCSS file should always have a blank line

```scss
.example {
  padding: 0;
}
<<< Leave empty line here
```

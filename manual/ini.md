.ini Language Files Format

An .ini file is composed of strings and comments. See [Specification of language files](https://docs.joomla.org/Specification_of_language_files).

### Formatting

#### Comments
There are 2 types of comments:
- Comments used as sections, to clarify the use of a group of strings.
- Comments used to inform translators of some characteristics of the string(s) just below. These should not be preceded by a blank line.

#### Strings
- All language strings are in British English (en-GB). See [Joomla! en-GB User Interface Text Guidelines](https://developer.joomla.org/en-gb-user-interface-text-guidelines/introduction.html)
- The lines commented should start with a semi-colon.
- The strings should be alphabetically ordered using the "Standard Alphabetical Order" and not the "ASCII order". This mostly means here that the underscore is sorted BEFORE the letters.

Example:  
```ini
COM_ABCD_FORMAT_WHATEVER
```
comes before
```ini
COM_ABCD_FORMATTING_WHATEVER
```  

Some specific text editors only sort by "ASCII order" and should not be used.

### Plugins
Some IDEs have specific plugins to sort the lines by "Standard Alphabetical Order".

Examples:
- Atom [Sort selected elements](https://github.com/BlueSilverCat/sort-selected-elements)
- Eclipse [Sortit](https://github.com/channingwalton/eclipse-sortit/tree/master/com.teaminabox.eclipse.sortit)
- NetBeans [Sort line tools](http://plugins.netbeans.org/plugin/45925/sort-line-tools)
- PhpStorm [String Manipulation](https://plugins.jetbrains.com/plugin/2162-string-manipulation)

It may be necessary to set the sorting to "Case Insensitive Sort" to obtain the correct results.

### Online tools
There is also an online tool which lets order this way (among other goodies): https://wordcounter.net/alphabetize

### Notes
When the file includes commented sections, the strings should be alphabetically ordered in each section.
Warning: when the comments concern specific strings and sorting has modified the order, the comments should be moved to the right place.
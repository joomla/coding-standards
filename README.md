Joomla Coding Standards [![Build Status](https://travis-ci.org/joomla/coding-standards.png?branch=phpcs-2)](https://travis-ci.org/joomla/coding-standards)
=======================

This repository includes the [Joomla](http://developer.joomla.org) coding standard definition for [PHP Codesniffer](https://github.com/squizlabs/PHP_CodeSniffer) along with a few other helpful resources.  The PHP_CodeSniffer standard will never be 100% accurate, but should be viewed as a strong set of guidelines while writing software for Joomla.

See Joomla coding standards documentation at [http://joomla.github.io/coding-standards/](http://joomla.github.io/coding-standards/)

If you want to contribute and improve this documentation find the source files at [https://github.com/joomla/coding-standards/tree/gh-pages](https://github.com/joomla/coding-standards/tree/gh-pages)

## Requirements

* PHP 5.3+
* [PHP Codesniffer](https://github.com/squizlabs/PHP_CodeSniffer) 2.6+

## Installation

Installation is as easy as checking out the repository to the correct location within PHP_CodeSniffer's directory structure.

### Install PHP_CodeSniffer.

	pear install PHP_CodeSniffer-2.6.*

### Install the Joomla standard.

	git clone https://github.com/joomla/coding-standards.git `pear config-get php_dir`/PHP/CodeSniffer/Standards/Joomla

## Running

You can use the installed Joomla standard like:

	phpcs --standard=Joomla path/to/code

Alternatively if it isn't installed you can still reference it by path like:

	phpcs --standard=path/to/joomla/coding-standards path/to/code

### Selectively Applying Rules

For consuming packages there are some items that will typically result in creating their own project ruleset.xml, rather than just directly using the Joomla ruleset.xml. A project ruleset.xml allows the coding standard to be selectivly applied for excluding 3rd party libraries, for consideration of backwards compatability in existing projects, or for adjustments necessary for projects that do not need php 5.3 compatability (which will be removed in a future version of the Joomla Coding Standard in connection of the end of php 5.3 support in all active Joomla Projects). 

For information on [selectivly applying rules read details in the PHP CodeSniffer wiki](https://github.com/squizlabs/PHP_CodeSniffer/wiki/Annotated-ruleset.xml#selectively-applying-rules)

#### Common Rule Set Adjustments

The most common adjustment is to exclude folders with 3rd party libraries, or where the code has yet to have coding standards applied.

```xml
<!-- Exclude folders not containing production code -->
	<exclude-pattern type="relative">build/*</exclude-pattern>
	<exclude-pattern type="relative">tests/*</exclude-pattern>

	<!-- Exclude 3rd party libraries. -->
	<exclude-pattern type="relative">libraries/*</exclude-pattern>
	<exclude-pattern type="relative">vendor/*</exclude-pattern>
```

Another common adjustment is to exclude the [camelCase format requirement](http://joomla.github.io/coding-standards/?coding-standards/chapters/php.md) for "Classes, Functions, Methods, Regular Variables and Class Properties" the essentially allows for B/C with snake_case variables which were only allowed in the context of interacting with the database.

```xml
 <rule ref="Joomla">
  <exclude name="Joomla.NamingConventions.ValidVariableName.NotCamelCaps"/>
  <exclude name="Joomla.NamingConventions.ValidVariableName.MemberNotCamelCaps"/>
 </rule>
```

Old Protected method names were at one time prefixed with an underscore. These Protected method names with underscores are depreceated in Joomla projects but for B\C reasons are still in the projects. As such excluding the MethodUnderscore sniff is a common ruleset adjustment

```xml
 <rule ref="Joomla">
  <exclude name="Joomla.NamingConventions.ValidFunctionName.MethodUnderscore"/>
 </rule>
```

The last most common adjustment is removing PHP 5.3 specific rules which prevent short array syntax.

```xml
 <rule ref="Generic">
  <exclude name="Generic.Arrays.DisallowShortArraySyntax"/>
 </rule>
```

## IDE autoformatters

There is further information on how to set up IDE auto formatters here: 

	https://github.com/joomla/coding-standards/tree/master/IDE

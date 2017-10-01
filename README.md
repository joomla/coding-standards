Joomla Coding Standards [![Build Status](https://travis-ci.org/joomla/coding-standards.svg?branch=master)](https://travis-ci.org/joomla/coding-standards)
=======================

[![Latest Stable Version](https://poser.pugx.org/joomla/coding-standards/v/stable.svg)](https://packagist.org/packages/joomla/coding-standards) [![Latest Unstable Version](https://poser.pugx.org/joomla/coding-standards/v/unstable.svg)](https://packagist.org/packages/joomla/coding-standards) [![License](https://poser.pugx.org/joomla/coding-standards/license.svg)](https://packagist.org/packages/joomla/coding-standards)

This repository includes the [Joomla](https://developer.joomla.org) coding standard definition for [PHP Codesniffer](https://github.com/squizlabs/PHP_CodeSniffer) along with a few other helpful resources.  The PHP_CodeSniffer standard will never be 100% accurate, but should be viewed as a strong set of guidelines while writing software for Joomla.

See Joomla coding standards documentation at [https://developer.joomla.org/coding-standards.html](https://developer.joomla.org/coding-standards.html)

If you want to contribute and improve this documentation, you can find the source files in the manual section of the master branch [https://github.com/joomla/coding-standards/tree/master/manual](https://github.com/joomla/coding-standards/tree/master/manual)

## Requirements

* PHP 5.4+
* [PHP Codesniffer](https://github.com/squizlabs/PHP_CodeSniffer) 3.1.0+

## Installation via Composer

Add `"joomla/coding-standards": "~3.1"` to the require-dev block in your composer.json and then run `composer install`.

```json
{
    "require-dev": {
		"joomla/coding-standards": "~3.0"
	}
}
```

Alternatively, you can simply run the following from the command line:

```sh
composer require joomla/coding-standards "~3.0"
```

As stability of joomla/coding-standards 3.0.0 is currently alpha, make sure you allow usage of alpha software in Composer:

```bash
composer property-set minimum-stability "alpha"
```

If you want to install the coding-standards globally, edit your Composer global configuration by running:

```bash
composer global config-e
```

and add the following: `"minimum-stability": "alpha"`

Once you have the coding standard files you can tell PHPCS where the standard folder is (i.e. install them in PHPCS)
```sh
phpcs --config-set installed_paths /path/to/joomla-coding-standards
```
Note: the composer scripts will run when the standard is installed globally, but not when it's a dependancy. As such, you may want to run PHPCS config-set. When you run PHPCS config-set it will always overwrite the previous values. Use `--config-show` to check previous values before using `--config-set`
So instead of overwriting the existing paths you should copy the existing paths revealed with `--config-show` and add each one seperated by a comma:
`phpcs --config-set installed_paths [path_1],[path_2],[/path/to/joomla-coding-standards]`

## Running

You can use the installed Joomla standard like:

	phpcs --standard=Joomla path/to/code

Alternatively if it isn't installed you can still reference it by path like:

	phpcs --standard=path/to/joomla/coding-standards path/to/code

### Selectively Applying Rules

For consuming packages there are some items that will typically result in creating their own project ruleset.xml, rather than just directly using the Joomla ruleset.xml. A project ruleset.xml allows the coding standard to be selectively applied for excluding 3rd party libraries, for consideration of backwards compatibility in existing projects, or for adjustments necessary for projects that do not need PHP 5.3 compatibility (which will be removed in a future version of the Joomla Coding Standard in connection of the end of PHP 5.3 support in all active Joomla Projects).

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

Another common adjustment is to exclude the [camelCase format requirement](https://developer.joomla.org/coding-standards/php-code.html) for "Classes, Functions, Methods, Regular Variables and Class Properties" the essentially allows for B/C with snake_case variables which were only allowed in the context of interacting with the database.

```xml
 <rule ref="Joomla">
  <exclude name="Joomla.NamingConventions.ValidFunctionName.ScopeNotCamelCaps"/>
  <exclude name="Joomla.NamingConventions.ValidVariableName.NotCamelCaps"/>
  <exclude name="Joomla.NamingConventions.ValidVariableName.MemberNotCamelCaps"/>
  <exclude name="Joomla.NamingConventions.ValidFunctionName.FunctionNoCapital"/>
 </rule>
```

Old Protected method names were at one time prefixed with an underscore. These Protected method names with underscores are deprecated in Joomla projects but for B/C reasons are still in the projects. As such, excluding the MethodUnderscore sniff is a common ruleset adjustment

```xml
 <rule ref="Joomla">
  <exclude name="Joomla.NamingConventions.ValidFunctionName.MethodUnderscore"/>
  <exclude name="Joomla.NamingConventions.ValidVariableName.ClassVarHasUnderscore"/>
 </rule>
```

The last most common adjustment is removing PHP 5.3 specific rules which prevent short array syntax, and allowing short array syntax for method parameters.

```xml
 <rule ref="Generic">
  <exclude name="Generic.Arrays.DisallowShortArraySyntax"/>
 </rule>
 <rule ref="Joomla.Classes.InstantiateNewClasses">
   <properties>
     <property name="shortArraySyntax" value="true"/>
   </properties>
 </rule>
 
```
## Using example rulesets that Selectively Applying Rule
You have to tell you can tell PHPCS where the example ruleset folder is (i.e. install them in PHPCS)
```sh
phpcs --config-set installed_paths /path/to/joomla/coding-standards/Example-Rulesets
```
Note: the composer scripts will run when the standard is installed globally, but not when it's a dependancy. As such, you may want to run PHPCS config-set. When you run PHPCS config-set it will always overwrite the previous values. Use `--config-show` to check previous values before using `--config-set`
So instead of overwriting the existing paths you should copy the existing paths revealed with `--config-show` and add each one seperated by a comma:
`phpcs --config-set installed_paths [path_1],[path_2],[/path/to/joomla-coding-standards],[/path/to/joomla/coding-standards/Example-Rulesets]`

## IDE autoformatters

There is further information on how to set up IDE auto formatters here: 

[https://github.com/joomla/coding-standards/tree/master/Joomla/IDE](https://github.com/joomla/coding-standards/tree/master/Joomla/IDE)


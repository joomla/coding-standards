Joomla Coding Standards
=======================

This repository includes the Joomla! Coding Standard definition for
[PHP Codesniffer](http://pear.php.net/PHP_CodeSniffer) modified for use with Composer.

While the original is based on PEAR, this version describes the same rules based on PSR1 and PSR-2.

See Joomla coding standards documentation at
[http://joomla.github.io/coding-standards/](http://joomla.github.io/coding-standards/)
  
## Requirements

* PHP 5.3+
* [PHP Codesniffer](http://pear.php.net/PHP_CodeSniffer) 2+

## Installation

Add this package to your requirements.

```
$ composer require --prefer-source greencape/joomla-cs:dev-master
```

The PHP CodeSniffer tool is installed automatically in a matching version.

## Running

You can use the installed Joomla standard like:

```
$ phpcs --standard=Joomla path/to/code
```

## IDE autoformatters

There is further information on how to set up IDE auto formatters here: 

    https://github.com/joomla/coding-standards/tree/master/IDE

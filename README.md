Joomla Coding Standards
=======================

This repository includes the [Joomla](http://developer.joomla.org) coding standard definition for [PHP Codesniffer](http://pear.php.net/PHP_CodeSniffer) along with a few other helpful resources.  The PHP_CodeSniffer standard will never be 100% accurate, but should be viewed as a strong set of guidelines while writing software for Joomla.

See Joomla coding standards documentation at [http://joomla.github.io/coding-standards/](http://joomla.github.io/coding-standards/)

If you want to contribute and improve this documentation find the source files at [https://github.com/joomla/coding-standards/tree/gh-pages](https://github.com/joomla/coding-standards/tree/gh-pages)

## Requirements

  * PHP 5.3+
  * [Composer](https://getcomposer.org/)

## Installation

Add this package to your requirements.

```bash
$ composer require --dev joomla/coding-standards:~2
```

The PHP CodeSniffer tool is installed automatically in a matching version.

You can verify a successful install with

```bash
$ ./vendor/bin/phpcs -i
The installed coding standards are MySource, PSR2, Squiz, Zend, PHPCS, PSR1, PEAR and Joomla
```

## Running

You can use the installed Joomla standard like:

```bash
$ ./vendor/bin/phpcs --standard=Joomla path/to/code
$ ./vendor/bin/phpcbf --standard=Joomla path/to/code
```

## IDE autoformatters

There is further information on how to set up IDE auto formatters here: 

	https://github.com/joomla/coding-standards/tree/master/src/Joomla/IDE

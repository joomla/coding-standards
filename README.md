Joomla Coding Standards
=======================

This repository includes the [Joomla](http://developer.joomla.org) coding standard definition for [PHP Codesniffer](http://pear.php.net/PHP_CodeSniffer) along with a few other helpful resources.
It is a fork of the original [Joomla Coding Standard repository](https://github.com/joomla/coding-standards) modified for use with Composer.  
  
## Requirements

* PHP 5.3+
* [PHP Codesniffer](http://pear.php.net/PHP_CodeSniffer) 1.5+

**Important note**: currently the latest PHPCS is the 2.x series. But Joomla Sniffers is not yet compatible with this version. PEAR gives you the option to install it by default but  Joomla sniffers will not work, thus remind to always install PHPCS in a version below 2.0.


## Installation

Add this package to your requirements.

```
$ composer require --prefer-source greencape/joomla-cs:dev-master
```

The PHP CodeSniffer tool is installed automatically in a matching version.

## Running

You can use the installed Joomla standard like:

```
$ phpcs --standard=vendor/greencape/joomla-cs/Joomla path/to/code
```

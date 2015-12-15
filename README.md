Joomla Coding Standards
=======================

This repository includes the [Joomla](http://developer.joomla.org) coding standard definition for [PHP Codesniffer](http://pear.php.net/PHP_CodeSniffer) along with a few other helpful resources.  The PHP_CodeSniffer standard will never be 100% accurate, but should be viewed as a strong set of guidelines while writing software for Joomla.

See Joomla coding standards documentation at [http://joomla.github.io/coding-standards/](http://joomla.github.io/coding-standards/)

If you want to contribute and improve this documentation find the source files at [https://github.com/joomla/coding-standards/tree/gh-pages](https://github.com/joomla/coding-standards/tree/gh-pages)

## Requirements

* PHP 5.3+
* [PHP Codesniffer](https://github.com/squizlabs/PHP_CodeSniffer) 1.5+

**Important note**: currently the latest PHPCS is the 2.x series. But Joomla Sniffers is not yet compatible with this version. PEAR gives you the option to install it by default but  Joomla sniffers will not work, thus remind to always install PHPCS in a version below 2.0.


## Installation

Installation is as easy as checking out the repository to the correct location within PHP_CodeSniffer's directory structure.

### Install PHP_CodeSniffer.

	pear install PHP_CodeSniffer-1.5.6

### Install the Joomla standard.

	git clone https://github.com/joomla/coding-standards.git `pear config-get php_dir`/PHP/CodeSniffer/Standards/Joomla

## Running

You can use the installed Joomla standard like:

	phpcs --standard=Joomla path/to/code

Alternatively if it isn't installed you can still reference it by path like:

	phpcs --standard=path/to/joomla/coding-standards path/to/code
	
## IDE autoformatters

There is further information on how to set up IDE auto formatters here: 

	https://github.com/joomla/coding-standards/tree/master/IDE

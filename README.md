GreenCape Coding Standards
==========================

This repository includes Coding Standard definitions for
[PHP CodeSniffer](http://pear.php.net/PHP_CodeSniffer) 2.x for use with Composer.

Currently, these Coding Standards are included:

  * [Joomla! Coding Standard](http://joomla.github.io/coding-standards/) 
  * [WordPress Coding Standard](https://make.wordpress.org/core/handbook/best-practices/coding-standards/php/) 
  * [PEAR](https://pear.php.net/manual/en/standards.php),
    [PSR1](http://www.php-fig.org/psr/psr-1/),
    [PSR2](http://www.php-fig.org/psr/psr-2/),
    Squiz, and
    [Zend](http://framework.zend.com/manual/current/en/ref/coding.standard.html) Coding Standards are provided by PHP CodeSniffer natively.  
  
## Requirements

  * PHP 5.3+
  * [Composer](https://getcomposer.org/)

## Installation

Add this package to your requirements.

```bash
$ composer require --dev greencape/coding-standards:~1
```

The PHP CodeSniffer tool is installed automatically in a matching version.

You can verify a successful install with

```bash
$ ./vendor/bin/phpcs -i
The installed coding standards are MySource, PSR2, Squiz, Zend, PHPCS, PSR1, PEAR, WordPress and Joomla
```

## Running

You can use the installed Joomla standard like:

```bash
$ ./vendor/bin/phpcs --standard=Joomla path/to/code
$ ./vendor/bin/phpcbf --standard=Joomla path/to/code
```

You can use the installed WordPress standard like:

```bash
$ ./vendor/bin/phpcs --standard=WordPress path/to/code
$ ./vendor/bin/phpcbf --standard=WordPress path/to/code
```

In both cases, the second (`phpcbf`) line will fix some issues automatically.
However, this part is work in progress, and will improve over time.

## Contributing

If you want to contribute to this project, you can

  * fork this repo, code, and send a Pull Request
  * file an issue in the [Issue Tracker](https://github.com/GreenCape/coding-standards/issues)

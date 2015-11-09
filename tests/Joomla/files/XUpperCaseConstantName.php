<?php
/**
 * Test file for the Joomla! Coding Standard
 */

// Valid: all uppercase
define('FOO_CONSTANT', 'foo');

class A
{
	const FOO_CONSTANT = 'foo';
}

// Invalid: mixed case
define('Foo_Constant', 'foo');

class B
{
	const foo_constant = 'foo';
}

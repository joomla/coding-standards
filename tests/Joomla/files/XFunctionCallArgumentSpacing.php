<?php
/**
 * Test file for the Joomla! Coding Standard
 */

// Valid: Single spaces after a comma.
function foo1($bar, $baz)
{
}

// Invalid: No spaces after a comma.
function foo2($bar,$baz)
{
}

// Valid: Single spaces around an equals sign in function declaration.
function foo3($baz = true)
{
}

// Invalid: No spaces around an equals sign in function declaration.
function foo4($baz=true)
{
}

// Valid: Multiple spaces before an equals sign in function declaration for alignment.
function foo5(
	$foobar = 1,
	$baz    = true
)
{
}


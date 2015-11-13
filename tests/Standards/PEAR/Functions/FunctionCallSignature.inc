<?php

// Valid: spaces between parameters
$var = foo($bar, $baz, $quux);

// Invalid: additional spaces used
$var = foo( $bar, $baz, $quux );

// Invalid: additional spaces used
$var = foo ($bar, $baz, $quux) ;

// Valid: Multiline parameters
$var = foo(
	$bar,
	$baz,
	$quux
);

// Invalid: Multiline parameters not aligned
$var = foo(
	$bar, $baz,
	$quux);

<?php

// Valid: Object operator at the start of a new line and indented correctly.
$foo
	->bar()
	->baz();

// Invalid: Object operator at the end of the line.
$foo->
	bar()->
	baz();

// Invalid: Object operator not indented correctly.
$foo
->bar()
->baz();

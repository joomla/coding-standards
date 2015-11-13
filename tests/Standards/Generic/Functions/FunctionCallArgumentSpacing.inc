<?php

// Valid: Single space after a comma.
foo1($bar, $baz);

// Invalid: Spaces before a comma.
foo1($bar , $baz);

// Invalid: No space after a comma.
foo2($bar,$baz);

// Valid: Alignment of arguments.
foo1(
    $bar,
    $baz
);

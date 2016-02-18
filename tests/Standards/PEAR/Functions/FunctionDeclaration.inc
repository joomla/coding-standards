<?php

// Valid: Correct spacing around function and use keywords.
$foo = function () use ($bar) {
};

// Invalid: No spacing around function and use keywords.
$foo = function()use($bar){
};

// Valid: Multi-line function declaration formatted properly.
function foo(
    $bar,
    $baz
) {
};

// Invalid: Invalid indentation and formatting of closing parenthesis.
function foo(
$bar,
$baz)
{
};

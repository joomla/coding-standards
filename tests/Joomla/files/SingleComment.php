<?php

// Valid: Single line comment with leading '//'

// Comment
$a = 1;

// Invalid: Single line comment with leading '#'

# Comment
$a = 1;

// Invalid: Start comment with lowercase letter

// comment
$a = 1;

// Valid: C-style comment block

/*
 * This is a comment
 * using several lines
 */
$a = 1;

// Valid: Short (2 lines) comment block with leading '//'

// This is a comment
// using several lines
$a = 1;

// Invalid: Long comment block with leading '//'

// This is a comment
// using several lines
// This is a comment
// using several lines
$a = 1;

// Invalid: Comment on the same line as the code

$a = 1; // Comment

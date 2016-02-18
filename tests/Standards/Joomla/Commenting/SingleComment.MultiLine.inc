<?php

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

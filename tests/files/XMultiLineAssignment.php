<?php
/**
 * Test file for the Joomla! Coding Standard
 */

// Valid: Assignment operator at the start of the second line, indented one level.
$foo
    = $bar;

// Invalid: Assignment operator at end of first line.
$foo =
    $bar;

// Invalid: Assignment operator not indented.
$foo
= $bar;

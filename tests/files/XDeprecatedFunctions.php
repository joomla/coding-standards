<?php
/**
 * Test file for the Joomla! Coding Standard
 */

$bar = 'a|b';

// Valid: A non-deprecated function is used.
$foo = explode('|', $bar);

// Invalid: A deprecated function is used.
$foo = split('|', $bar);

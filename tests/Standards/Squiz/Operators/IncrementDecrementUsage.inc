<?php
/**
 * Test file for the Joomla! Coding Standard
 */

$i = 1;

// Valid: Isolated inc/dec
$i++;
++$i;

// Valid: Inc/dec in arithmetic expression
$a = 3 + $i--;
$a = 3 + ++$i;

// Invalid: Inc/dec in string concatenation
$a = 'a' . $i--;
$a = 'a' . ++$i;

<?php
/**
 * Test file for the Joomla! Coding Standard
 */

class A
{
}

// Invalid: Instantiate parameter-less classes with brackets
$a = new A();

// Valid: Instantiate parameter-less classes with brackets
$a = new A;

<?php
/**
 * Test file for the Joomla! Coding Standard
 */

// Valid: argument with default value at end of declaration.
function a($dsn, $persistent = false)
{
}

// Invalid: argument with default value at start of declaration.
function b($persistent = false, $dsn)
{
}

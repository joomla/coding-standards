<?php
/**
 * Test file for the Joomla! Coding Standard
 */

class A
{
    // Invalid: Property declaration without visibility modifier.
    var $foo;

    // Valid: Property declaration with visibility modifier.
    private $a;
    protected $b;
    public $c;
}

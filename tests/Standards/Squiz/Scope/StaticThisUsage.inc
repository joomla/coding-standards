<?php
/**
 * Test file for the Joomla! Coding Standard
 */

// Valid: Using self:: to access static variables.
class A
{
    private static $staticMember = 1;

    static function bar()
    {
        return self::$staticMember;
    }
}

// Invalid: Using $this-> to access static variables.
class B
{
    private static $staticMember = 1;

    static function bar()
    {
        return $this->$staticMember;
    }
}

<?php
/**
 * Test file for the Joomla! Coding Standard
 */

class A
{
    // Invalid: Method declaration without visibility modifier.
    function fooFunc()
    {
    }

    // Valid: Method declaration with visibility modifier.
    private function aFunc()
    {
    }
    protected function bFunc()
    {
    }
    public function cFunc()
    {
    }
}

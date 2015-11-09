<?php
/**
 * Test file for the Joomla! Coding Standard
 */

class A
{
	public function test()
	{
		// Valid: Lowercase self used with correct spacing.
		self::foo();

		// Invalid: Uppercase self used.
		SELF::foo();

		// Invalid: Incorrect spacing used.
		self :: foo();
	}

	private static function foo() {}
}
// Valid: Self used as reference.
class B
{
	public static function bar()
	{
	}

	public static function baz()
	{
		self::bar();
    }
}

// Invalid: Local class name used as reference.
class C
{
	public static function bar()
	{
	}

    public static function baz()
	{
		C::bar();
    }
}

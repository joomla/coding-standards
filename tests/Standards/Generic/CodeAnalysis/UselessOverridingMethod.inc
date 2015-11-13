<?php
/**
 * Test file for the Joomla! Coding Standard
 */

class A
{
	protected function bar()
	{
	}
}

class B extends A
{
	// Valid: A method that extends functionality on a parent method.
	public function bar()
	{
		parent::bar();
		$this->doSomethingElse();
	}

	private function doSomethingElse() {}
}

class C extends A
{
	// Invalid: An overriding method that only calls the parent.
	public function bar()
	{
		parent::bar();
	}
}

<?php
class MyClass
{
	public $value = 'default';

	/**
	 * Return type missing for return tag.
	 * FixableError: false
	 *
	 * @return
	 */
	public function myFunction()
	{
		return 2;
	}
}

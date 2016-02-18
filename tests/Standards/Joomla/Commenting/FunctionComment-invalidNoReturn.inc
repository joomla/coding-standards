<?php
class MyClass
{
	public $value = 'default';

	/**
	 * InvalidNoReturn - Function return type is not void, but function has no return statement.
	 *
	 * @return  integer
	 */
	public function myFunction()
	{
		$a = 2;
	}

	/**
	 * InvalidReturnNotVoid - Function return type is not void, but function is returning void here.
	 *
	 * @return  integer
	 */
	public function myFunction()
	{
		$a = 2;

		return;
	}
}

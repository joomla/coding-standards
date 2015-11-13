<?php
class MyClass
{
	public $value = 'default';

	/**
	 * InvalidReturn - Invalid function return type. Expected "integer"; Found "int"
	 * FixableError: true
	 *
	 * @return  int
	 */
	public function myFunction()
	{
		return 2;
	}
}

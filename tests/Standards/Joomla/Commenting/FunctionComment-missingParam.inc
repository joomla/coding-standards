<?php
class MyClass
{
	public $value = 'default';

	/**
	 * MissingParamComment
	 * FixableError: false
	 *
	 * @param   integer  $var
	 *
	 * @return  integer
	 */
	public function myFunction($var)
	{
		return 2;
	}

	/**
	 * MissingParamName
	 * FixableError: false
	 *
	 * @param   integer  Some awesome var.
	 *
	 * @return  integer
	 */
	public function myFunction($var)
	{
		return 2;
	}

	/**
	 * MissingParamType
	 * FixableError: false
	 *
	 * @param   $var  Some awesome var.
	 *
	 * @return  integer
	 */
	public function myFunction($var)
	{
		return 2;
	}
}

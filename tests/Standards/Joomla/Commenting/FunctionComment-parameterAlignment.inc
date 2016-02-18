<?php
class MyClass
{
	public $value = 'default';

	/**
	 * ParameterNamesNotAligned
	 * FixableError: false
	 *
	 * @param   integer  $var	 Some awesome var.
	 * @param   integer $value  Some awesome value.
	 *
	 * @return  integer
	 */
	public function myFunction($var, $value)
	{
		return 2;
	}

	/**
	 * ParameterCommentsNotAligned
	 * FixableError: false
	 *
	 * @param   integer  $var	Some awesome var.
	 * @param   integer  $value   Some awesome value.
	 *
	 * @return  integer
	 */
	public function myFunction($var, $value)
	{
		return 2;
	}
}

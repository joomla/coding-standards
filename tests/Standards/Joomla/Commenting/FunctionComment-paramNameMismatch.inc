<?php
class MyClass
{
	public $value = 'default';

	/**
	 * ParamNameNoMatch - Doc comment for parameter $val does not match actual variable name $var.
	 * FixableError: false
	 *
	 * @param   integer  $val  Some awesome var.
	 *
	 * @return  integer
	 */
	public function myFunction($var)
	{
		return 2;
	}

	/**
	 * ParamNameNoCaseMatch - Doc comment for parameter $vAr does not match case of actual variable name $var.
	 * FixableError: false
	 *
	 * @param   integer  $vAr  Some awesome var.
	 *
	 * @return  integer
	 */
	public function myFunction($var)
	{
		return 2;
	}
}

<?php
class MyClass
{
	public $value = 'default';

	/**
	 * Useless return tag.
	 * FixableError: false
	 *
	 * @return  void
	 */
	public function __construct()
	{

	}

	/**
	 * Useless return tag.
	 * FixableError: false
	 *
	 * @return  void
	 */
	public function __destruct()
	{

	}

	/**
	 * Only 1 return tag is allowed.
	 * FixableError: false
	 *
	 * @return  void
	 * @return  integer
	 */
	public function myFunction()
	{
		return 2;
	}

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

	/**
	 * InvalidNoReturn - Function return type is not void, but function has no return statement.
	 * FixableError: false
	 *
	 * @return  integer
	 */
	public function myFunction()
	{
		$a = 2;
	}

	/**
	 * InvalidReturnNotVoid - Function return type is not void, but function is returning void here.
	 * FixableError: false
	 *
	 * @return  integer
	 */
	public function myFunction()
	{
		$a = 2;

		return;
	}

	/**
	 * MissingReturn - Missing return tag in function comment.
	 * FixableError: false
	 */
	public function myFunction()
	{
		return 2;
	}

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

	/**
	 * BeforeParamType
	 * FixableError: true
	 *
	 * @param  integer  $var  Some awesome var.
	 *
	 * @return  integer
	 */
	public function myFunction($var)
	{
		return 2;
	}

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

	/**
	 * Get the details list of keys for a table.
	 *
	 * @param   array  $keys  An array of objects that comprise the keys for the table.
	 *
	 * @return  array  The lookup array. array({key name} => array(object, ...))
	 *
	 * @since   1.0
	 */
	protected function getKeyLookup($keys)
	{
		// First pass, create a lookup of the keys.
		$lookup = array();

		return $lookup;
	}

	/**
	 * Test function ArrayWithClosure
	 *
	 * @return array
	 */
	function returnArrayWithClosure()
	{
	    function ()
		{
		return;
	    };

	    return array();
	}

	/**
	 * Test function ArrayWithAnonymousClass
	 *
	 * @return array
	 */
	function returnArrayWithAnonymousClass()
	{
	    new class
		{
		/**
		 * @return void
		 */
		public function test()
			{
		    return;
		}
	    };

	    return array();
	}
}

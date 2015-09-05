<?php

// Warnings
$warnings = 0;

// Errors
$errors = 1;

// Fixable Errors
	// WrongStyle
	$a = 1;

	# Cool if...
	if ($a)
	{
		echo true;
	}


	//NoSpace
	if ($a)
	{
		echo true;
	}


	// lowerCaseStart
	if ($a)
	{
		echo true;
	}

	/*
	 * lower CaseStart
	 * for multi line
	 * style comments.
	 */
	if ($a)
	{
		echo true;
	}


	// LowerCaseAfterSentenceEnd error check.
	// this line must start with upper case letter.
	if ($a)
	{
		echo true;
	}

	/*
	 * LowerCaseAfterSentenceEnd error check.
	 * for multi line
	 * style comments.
	 */
	if ($a)
	{
		echo true;
	}


	// SameLine
	$a = 2; // I'm not allowed here.


	// BlankBefore
	$a = 1;
	// I must have a blank before me.
	$a = 2;


	// MultiLine
	$a = 1;

	// MultiLine check.
	// There should only be
	// two lines of // comments.
	if ($a)
	{
		echo true;
	}

class Hello
{
	function hello()
	{
		/*
		 * lower CaseStart
		 * for multi line
		 * style comments.
		 */
		$out = 'Hello';
	}
}

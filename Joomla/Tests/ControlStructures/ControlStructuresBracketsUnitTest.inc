<?php
$a = true;

// Warning
if ($a)
	echo true;

// Fixable errors
if ($a) {
	echo true;
}

if ($a)

{
	echo true;
}

if ($a)
{echo true;
}

function muh()
{
	if ($a)
		{
		echo true;
	}

	if ($a)
{
		echo true;
	}
}

// NewlineAfterOpenBrace
if ($a)
{

	echo true;
}

while ($a < $b)
{


	echo 'muh';
}

// @todo add NewlineAfterOpenBrace with keywords...

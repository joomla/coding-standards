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

// Note the echo here will not be indented by this sniff but by PEAR's MultiLineConditionSniff
if ($a)
{echo true;
}

if ($a)
     {
	echo true;
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

	// If statement with spaces which aren't equal to a tab space (4 spaces)
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

// Closure indentation tests
function foo()
{
	$buffer = preg_replace_callback(
		$regex,
		function ($match) use ($base, $protocols)
		{
			preg_match_all('#(?:[^\s]+)\s*(?:[\d\.]+[wx])?(?:\,\s*)?#i', $match[1], $matches);

			foreach ($matches[0] as &$src)
		{
				$src = preg_replace('#^(?!/|' . $protocols . '|\#|\')(.+)#', $base . '$1', $src);
			}

			return ' srcset="' . implode($matches[0]) . '"';
		},
		$buffer
	);

	return $buffer
}

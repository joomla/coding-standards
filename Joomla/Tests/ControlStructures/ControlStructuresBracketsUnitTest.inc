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

// NewlineAfterOpenBrace
if ($a)
{

	echo true;
}

while ($a < $b)
{


	echo 'muh';
}

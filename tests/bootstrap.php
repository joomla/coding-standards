<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';

$GLOBALS['PHP_CODESNIFFER_SNIFF_CODES']   = [];
$GLOBALS['PHP_CODESNIFFER_FIXABLE_CODES'] = [];

// Require this here so that the unit tests don't have to try and find the
// abstract class once it is installed into the PEAR tests directory.
require_once __DIR__ . '/AbstractSniffTestCase.php';

spl_autoload_register(function ($className)
{
	$fileName = dirname(__DIR__) . '/src/' . str_replace('_', '/', $className) . '.php';
	if (file_exists($fileName))
	{
		include $fileName;
	}
});

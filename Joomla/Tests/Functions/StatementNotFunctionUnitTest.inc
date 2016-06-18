<?php
$a = 'no_file.php';
$b = new stdClass;

require($a);
require_once($a);
include($a);
include_once($a);
clone($b);
echo($a);
echo $a;

require(realpath(__DIR__) . '/' . $a);

require (realpath(__DIR__) . '/no_file.php');

require  ($a);

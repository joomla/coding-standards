<?php

// Valid: count() is used in place of sizeof().

$foo = count($bar);

// Invalid: sizeof() is used.

$foo = sizeof($bar);

// Valid: unset() is used in place of delete().

unset($bar);

// Invalid: delete() is used.

delete($bar);

<?php

// Valid: Single word elseif keyword used.
if ($foo) {
    $var = 1;
} elseif ($bar) {
    $var = 2;
}

// Invalid: Separate else and if keywords used.
if ($foo) {
    $var = 1;
} else if ($bar) {
    $var = 2;
}

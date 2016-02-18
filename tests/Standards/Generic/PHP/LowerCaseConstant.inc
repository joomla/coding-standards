<?php

// Valid: lowercase constants

if ($var === false || $var === null) {
    $var = true;
}

// Invalid: uppercase constants

if ($var === FALSE || $var === NULL) {
    $var = TRUE;
}

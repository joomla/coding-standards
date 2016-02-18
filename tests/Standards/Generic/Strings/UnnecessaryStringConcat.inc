<?php

// Valid: A string can be concatenated with an expression.

echo '5 + 2 = ' . (5 + 2);

// Invalid: Strings should not be concatenated together.

echo 'Hello' . ' ' . 'World';

// Optional: Strings concatenated over multiple lines are allowed

echo 'Hello'
    . ' '
    . 'World';

// Valid: Allow strings to be combined if they would have < and ? next to each other

echo '<' . '?php ?' . '>';

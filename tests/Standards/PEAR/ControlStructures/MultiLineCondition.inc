<?php

// Valid: Correct indentation.
if ($foo
	&& $bar
) {
}

// Invalid: No indentation used on the condition lines.
if ($foo
&& $bar
) {
}

// Valid: Boolean operator at the start of the line.
if ($foo
	&& $bar
) {
}

// Invalid: Boolean operator at the end of the line.
if ($foo &&
	$bar
) {
}

// Valid: End parenthesis on a new line.
if ($foo
	&& $bar
) {
}

// Invalid: End parenthesis not moved to a new line.
if ($foo
	&& $bar) {
}

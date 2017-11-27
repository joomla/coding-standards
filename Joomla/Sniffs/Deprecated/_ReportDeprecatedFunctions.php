<?php
{
	$dir = '/home/ruud/geany/joomla-library';
	$regex = '#@deprecated(?P<deprecated>.+)(.|\n)+?\*\/(.|\n)+?function (?P<function>.+?)\(#i';

	scan_all($dir, $regex);

	exit;
}

/**
 * Scan the library path, recursively including all PHP files
 *
 * @param   string  $dir    The direcry to iterate
 * @param   string  $regex  The regex for identifying deprecated function (from docblock))
 * @param   int     $depth  (optional)
 */
function scan_all($dir, $regex, $depth = 0)
{
	// Require all php files
	$scan = glob("$dir/*");

	foreach ($scan as $path)
	{
		if (preg_match('/\.php$/', $path))
		{
			preg_match_all($regex, file_get_contents($path), $keys, PREG_PATTERN_ORDER);

			if (is_array($keys) && !empty($keys['deprecated']))
			{
				$count = 0;

				foreach ($keys['deprecated'] as $key)
				{
					echo '"' . $keys['function'][$count] . '","' . trim($key) . '","' . $path . '"' . "\n\r";
					$count++;
				}
			}
		}
		elseif (is_dir($path))
		{
			scan_all($path, $regex, $depth + 1);
		}
	}
}

<?php
/**
 * Joomla! Coding Standard
 *
 * @package    Joomla.CodingStandard
 * @copyright  Copyright (C) 2015 Open Source Matters, Inc. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License Version 2 or Later
 */

/**
 * ControlStructuresBracketsUnitTest
 *
 * @since     1.0
 */
class Joomla_Tests_ControlStructures_ControlStructuresBracketsUnitTest extends AbstractSniffUnitTest
{
	/**
	 * Returns the lines where errors should occur.
	 *
	 * The key of the array should represent the line number and the value
	 * should represent the number of errors that should occur on that line.
	 *
	 * @return array<int, int>
	 */
	public function getErrorList()
	{
		return array(
				10  => 1,
				16 => 1,
				22 => 1,
				26 => 1,
				33 => 1,
				38 => 1,
				44 => 1,
				51 => 1,
				57 => 1,
				74 => 1,
				78 => 1,
				106 => 1,
				112 => 1,
				120 => 1,
				126 => 1,
				135 => 1,
				182 => 1,
				188 => 1,
				210 => 1,
				226 => 1,
				235 => 1,
				263 => 1,
                284 => 1,
                287 => 1,
                291 => 1,
                297 => 1,
			   );
	}

	/**
	 * Returns the lines where warnings should occur.
	 *
	 * The key of the array should represent the line number and the value
	 * should represent the number of warnings that should occur on that line.
	 *
	 * @return array<int, int>
	 */
	public function getWarningList()
	{
		return array(6 => 1,);
	}
}

<?php
/**
 * Joomla! Coding Standard
 *
 * @copyright  Copyright (C) 2015 Open Source Matters, Inc. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License Version 2 or Later
 */

/**
 * InstantiateNewClassesUnitTest
 *
 * @since  1.0
 */
class Joomla_Tests_WhiteSpace_MemberVarSpacingUnitTest extends AbstractSniffUnitTest
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
				5   => 1,
				8   => 1,
				23  => 1,
				28  => 1,
				42  => 1,
				45  => 1,
				51  => 1,
				54  => 1,
				69  => 1,
				74  => 1,
				88  => 1,
				91  => 1,
				97  => 1,
				100 => 1,
				115 => 1,
				120 => 1,
				134 => 1,
				137 => 1,
				149 => 1,
				152 => 1,
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
		return array();
	}
}

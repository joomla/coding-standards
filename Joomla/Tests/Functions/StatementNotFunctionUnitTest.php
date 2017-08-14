<?php
/**
 * Joomla! Coding Standard
 *
 * @package    Joomla.CodingStandard
 * @copyright  Copyright (C) 2015 Open Source Matters, Inc. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License Version 2 or Later
 */
namespace Joomla\Tests\Functions;

use PHP_CodeSniffer\Tests\Standards\AbstractSniffUnitTest;
/**
 * StatementNotFunctionUnitTest
 *
 * @since     1.0
 */
class StatementNotFunctionUnitTest extends AbstractSniffUnitTest
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
				5  => 1,
				6  => 1,
				7  => 1,
				8  => 1,
				9  => 1,
				10 => 1,
				13 => 1,
				15 => 1,
				17 => 1,
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

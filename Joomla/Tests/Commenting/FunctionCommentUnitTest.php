<?php
/**
 * Joomla! Coding Standard
 *
 * @package    Joomla.CodingStandard
 * @copyright  Copyright (C) 2015 Open Source Matters, Inc. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License Version 2 or Later
 */
namespace Joomla\Tests\Commenting;

use PHP_CodeSniffer\Tests\Standards\AbstractSniffUnitTest;
/**
 * FunctionCommentUnitTest
 *
 * @since     1.0
 */
class FunctionCommentUnitTest extends AbstractSniffUnitTest
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
				21  => 1,
				33  => 1,
				44  => 1,
				55  => 1,
				66  => 1,
				83  => 1,
				89  => 1,
				99  => 1,
				108 => 1,
				112 => 1,
				121 => 1,
				125 => 1,
				138 => 1,
				147 => 1,
				151 => 1,
				160 => 1,
				164 => 1,
				178 => 2,
				192 => 1,
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

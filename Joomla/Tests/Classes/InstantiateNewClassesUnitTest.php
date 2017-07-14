<?php
/**
 * Joomla! Coding Standard
 *
 * @package    Joomla.CodingStandard
 * @copyright  Copyright (C) 2015 Open Source Matters, Inc. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License Version 2 or Later
 */
namespace Joomla\Tests\Classes;

use PHP_CodeSniffer\Tests\Standards\AbstractSniffUnitTest;
/**
 * Ensures that new classes are instantiated without brackets if they do not have any parameters.
 *
 * @since     1.0
 */
class InstantiateNewClassesUnitTest extends AbstractSniffUnitTest
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
				16 => 1,
				17 => 1,
				18 => 1,
				24 => 1,
				25 => 1,
				27 => 1,
				28 => 1,
				30 => 1,
				31 => 1,
				33 => 1,
				34 => 1,
				36 => 1,
				37 => 1,
				39 => 1,
				40 => 1,
				42 => 1,
				43 => 1,
				45 => 1,
				46 => 1,
				48 => 1,
				49 => 1,
				51 => 1,
				52 => 1,
				54 => 1,
				55 => 1,
				57 => 1,
				58 => 1,
				60 => 1,
				61 => 1,
				63 => 1,
				64 => 1,
				66 => 1,
				67 => 1,
				69 => 1,
				70 => 1,
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

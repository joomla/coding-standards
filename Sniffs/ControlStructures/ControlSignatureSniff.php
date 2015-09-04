<?php
/**
 * Joomla! Coding Standard
 *
 * @copyright  Copyright (C) Open Source Matters, Inc. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License Version 2 or Later
 */

if (class_exists('PHP_CodeSniffer_Standards_AbstractPatternSniff', true) === false)
{
	throw new PHP_CodeSniffer_Exception('Class PHP_CodeSniffer_Standards_AbstractPatternSniff not found');
}

/**
 * Verifies that control statements conform to their coding standards.
 */
class Joomla_Sniffs_ControlStructures_ControlSignatureSniff extends PHP_CodeSniffer_Standards_AbstractPatternSniff
{
	/**
	 * If true, comments will be ignored if they are found in the code.
	 *
	 * @var  boolean
	 */
	public $ignoreComments = true;

	/**
	 * A list of tokenizers this sniff supports.
	 *
	 * @var  array
	 */
	public $supportedTokenizers = array(
		'PHP',
		'JS',
	);

	/**
	 * Returns the patterns that this test wishes to verify.
	 *
	 * @return  string[]
	 */
	protected function getPatterns()
	{
		return array(
			'if (...)EOL...{EOL',
			'}EOL...elseif (...)EOL...{EOL',
			'}EOL...elseEOL...{EOL',
			'tryEOL...{EOL...}EOL',
			'catch (...)EOL...{EOL',
			'doEOL...{...}EOL',
			'while (...)EOL...{EOL',
			'for (...)EOL...{EOL',
			'foreach (...)EOL...{EOL',
			'switch (...)EOL...{EOL',
		);
	}
}

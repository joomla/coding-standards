<?php
/**
 * Joomla_Sniffs_Functions_StatementNotFunctionSniff.
 *
 * @copyright  Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

/**
 * Joomla_Sniffs_Functions_StatementNotFunctionSniff.
 *
 * Checks that language statements do no use brackets.
 *
 * @since  1.1
 */
class Joomla_Sniffs_Functions_StatementNotFunctionSniff implements PHP_CodeSniffer_Sniff
{
	/**
	 * Returns an array of tokens this test wants to listen for.
	 *
	 * @return array
	 */
	public function register()
	{
		return array(
			T_INCLUDE_ONCE,
			T_REQUIRE_ONCE,
			T_REQUIRE,
			T_INCLUDE,
			T_CLONE,
			T_ECHO
		);
	}

	/**
	 * Processes this test, when one of its tokens is encountered.
	 *
	 * @param   PHP_CodeSniffer_File  $phpcsFile  The file being scanned.
	 * @param   int                   $stackPtr   The position of the current token in the
	 *                                            stack passed in $tokens.
	 *
	 * @return void
	 */
	public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
	{
		$tokens = $phpcsFile->getTokens();

		$nextToken = $phpcsFile->findNext(PHP_CodeSniffer_Tokens::$emptyTokens, ($stackPtr + 1), null, true);

		if ($tokens[$nextToken]['code'] === T_OPEN_PARENTHESIS)
		{
			$error = '"%s" is a statement not a function; no parentheses are required';
			$data  = array($tokens[$stackPtr]['content']);
			$phpcsFile->addError($error, $stackPtr, 'BracketsNotRequired', $data);
		}
	}
}

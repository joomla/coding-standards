<?php
/**
 * Joomla! Coding Standard
 *
 * @copyright  Copyright (C) Open Source Matters, Inc. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License Version 2 or Later
 */

/**
 * White space before a control structure.
 *
 * Checks that there is an empty line before a control structure to improve readability.
 * This only applies if the line before the structure contains code.
 * Comments or curly braces are considered valid.
 *
 * <b class="bad">Bad:</b>
 * $foo = $bar;
 * if(condition)
 * {
 *     // blah
 * }
 *
 * <b class="good">Good:</b>
 * $foo = $bar;
 *
 * if(condition)
 * {
 *     // blah
 * }
 *
 * This rule applies for the structures:
 * <b>if, for, foreach, while, switch, try and return</b>
 */
class Joomla_Sniffs_ControlStructures_WhiteSpaceBeforeSniff implements PHP_CodeSniffer_Sniff
{
	/**
	 * Registers the tokens that this sniff wants to listen for.
	 *
	 * @return  array
	 */
	public function register()
	{
		return array(
			T_IF,
			T_FOR,
			T_FOREACH,
			T_SWITCH,
			T_TRY,
			T_WHILE,
			T_DO,
			T_RETURN
		);
	}

	/**
	 * Processes this test, when one of its tokens is encountered.
	 *
	 * @param   PHP_CodeSniffer_File  $phpcsFile  The file being scanned.
	 * @param   integer               $stackPtr   The position of the current token in the stack passed in $tokens.
	 *
	 * @return  void
	 */
	public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
	{
		$tokens = $phpcsFile->getTokens();

		if (isset($tokens[$stackPtr]['scope_opener']) === false && $tokens[$stackPtr]['code'] != T_RETURN)
		{
			return;
		}

		$previousSemicolon = $phpcsFile->findPrevious(array(T_SEMICOLON), ($stackPtr - 1), null, false);

		if ($tokens[$stackPtr]['line'] - 1 == $tokens[$previousSemicolon]['line'])
		{
			$error = 'Please consider an empty line before the %s statement;';
			$data = array(
				$tokens[$stackPtr]['content']
			);

			$phpcsFile->addError($error, $stackPtr, 'SpaceBefore', $data);

			return;
		}
	}
}

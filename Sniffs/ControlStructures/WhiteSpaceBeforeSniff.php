<?php
/**
 * Joomla_Sniffs_ControlStructures_WhiteSpaceBeforeSniff.
 *
 * PHP version 5
 *
 * @package     PHP_CodeSniffer
 * @subpackage  PHP
 * @author      Nikolai Plath <der.el.kuku@gmail.com>
 * @copyright   2012 OSM
 * @license     http://matrix.squiz.net/developer/tools/php_cs/licence BSD Licence
 * @link        http://pear.php.net/package/PHP_CodeSniffer
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
 *
 * @version    Release: 1.3.0RC1
 * @category   PHP
 * @package    PHP_CodeSniffer
 * @author     Greg Sherwood <gsherwood@squiz.net>
 * @author     Marc McIntyre <mmcintyre@squiz.net>
 * @copyright  2006 Squiz Pty Ltd (ABN 77 084 670 600)
 * @license    http://matrix.squiz.net/developer/tools/php_cs/licence BSD Licence
 * @link       http://pear.php.net/package/PHP_CodeSniffer
 *
 * @since      1.0
 */
class Joomla_Sniffs_ControlStructures_WhiteSpaceBeforeSniff implements PHP_CodeSniffer_Sniff
{
	/**
	 * Registers the tokens that this sniff wants to listen for.
	 *
	 * @return array
	 */
	public function register()
	{
		return array(
			T_IF
		, T_FOR
		, T_FOREACH
		, T_SWITCH
		, T_TRY
		, T_WHILE
		, T_DO
		, T_RETURN
		);
	}

	/**
	 * Processes this test, when one of its tokens is encountered.
	 *
	 * @param   PHP_CodeSniffer_File  $phpcsFile  The file being scanned.
	 * @param   integer               $stackPtr   The position of the current token in the stack passed in $tokens.
	 *
	 * @return void
	 */
	public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
	{
		$tokens = $phpcsFile->getTokens();

		if (isset($tokens[$stackPtr]['scope_opener']) === false
			&& $tokens[$stackPtr]['code'] != T_RETURN)
		{
			return;
		}

		$previousSemicolon = $phpcsFile->findPrevious(array(T_SEMICOLON), ($stackPtr - 1), null, false);

		if ($tokens[$stackPtr]['line'] - 1 == $tokens[$previousSemicolon]['line'])
		{
			$error = sprintf('Please consider an empty line before the %s statement;',
				$tokens[$stackPtr]['content']
			);

			$phpcsFile->addError($error, $stackPtr, 'SpaceBefore');

			return;
		}
	}
}

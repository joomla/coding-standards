<?php
/**
 * Joomla_Sniffs_WhiteSpace_ControlStructureSpacingSniff.
 *
 * PHP version 5
 *
 * @package     PHP_CodeSniffer
 * @subpackage  PHP
 * @author      Greg Sherwood <gsherwood@squiz.net>
 * @author      Marc McIntyre <mmcintyre@squiz.net>
 * @copyright   2006 Squiz Pty Ltd (ABN 77 084 670 600)
 * @license     http://matrix.squiz.net/developer/tools/php_cs/licence BSD Licence
 * @link        http://pear.php.net/package/PHP_CodeSniffer
 */

/**
 * Checks for superfluous and missing space in control structures.
 *
 * Statements covered by this sniff are <b>catch</b>, <b>do</b>, <b>else</b>,
 * <b>elsif</b>, <b>for</b>, <b>foreach</b>, <b>if</b>, <b>switch</b>, <b>try</b> and <b>while</b>.
 *
 * @version    Release: 1.2.0
 * @category   PHP
 * @package    PHP_CodeSniffer
 * @author     Greg Sherwood <gsherwood@squiz.net>
 * @author     Marc McIntyre <mmcintyre@squiz.net>
 * @copyright  2006 Squiz Pty Ltd (ABN 77 084 670 600)
 * @license    http://matrix.squiz.net/developer/tools/php_cs/licence BSD Licence
 * @link       http://pear.php.net/package/PHP_CodeSniffer
 * @since      12.3
 */
class Joomla_Sniffs_WhiteSpace_ControlStructureSpacingSniff implements PHP_CodeSniffer_Sniff
{
	/**
	 * A list of tokenizers this sniff supports.
	 *
	 * @var array
	 */
	public $supportedTokenizers = array('PHP', 'JS',);

	/**
	 * Returns an array of tokens this test wants to listen for.
	 *
	 * @return array
	 */
	public function register()
	{
		return array(
			T_IF
		, T_ELSE
		, T_ELSEIF
		, T_WHILE
		, T_FOREACH
		, T_FOR
		, T_SWITCH
		, T_DO
		, T_TRY
		, T_FUNCTION
		, T_CLASS
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

		if (isset($tokens[$stackPtr]['scope_closer']) === false)
		{
			return;
		}

		$scopeCloser = $tokens[$stackPtr]['scope_closer'];
		$scopeOpener = $tokens[$stackPtr]['scope_opener'];

		$firstContent = $phpcsFile->findNext(T_WHITESPACE, ($scopeOpener + 1), null, true);

		if ($tokens[$firstContent]['line'] !== ($tokens[$scopeOpener]['line'] + 1))
		{
			$error = 'Blank line found at start of control structure';
			$phpcsFile->addError($error, $scopeOpener);
		}

		$lastContent = $phpcsFile->findPrevious(T_WHITESPACE, ($scopeCloser - 1), null, true);

		if ($tokens[$lastContent]['line'] !== ($tokens[$scopeCloser]['line'] - 1))
		{
			$errorToken = $scopeCloser;

			for ($i = ($scopeCloser - 1); $i > $lastContent; $i--)
			{
				if ($tokens[$i]['line'] < $tokens[$scopeCloser]['line'])
				{
					$errorToken = $i;
					break;
				}
			}

			$error = 'Blank line found at end of control structure';
			$phpcsFile->addError($error, $errorToken);
		}

		$trailingContent = $phpcsFile->findNext(T_WHITESPACE, ($scopeCloser + 1), null, true);

		if ($tokens[$trailingContent]['code'] === T_ELSE)
		{
			if ($tokens[$stackPtr]['code'] === T_IF)
			{
				// IF with ELSE.
				return;
			}
		}

		if ($tokens[$trailingContent]['code'] === T_COMMENT)
		{
			if ($tokens[$trailingContent]['line'] === $tokens[$scopeCloser]['line'])
			{
				if (substr($tokens[$trailingContent]['content'], 0, 5) === '//end')
				{
					// There is an end comment, so we have to get the next piece
					// of content.
					$trailingContent = $phpcsFile->findNext(T_WHITESPACE, ($trailingContent + 1), null, true);
				}
			}
		}

		if ($tokens[$trailingContent]['code'] === T_BREAK)
		{
			// If this BREAK is closing a CASE, we don't need the
			// blank line after this control structure.
			if (isset($tokens[$trailingContent]['scope_condition']) === true)
			{
				$condition = $tokens[$trailingContent]['scope_condition'];

				if ($tokens[$condition]['code'] === T_CASE || $tokens[$condition]['code'] === T_DEFAULT)
				{
					return;
				}
			}
		}

		if ($tokens[$trailingContent]['code'] === T_CLOSE_TAG)
		{
			// At the end of the script or embedded code.
			return;
		}

		if ($tokens[$trailingContent]['code'] === T_CLOSE_CURLY_BRACKET)
		{
			// Another control structure's closing brace.
			if (isset($tokens[$trailingContent]['scope_condition']) === true)
			{
				$owner = $tokens[$trailingContent]['scope_condition'];

				if ($tokens[$owner]['code'] === T_FUNCTION)
				{
					// The next content is the closing brace of a function
					// so normal function rules apply and we can ignore it.
					return;
				}
			}

			if ($tokens[$trailingContent]['line'] !== ($tokens[$scopeCloser]['line'] + 1))
			{
				$error = 'Blank line found after control structure';
				$phpcsFile->addError($error, $scopeCloser);
			}
		}
		else
		{
			if ($tokens[$trailingContent]['line'] === ($tokens[$scopeCloser]['line'] + 1))
			{
				// T_ELSE
				if ($tokens[$trailingContent]['code'] != T_ELSEIF
					&& $tokens[$trailingContent]['code'] != T_ELSE
					&& $tokens[$trailingContent]['code'] != T_CATCH
					&& $tokens[$trailingContent]['code'] != T_COMMENT)
				{
					$error = 'No blank line found after control structure' . $tokens[$trailingContent]['line']
						. ' - ' . $tokens[$trailingContent]['code'];
					$phpcsFile->addError($error, $scopeCloser);
				}
			}
		}
	}
}

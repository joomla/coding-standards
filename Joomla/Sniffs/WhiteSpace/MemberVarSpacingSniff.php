<?php
/**
 * Joomla! Coding Standard
 *
 * @package    Joomla.CodingStandard
 * @copyright  Copyright (C) 2015 Open Source Matters, Inc. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License Version 2 or Later
 */
namespace Joomla\Sniffs\WhiteSpace;

use PHP_CodeSniffer\Sniffs\Sniff;
use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Util\Tokens;
use PHP_CodeSniffer\Standards\Squiz\Sniffs\WhiteSpace\MemberVarSpacingSniff as SquizMemberVarSpacingSniff;
/**
 * Verifies that class members are spaced correctly.
 *
 * @since     1.0
 */
class MemberVarSpacingSniff extends SquizMemberVarSpacingSniff
{
	/**
	 * Processes the function tokens within the class.
	 *
	 * @param   PHP_CodeSniffer\Files\File  $phpcsFile  The file where this token was found.
	 * @param   int                         $stackPtr   The position where the token was found.
	 *
	 * @return  void
	 */
	protected function processMemberVar(File $phpcsFile, $stackPtr)
	{
		$tokens   = $phpcsFile->getTokens();
		$ignore   = Tokens::$methodPrefixes;
		$ignore[] = T_VAR;
		$ignore[] = T_WHITESPACE;
		$start    = $stackPtr;
		$prev     = $phpcsFile->findPrevious($ignore, ($stackPtr - 1), null, true);

		if (isset(Tokens::$commentTokens[$tokens[$prev]['code']]) === true)
		{
			// Assume the comment belongs to the member var if it is on a line by itself.
			$prevContent = $phpcsFile->findPrevious(Tokens::$emptyTokens, ($prev - 1), null, true);

			if ($tokens[$prevContent]['line'] !== $tokens[$prev]['line'])
			{
				// Check the spacing, but then skip it.
				$foundLines = ($tokens[$stackPtr]['line'] - $tokens[$prev]['line'] - 1);

				if ($foundLines > 0)
				{
					$error = 'Expected 0 blank lines after member var comment; %s found';
					$data  = array($foundLines);
					$fix   = $phpcsFile->addFixableError($error, $prev, 'AfterComment', $data);

					if ($fix === true)
					{
						$phpcsFile->fixer->beginChangeset();

						// Inline comments have the newline included in the content but docblock do not.
						if ($tokens[$prev]['code'] === T_COMMENT)
						{
							$phpcsFile->fixer->replaceToken($prev, rtrim($tokens[$prev]['content']));
						}

						for ($i = ($prev + 1); $i <= $stackPtr; $i++)
						{
							if ($tokens[$i]['line'] === $tokens[$stackPtr]['line'])
							{
								break;
							}

							$phpcsFile->fixer->replaceToken($i, '');
						}

						$phpcsFile->fixer->addNewline($prev);
						$phpcsFile->fixer->endChangeset();
					}
				}

				$start = $prev;
			}
		}

		// There needs to be 1 blank line before the var, not counting comments.
		if ($start === $stackPtr)
		{
			// No comment found.
			$first = $phpcsFile->findFirstOnLine(Tokens::$emptyTokens, $start, true);

			if ($first === false)
			{
				$first = $start;
			}
		}
		elseif ($tokens[$start]['code'] === T_DOC_COMMENT_CLOSE_TAG)
		{
			$first = $tokens[$start]['comment_opener'];
		}
		else
		{
			$first = $phpcsFile->findPrevious(Tokens::$emptyTokens, ($start - 1), null, true);
			$first = $phpcsFile->findNext(Tokens::$commentTokens, ($first + 1));
		}

		$prev       = $phpcsFile->findPrevious(Tokens::$emptyTokens, ($first - 1), null, true);
		$foundLines = ($tokens[$first]['line'] - $tokens[$prev]['line'] - 1);

		// No blank lines after class opener.
		if ($foundLines > 0 && $tokens[$prev]['code'] === T_OPEN_CURLY_BRACKET)
		{
			$error = 'Expected 0 blank lines before first member var; %s found';
			$data  = array($foundLines);
			$fix   = $phpcsFile->addFixableError($error, $stackPtr, 'FirstMember', $data);

			if ($fix === true)
			{
				$phpcsFile->fixer->beginChangeset();

				for ($i = ($prev + 1); $i < $first; $i++)
				{
					if ($tokens[$i]['line'] === $tokens[$prev]['line'])
					{
						continue;
					}

					if ($tokens[$i]['line'] === $tokens[$first]['line'])
					{
						break;
					}

					$phpcsFile->fixer->replaceToken($i, '');
				}

				$phpcsFile->fixer->endChangeset();
			}
		}

		if ($foundLines === 1
			|| $tokens[$prev]['code'] === T_OPEN_CURLY_BRACKET
		)
		{
			return;
		}

		$error = 'Expected 1 blank line before member var; %s found';
		$data  = array($foundLines);
		$fix   = $phpcsFile->addFixableError($error, $stackPtr, 'Incorrect', $data);

		if ($fix === true)
		{
			$phpcsFile->fixer->beginChangeset();

			for ($i = ($prev + 1); $i < $first; $i++)
			{
				if ($tokens[$i]['line'] === $tokens[$prev]['line'])
				{
					continue;
				}

				if ($tokens[$i]['line'] === $tokens[$first]['line'])
				{
					$phpcsFile->fixer->addNewlineBefore($i);
					break;
				}

				$phpcsFile->fixer->replaceToken($i, '');
			}

			$phpcsFile->fixer->endChangeset();
		}
	}
}

<?php

class Joomla_Sniffs_Commenting_SingleCommentSniff implements PHP_CodeSniffer_Sniff
{
	/**
	* Returns an array of tokens this test wants to listen for.
	*
	* @return array
	*/
	public function register()
	{
	return array(T_COMMENT);

	}//end register()

	/**
	 * Processes this test, when one of its tokens is encountered.
	 *
	 * @param PHP_CodeSniffer_File $phpcsFile The file being scanned.
	 * @param int                  $stackPtr  The position of the current token
	 *                                        in the stack passed in $tokens.
	 *
	 * @return int
	 */
	public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
	{
		$tokens = $phpcsFile->getTokens();
		$comment = trim($tokens[$stackPtr]['content']);

		/*
		 * Hash comments are not allowed.
		*/
		if ($tokens[$stackPtr]['content']{0} === '#') {
			$phpcsFile->recordMetric($stackPtr, 'Inline comment style', '# ...');
			$error  = 'Perl-style Hash comments are prohibited. Use "// Comment."';
			$error .= ' or "/* comment */" instead.';
			$fix    = $phpcsFile->addFixableError($error, $stackPtr, 'WrongStyle');
			if ($fix === true) {
				$newComment = ltrim($tokens[$stackPtr]['content'], '# ');
				$newComment = '// '.$newComment;
				$phpcsFile->fixer->replaceToken($stackPtr, $newComment);
			}
		} elseif ($tokens[$stackPtr]['content']{0} === '/'
			&& $tokens[$stackPtr]['content']{1} === '/'
			) {
			$phpcsFile->recordMetric($stackPtr, 'Inline comment style', '// ...');
		} elseif ($tokens[$stackPtr]['content']{0} === '/'
			&& $tokens[$stackPtr]['content']{1} === '*'
			) {
			$phpcsFile->recordMetric($stackPtr, 'Inline comment style', '/* ... */');
		}

		/*
		 * Always have a space between // and the start of comment text.
		* The exception to this is if the preceding line consists of a single open bracket.
		*/
		if (isset($tokens[$stackPtr]['content']{2}) && $tokens[$stackPtr]['content']{2} != ' ')
		{
			$phpcsFile->addError('Please put a space between the // and the start of comment text; found "%s"'
					, $stackPtr, 'NoSpace', array($comment));

			return;
		}

		/*
		 * New lines should always start with an upper case letter unless
		*    The line is a continuation of a complete sentence
		*    The term is code and is case sensitive.(@todo)
		*/
		if (isset($tokens[$stackPtr]['content']{3}) && isset($comment{3}) && $tokens[$stackPtr]['content']{3} != strtoupper($comment{3}))
		{
			// Comment does not start with an upper case letter
			$previous = $phpcsFile->findPrevious(T_COMMENT, $stackPtr - 1);

			if ($tokens[$previous]['line'] == $tokens[$stackPtr]['line'] - 1)
			{
				// There is a comment on the previous line.
				$test = trim($tokens[$previous]['content']);

				if ('.' != substr($test, strlen($test) - 1))
				{
					// If the previous comment does not end with a full stop "." we
					// assume a sentence spanned over multiple lines.
					return;
				}
			}

			$phpcsFile->addError('Please start your comment with a capital letter; found "%s"'
					, $stackPtr, 'LowerCase', array($comment));

			return;
		}

		/*
		 * Comments should not be on the same line as the code to which they refer
	 	 * (which puts them after the code they reference).
	 	 * They should be on their own lines.
		 */
		$previous = $phpcsFile->findPrevious(T_SEMICOLON, $stackPtr);

		if (isset($tokens[$previous]['line']) && $tokens[$previous]['line'] == $tokens[$stackPtr]['line'])
		{
			$phpcsFile->addError('Please put your comment on a separate line *preceding* your code; found "%s"'
					, $stackPtr, 'Inline', array($comment));

			return;
		}

		/*
		 * Always have a single blank line before a comment or block of comments.
		 * -- Don't allow preceding "code" - identified by a semicolon ;)
		 */
		if (isset($tokens[$previous]['line']) && $tokens[$previous]['line'] == $tokens[$stackPtr]['line'] - 1)
		{
			$phpcsFile->addError('Please consider a blank line preceding your comment'
					, $stackPtr, 'TooClose');

			return;
		}

		/*
		 * Comment blocks that introduce large sections of code and are more than 3 lines long
		 * should use /* * /  and should use * on each line with the same space/tab rules as doc blocks.
		 * If you need a large introduction consider whether this block should be separated into a
		 * method to reduce complexity and therefore providing a full docblock.
		 */
		$next = $phpcsFile->findNext(T_COMMENT, $stackPtr + 1);

		if (isset($tokens[$next]['line']) && $tokens[$next]['line'] == $tokens[$stackPtr]['line'] + 1)
		{
			// The following line contains also a comment
			$nextNext = $phpcsFile->findNext(T_COMMENT, $next + 1);

			if ($tokens[$nextNext]['line'] == $tokens[$next]['line'] + 1)
			{
				// Found 3 lines of // comments - too much.
				$phpcsFile->addError('Please consider the /* */ style for comments that span over multiple lines.'
						, $stackPtr, 'MultiLine');

				return;
			}
		}

	}//function

}//class

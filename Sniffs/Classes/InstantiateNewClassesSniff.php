<?php
/**
 * Joomla! Coding Standard
 *
 * @copyright  Copyright (C) Open Source Matters, Inc. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License Version 2 or Later
 */

/**
 * Ensures that new classes are instantiated without brackets if they do not have any parameters.
 */
class Joomla_Sniffs_Classes_InstantiateNewClassesSniff implements PHP_CodeSniffer_Sniff
{
	/**
	 * Registers the token types that this sniff wishes to listen to.
	 *
	 * @return  array
	 */
	public function register()
	{
		return array(T_NEW);
	}

	/**
	 * Process the tokens that this sniff is listening for.
	 *
	 * @param   PHP_CodeSniffer_File  $phpcsFile  The file where the token was found.
	 * @param   integer               $stackPtr   The position in the stack where the token was found.
	 *
	 * @return  void
	 */
	public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
	{
		$tokens = $phpcsFile->getTokens();

		$running = true;
		$valid   = false;
		$started = false;

		$cnt = $stackPtr + 1;

		do
		{
			if (!isset($tokens[$cnt]))
			{
				$running = false;
			}
			else
			{
				switch ($tokens[$cnt]['code'])
				{
					case T_SEMICOLON:
					case T_COMMA :
						$valid   = true;
						$running = false;
						break;

					case T_OPEN_PARENTHESIS :
						$started = true;
						break;

					case T_VARIABLE :
					case T_STRING :
					case T_LNUMBER :
					case T_CONSTANT_ENCAPSED_STRING :
					case T_DOUBLE_QUOTED_STRING :
						if ($started)
						{
							$valid   = true;
							$running = false;
						}

						break;

					case T_CLOSE_PARENTHESIS :
						if (!$started)
						{
							$valid = true;
						}

						$running = false;
						break;

					case T_WHITESPACE :
						break;
				}

				$cnt++;
			}
		}
		while ($running == true);

		if (!$valid)
		{
			$error = 'Instanciating new classes without parameters does not require brackets.';
			$phpcsFile->addError($error, $stackPtr, 'New class');
		}
	}
}

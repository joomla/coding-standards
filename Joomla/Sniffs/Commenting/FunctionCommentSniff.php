<?php
/**
 * Joomla! Coding Standard
 *
 * @package    Joomla.CodingStandard
 * @copyright  Copyright (C) 2015 Open Source Matters, Inc. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License Version 2 or Later
 */

if (class_exists('PEAR_Sniffs_Commenting_FunctionCommentSniff', true) === false)
{
	throw new PHP_CodeSniffer_Exception('Class PEAR_Sniffs_Commenting_FunctionCommentSniff not found');
}

/**
 * Extended ruleset for parsing and verifying the doc comments for functions.
 *
 * @since     1.0
 */
class Joomla_Sniffs_Commenting_FunctionCommentSniff extends PEAR_Sniffs_Commenting_FunctionCommentSniff
{
	/**
	 * Process the return comment of this function comment.
	 *
	 * Extends PEAR.Commenting.FunctionComment.processReturn to exclude @return tag requirements for constructors and destructors and
	 * to enforce alignment of the doc blocks.
	 *
	 * @param   PHP_CodeSniffer_File  $phpcsFile     The file being scanned.
	 * @param   integer               $stackPtr      The position of the current token in the stack passed in $tokens.
	 * @param   integer               $commentStart  The position in the stack where the comment started.
	 *
	 * @return  void
	 *
	 * @todo    Reinstate the check on the alignment of the tag
	 */
	protected function processReturn(PHP_CodeSniffer_File $phpcsFile, $stackPtr, $commentStart)
	{
		$tokens = $phpcsFile->getTokens();

		$methodName      = $phpcsFile->getDeclarationName($stackPtr);
		$isSpecialMethod = ($methodName === '__construct' || $methodName === '__destruct');

		$return = null;

		foreach ($tokens[$commentStart]['comment_tags'] as $tag)
		{
			if ($tokens[$tag]['content'] === '@return')
			{
				// Joomla Standard - Constructors and destructors should not have a @return tag
				if ($isSpecialMethod)
				{
					$error = 'Constructor and destructor comments must not have a @return tag';
					$phpcsFile->addError($error, $tag, 'UselessReturn');

					return;
				}
				elseif ($return !== null)
				{
					$error = 'Only 1 @return tag is allowed in a function comment';
					$phpcsFile->addError($error, $tag, 'DuplicateReturn');

					return;
				}

				$return = $tag;
			}
		}

		if ($isSpecialMethod === true)
		{
			return;
		}

		if ($return !== null)
		{
			$content = $tokens[($return + 2)]['content'];

			if (empty($content) === true || $tokens[($return + 2)]['code'] !== T_DOC_COMMENT_STRING)
			{
				$error = 'Return type missing for @return tag in function comment';
				$phpcsFile->addError($error, $return, 'MissingReturnType');
			}
			else
			{
				// Support both a return type and a description.
				preg_match('`^((?:\|?(?:array\([^\)]*\)|[\\\\a-z0-9\[\]]+))*)( .*)?`i', $content, $returnParts);

				if (isset($returnParts[1]) === false)
				{
					return;
				}

				$returnType = $returnParts[1];

				// Check return type (can have multiple return types separated by '|').
				$typeNames      = explode('|', $returnType);
				$suggestedNames = array();

				foreach ($typeNames as $i => $typeName)
				{
					$suggestedName = PHP_CodeSniffer::suggestType($typeName);

					if (in_array($suggestedName, $suggestedNames) === false)
					{
						$suggestedNames[] = $suggestedName;
					}
				}

				$suggestedType = implode('|', $suggestedNames);

				if ($returnType !== $suggestedType)
				{
					$error = 'Expected "%s" but found "%s" for function return type';
					$data  = array(
						$suggestedType,
						$returnType
					);

					$fix = $phpcsFile->addFixableError($error, $return, 'InvalidReturn', $data);

					if ($fix === true)
					{
						$replacement = $suggestedType;

						if (empty($returnParts[2]) === false)
						{
							$replacement .= $returnParts[2];
						}

						$phpcsFile->fixer->replaceToken(($return + 2), $replacement);
						unset($replacement);
					}
				}

				/*
				 * If return type is not void, there needs to be a return statement
				 * somewhere in the function that returns something.
				 * Skip this check for mixed return types.
				 */
				if ($returnType === 'void')
				{
					if (isset($tokens[$stackPtr]['scope_closer']) === true)
					{
						$endToken = $tokens[$stackPtr]['scope_closer'];

						for ($returnToken = $stackPtr; $returnToken < $endToken; $returnToken++)
						{
							if ($tokens[$returnToken]['code'] === T_CLOSURE
								|| $tokens[$returnToken]['code'] === T_ANON_CLASS
							)
							{
								$returnToken = $tokens[$returnToken]['scope_closer'];
								continue;
							}

							if ($tokens[$returnToken]['code'] === T_RETURN
								|| $tokens[$returnToken]['code'] === T_YIELD
								|| $tokens[$returnToken]['code'] === T_YIELD_FROM
							)
							{
								break;
							}
						}

						if ($returnToken !== $endToken)
						{
							// If the function is not returning anything, just exiting, then there is no problem.
							$semicolon = $phpcsFile->findNext(T_WHITESPACE, ($returnToken + 1), null, true);

							if ($tokens[$semicolon]['code'] !== T_SEMICOLON)
							{
								$error = 'Function return type is void, but function contains return statement';
								$phpcsFile->addError($error, $return, 'InvalidReturnVoid');
							}
						}
					}//end if
				}
				elseif ($returnType !== 'mixed' && in_array('void', $typeNames, true) === false)
				{
					// If return type is not void, there needs to be a return statement somewhere in the function that returns something.
					if (isset($tokens[$stackPtr]['scope_closer']) === true)
					{
						$endToken = $tokens[$stackPtr]['scope_closer'];

						for ($returnToken = $stackPtr; $returnToken < $endToken; $returnToken++)
						{
							if ($tokens[$returnToken]['code'] === T_CLOSURE
								|| $tokens[$returnToken]['code'] === T_ANON_CLASS
							)
							{
								$returnToken = $tokens[$returnToken]['scope_closer'];
								continue;
							}

							if ($tokens[$returnToken]['code'] === T_RETURN
								|| $tokens[$returnToken]['code'] === T_YIELD
								|| $tokens[$returnToken]['code'] === T_YIELD_FROM
							)
							{
								break;
							}
						}

						if ($returnToken === $endToken)
						{
							$error = 'Function return type is not void, but function has no return statement';
							$phpcsFile->addError($error, $return, 'InvalidNoReturn');
						}
						else
						{
							$semicolon = $phpcsFile->findNext(T_WHITESPACE, ($returnToken + 1), null, true);

							if ($tokens[$semicolon]['code'] === T_SEMICOLON)
							{
								$error = 'Function return type is not void, but function is returning void here';
								$phpcsFile->addError($error, $returnToken, 'InvalidReturnNotVoid');
							}
						}
					}
				}
			}
		}
		else
		{
			$error = 'Missing @return tag in function comment';
			$phpcsFile->addError($error, $tokens[$commentStart]['comment_closer'], 'MissingReturn');
		}
	}

	/**
	 * Process the function parameter comments.
	 *
	 * Extends PEAR.Commenting.FunctionComment.processReturn to enforce correct alignment of the doc block.
	 *
	 * @param   PHP_CodeSniffer_File $phpcsFile     The file being scanned.
	 * @param   integer              $stackPtr      The position of the current token in the stack passed in $tokens.
	 * @param   integer              $commentStart  The position in the stack where the comment started.
	 *
	 * @return  void
	 *
	 * @todo    Reinstate the check that params come after the function's comment and has a blank line before them
	 * @todo    Reinstate the check that there is a blank line after all params are declared
	 */
	protected function processParams(PHP_CodeSniffer_File $phpcsFile, $stackPtr, $commentStart)
	{
		$tokens = $phpcsFile->getTokens();

		$params  = array();
		$maxType = 0;
		$maxVar  = 0;

		foreach ($tokens[$commentStart]['comment_tags'] as $pos => $tag)
		{
			if ($tokens[$tag]['content'] !== '@param')
			{
				continue;
			}

			$type      = '';
			$typeSpace = 0;
			$var       = '';
			$varSpace  = 0;
			$comment   = '';
			$commentEnd = 0;

			if ($tokens[($tag + 2)]['code'] === T_DOC_COMMENT_STRING)
			{
				$matches = array();
				preg_match('/([^$&.]+)(?:((?:\.\.\.)?(?:\$|&)[^\s]+)(?:(\s+)(.*))?)?/', $tokens[($tag + 2)]['content'], $matches);

				if (empty($matches) === false)
				{
					$typeLen   = strlen($matches[1]);
					$type      = trim($matches[1]);
					$typeSpace = ($typeLen - strlen($type));
					$typeLen   = strlen($type);

					if ($typeLen > $maxType)
					{
						$maxType = $typeLen;
					}
				}

				if (isset($matches[2]) === true)
				{
					$var    = $matches[2];
					$varLen = strlen($var);

					if ($varLen > $maxVar)
					{
						$maxVar = $varLen;
					}

					if (isset($matches[4]) === true)
					{
						$varSpace = strlen($matches[3]);
						$comment  = $matches[4];

						// Any strings until the next tag belong to this comment.
						if (isset($tokens[$commentStart]['comment_tags'][($pos + 1)]) === true)
						{
							$end = $tokens[$commentStart]['comment_tags'][($pos + 1)];
						}
						else
						{
							$end = $tokens[$commentStart]['comment_closer'];
						}

						for ($i = ($tag + 3); $i < $end; $i++)
						{
							if ($tokens[$i]['code'] === T_DOC_COMMENT_STRING)
							{
								$comment   .= ' ' . $tokens[$i]['content'];
								$commentEnd = $i;
							}
						}
					}
					else
					{
						$error = 'Missing parameter comment';
						$phpcsFile->addError($error, $tag, 'MissingParamComment');
					}
				}
				else
				{
					$error = 'Missing parameter name';
					$phpcsFile->addError($error, $tag, 'MissingParamName');
				}
			}
			else
			{
				$error = 'Missing parameter type';
				$phpcsFile->addError($error, $tag, 'MissingParamType');
			}

			$params[] = array(
				'tag'         => $tag,
				'type'        => $type,
				'var'         => $var,
				'comment'     => $comment,
				'comment_end' => $commentEnd,
				'type_space'  => $typeSpace,
				'var_space'   => $varSpace,
				'align_space' => $tokens[($tag + 1)]['content']
			);
		}

		$realParams    = $phpcsFile->getMethodParameters($stackPtr);
		$foundParams   = array();
		$previousParam = null;

		/*
		 * We want to use ... for all variable length arguments,
		 * so added this prefix to the variable name so comparisons are easier.
		 */
		foreach ($realParams as $pos => $param)
		{
			if ($param['variable_length'] === true)
			{
				$realParams[$pos]['name'] = '...' . $realParams[$pos]['name'];
			}
		}

		foreach ($params as $pos => $param)
		{
			if ($param['var'] === '')
			{
				continue;
			}

			$foundParams[] = $param['var'];

			// Joomla change: There must be 3 spaces after the @param tag to make it line up with the @return tag
			if ($param['align_space'] !== '   ')
			{
				$error  = 'Expected 3 spaces before variable type, found %s';
				$spaces = strlen($param['align_space']);
				$data   = array($spaces);
				$fix    = $phpcsFile->addFixableError($error, $param['tag'], 'BeforeParamType', $data);

				if ($fix === true)
				{
					$phpcsFile->fixer->beginChangeset();

					for ($i = 0; $i < $spaces; $i++)
					{
						$phpcsFile->fixer->replaceToken(($param['tag'] + 1), '');
					}

					$phpcsFile->fixer->addContent($param['tag'], '   ');
					$phpcsFile->fixer->endChangeset();
				}
			}

			// Make sure the param name is correct.
			if (isset($realParams[$pos]) === true)
			{
				$realName = $realParams[$pos]['name'];

				if ($realName !== $param['var'])
				{
					$code = 'ParamNameNoMatch';
					$data = array(
						$param['var'],
						$realName
					);

					$error = 'Doc comment for parameter %s does not match ';

					if (strtolower($param['var']) === strtolower($realName))
					{
						$error .= 'case of ';
						$code = 'ParamNameNoCaseMatch';
					}

					$error .= 'actual variable name %s';

					$phpcsFile->addError($error, $param['tag'], $code, $data);
				}
			}
			elseif (substr($param['var'], -4) !== ',...')
			{
				// We must have an extra parameter comment.
				$error = 'Superfluous parameter comment';
				$phpcsFile->addError($error, $param['tag'], 'ExtraParamComment');
			}

			if ($param['comment'] === '')
			{
				continue;
			}

			// Joomla change: Enforces alignment of the param variables and comments
			if ($previousParam !== null)
			{
				$previousName = ($previousParam['var'] !== '') ? $previousParam['var'] : 'UNKNOWN';

				// Check to see if the parameters align properly.
				if (!$this->paramVarsAlign($param, $previousParam))
				{
					$error = 'The variable names for parameters %s and %s do not align';
					$data  = array(
						$previousName,
						$param['var']
					);
					$phpcsFile->addError($error, $param['tag'], 'ParameterNamesNotAligned', $data);
				}

				// Check to see if the comments align properly.
				if (!$this->paramCommentsAlign($param, $previousParam))
				{
					$error = 'The comments for parameters %s and %s do not align';
					$data  = array(
						$previousName,
						$param['var']
					);
					$phpcsFile->addError($error, $param['tag'], 'ParameterCommentsNotAligned', $data);
				}
			}

			$previousParam = $param;
		}

		$realNames = array();

		foreach ($realParams as $realParam)
		{
			$realNames[] = $realParam['name'];
		}

		// Report missing comments.
		$diff = array_diff($realNames, $foundParams);

		foreach ($diff as $neededParam)
		{
			$error = 'Doc comment for parameter "%s" missing';
			$data  = array($neededParam);
			$phpcsFile->addError($error, $commentStart, 'MissingParamTag', $data);
		}

	}

	/**
	 * Ensure the method's parameter comments align
	 *
	 * @param   array  $param          The current parameter being checked
	 * @param   array  $previousParam  The previous parameter that was checked
	 *
	 * @return  boolean
	 */
	private function paramCommentsAlign($param, $previousParam)
	{
		$paramLength = strlen($param['type']) + $param['type_space'] + strlen($param['var']) + $param['var_space'];
		$prevLength  = strlen($previousParam['type']) + $previousParam['type_space'] + strlen($previousParam['var']) + $previousParam['var_space'];

		return $paramLength === $prevLength;
	}

	/**
	 * Ensure the method's parameter variable names align
	 *
	 * @param   array  $param          The current parameter being checked
	 * @param   array  $previousParam  The previous parameter that was checked
	 *
	 * @return  boolean
	 */
	private function paramVarsAlign($param, $previousParam)
	{
		$paramStringLength         = strlen($param['type']) + $param['type_space'];
		$previousParamStringLength = strlen($previousParam['type']) + $previousParam['type_space'];

		return $paramStringLength === $previousParamStringLength;
	}
}

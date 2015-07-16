<?php
/**
 * Parses and verifies the doc comments for functions.
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Greg Sherwood <gsherwood@squiz.net>
 * @author    Marc McIntyre <mmcintyre@squiz.net>
 * @copyright 2006 Squiz Pty Ltd (ABN 77 084 670 600)
 * @license   http://matrix.squiz.net/developer/tools/php_cs/licence BSD Licence
 * @version   CVS: $Id: FunctionCommentSniff.php 301632 2010-07-28 01:57:56Z squiz $
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */

if (class_exists('PEAR_Sniffs_Commenting_FunctionCommentSniff', true) === false) {
    throw new PHP_CodeSniffer_Exception('Class PEAR_Sniffs_Commenting_FunctionCommentSniff not found');
}

/**
 * Parses and verifies the doc comments for functions.
 *
 * Verifies that :
 * <ul>
 *  <li>A comment exists</li>
 *  <li>There is a blank newline after the short description.</li>
 *  <li>There is a blank newline between the long and short description.</li>
 *  <li>There is a blank newline between the long description and tags.</li>
 *  <li>Parameter names represent those in the method.</li>
 *  <li>Parameter comments are in the correct order</li>
 *  <li>Parameter comments are complete</li>
 *  <li>A space is present before the first and after the last parameter</li>
 *  <li>A return type exists</li>
 *  <li>There must be one blank line between body and headline comments.</li>
 *  <li>Any throw tag must have an exception class.</li>
 * </ul>
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Greg Sherwood <gsherwood@squiz.net>
 * @author    Marc McIntyre <mmcintyre@squiz.net>
 * @copyright 2006 Squiz Pty Ltd (ABN 77 084 670 600)
 * @license   http://matrix.squiz.net/developer/tools/php_cs/licence BSD Licence
 * @version   Release: 1.3.0RC2
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */
class Joomla_Sniffs_Commenting_FunctionCommentSniff extends PEAR_Sniffs_Commenting_FunctionCommentSniff
{


    /**
     * Process the return comment of this function comment.
     *
     * @param PHP_CodeSniffer_File $phpcsFile    The file being scanned.
     * @param int                  $stackPtr     The position of the current token
     *                                           in the stack passed in $tokens.
     * @param int                  $commentStart The position in the stack where the comment started.
     *
     * @return void
     */
    protected function processReturn(PHP_CodeSniffer_File $phpcsFile, $stackPtr, $commentStart)
    {
        $tokens = $phpcsFile->getTokens();

        $methodName      = $phpcsFile->getDeclarationName($stackPtr);
        $isSpecialMethod = ($methodName === '__construct' || $methodName === '__destruct');

        $return = null;
        foreach ($tokens[$commentStart]['comment_tags'] as $tag) {
            if ($tokens[$tag]['content'] === '@return') {
                // Joomla Standard - Constructors and destructors should not have a @return tag
                if ($isSpecialMethod) {
                    $error    = 'Constructor and destructor comments must not have a @return tag';
                    $phpcsFile->addError($error, $tag, 'UselessReturn');
                    return;
                }
                else if ($return !== null) {
                    $error = 'Only 1 @return tag is allowed in a function comment';
                    $phpcsFile->addError($error, $tag, 'DuplicateReturn');
                    return;
                }

                $return = $tag;
            }
        }

        if ($isSpecialMethod === true) {
            return;
        }

        if ($return !== null) {
            $content = $tokens[($return + 2)]['content'];
            if (empty($content) === true || $tokens[($return + 2)]['code'] !== T_DOC_COMMENT_STRING) {
                $error = 'Return type missing for @return tag in function comment';
                $phpcsFile->addError($error, $return, 'MissingReturnType');
            } else {
                // Check return type (can be multiple, separated by '|').
                $typeNames      = explode('|', $content);
                $suggestedNames = array();
                foreach ($typeNames as $i => $typeName) {
                    $suggestedName = PHP_CodeSniffer::suggestType($typeName);
                    if (in_array($suggestedName, $suggestedNames) === false) {
                        $suggestedNames[] = $suggestedName;
                    }
                }

                $suggestedType = implode('|', $suggestedNames);
                if ($content !== $suggestedType) {
                    $error = 'Expected "%s" but found "%s" for function return type';
                    $data  = array(
                              $suggestedType,
                              $content,
                             );
                    $fix   = $phpcsFile->addFixableError($error, $return, 'InvalidReturn', $data);
                    if ($fix === true) {
                        $phpcsFile->fixer->replaceToken(($return + 2), $suggestedType);
                    }
                }

                // If return type is not void, there needs to be a return statement
                // somewhere in the function that returns something.
                if (!in_array($content, array('void', 'mixed'))) {
                    if (isset($tokens[$stackPtr]['scope_closer']) === true) {
                        $endToken    = $tokens[$stackPtr]['scope_closer'];
                        $returnToken = $phpcsFile->findNext(array(T_RETURN, T_YIELD), $stackPtr, $endToken);
                        if ($returnToken === false) {
                            $error = 'Function return type is not void, but function has no return statement';
                            $phpcsFile->addError($error, $return, 'InvalidNoReturn');
                        } else {
                            $semicolon = $phpcsFile->findNext(T_WHITESPACE, ($returnToken + 1), null, true);
                            if ($tokens[$semicolon]['code'] === T_SEMICOLON) {
                                $error = 'Function return type is not void, but function is returning void here';
                                $phpcsFile->addError($error, $returnToken, 'InvalidReturnNotVoid');
                            }
                        }
                    }
                }//end if
            }//end if
        } else {
            $error = 'Missing @return tag in function comment';
            $phpcsFile->addError($error, $tokens[$commentStart]['comment_closer'], 'MissingReturn');
        }//end if
    }//end processReturn()


    /**
     * Process the function parameter comments.
     *
     * @param PHP_CodeSniffer_File $phpcsFile    The file being scanned.
     * @param int                  $stackPtr     The position of the current token
     *                                           in the stack passed in $tokens.
     * @param int                  $commentStart The position in the stack where the comment started.
     *
     * @return void
     * @todo Reinstate the check that params come after the function's comment and has a blank line before them
     * @todo Reinstate the check that there is a blank line after all params are declared
     */
    protected function processParams(PHP_CodeSniffer_File $phpcsFile, $stackPtr, $commentStart)
    {
        $tokens = $phpcsFile->getTokens();

        $params  = array();
        $maxType = 0;
        $maxVar  = 0;
        foreach ($tokens[$commentStart]['comment_tags'] as $pos => $tag) {
            if ($tokens[$tag]['content'] !== '@param') {
                continue;
            }

            $type      = '';
            $typeSpace = 0;
            $var       = '';
            $varSpace  = 0;
            $comment   = '';
            if ($tokens[($tag + 2)]['code'] === T_DOC_COMMENT_STRING) {
                $matches = array();
                preg_match('/([^$&]+)(?:((?:\$|&)[^\s]+)(?:(\s+)(.*))?)?/', $tokens[($tag + 2)]['content'], $matches);

                $typeLen   = strlen($matches[1]);
                $type      = trim($matches[1]);
                $typeSpace = ($typeLen - strlen($type));
                $typeLen   = strlen($type);
                if ($typeLen > $maxType) {
                    $maxType = $typeLen;
                }

                if (isset($matches[2]) === true) {
                    $var    = $matches[2];
                    $varLen = strlen($var);
                    if ($varLen > $maxVar) {
                        $maxVar = $varLen;
                    }

                    if (isset($matches[4]) === true) {
                        $varSpace = strlen($matches[3]);
                        $comment  = $matches[4];

                        // Any strings until the next tag belong to this comment.
                        if (isset($tokens[$commentStart]['comment_tags'][($pos + 1)]) === true) {
                            $end = $tokens[$commentStart]['comment_tags'][($pos + 1)];
                        } else {
                            $end = $tokens[$commentStart]['comment_closer'];
                        }

                        for ($i = ($tag + 3); $i < $end; $i++) {
                            if ($tokens[$i]['code'] === T_DOC_COMMENT_STRING) {
                                $comment .= ' '.$tokens[$i]['content'];
                            }
                        }
                    } else {
                        $error = 'Missing parameter comment';
                        $phpcsFile->addError($error, $tag, 'MissingParamComment');
                    }
                } else {
                    $error = 'Missing parameter name';
                    $phpcsFile->addError($error, $tag, 'MissingParamName');
                }//end if
            } else {
                $error = 'Missing parameter type';
                $phpcsFile->addError($error, $tag, 'MissingParamType');
            }//end if

            $params[] = array(
                         'tag'         => $tag,
                         'type'        => $type,
                         'var'         => $var,
                         'comment'     => $comment,
                         'type_space'  => $typeSpace,
                         'var_space'   => $varSpace,
                         'align_space' => $tokens[($tag + 1)]['content']
                        );
        }//end foreach

        $realParams    = $phpcsFile->getMethodParameters($stackPtr);
        $foundParams   = [];
        $previousParam = null;

        foreach ($params as $pos => $param) {
            if ($param['var'] === '') {
                continue;
            }

            $foundParams[] = $param['var'];

            // Make sure that there is only one space before the var type.
            // Joomla change: 3 spaces to make it line up with the @return tag with a 2 space gap.
            if ($param['align_space'] !== '   ') {
                $error = 'Expected 3 spaces before variable type';
                $phpcsFile->addError($error, $param['tag'], 'BeforeParamType');
            }

            // Make sure the param name is correct.
            if (isset($realParams[$pos]) === true) {
                $realName = $realParams[$pos]['name'];
                if ($realName !== $param['var']) {
                    $code = 'ParamNameNoMatch';
                    $data = array(
                             $param['var'],
                             $realName,
                            );

                    $error = 'Doc comment for parameter %s does not match ';
                    if (strtolower($param['var']) === strtolower($realName)) {
                        $error .= 'case of ';
                        $code   = 'ParamNameNoCaseMatch';
                    }

                    $error .= 'actual variable name %s';

                    $phpcsFile->addError($error, $param['tag'], $code, $data);
                }
            } else if (substr($param['var'], -4) !== ',...') {
                // We must have an extra parameter comment.
                $error = 'Superfluous parameter comment';
                $phpcsFile->addError($error, $param['tag'], 'ExtraParamComment');
            }//end if

            if ($param['comment'] === '') {
                continue;
            }

            if ($previousParam !== null) {
                $previousName = ($previousParam['var'] !== '') ? $previousParam['var'] : 'UNKNOWN';
                // Check to see if the parameters align properly.
                if (!$this->paramVarsAlign($param, $previousParam)) {
                    $error = 'The variable names for parameters %s and %s do not align';
                    $data = array(
                        $previousName,
                        $param['var']
                    );
                    $phpcsFile->addError($error, $param['tag'], 'ParameterNamesNotAligned', $data);
                }
                if (!$this->paramCommentsAlign($param, $previousParam)) {
                    $error = 'The comments for parameters %s and %s do not align';
                    $data = array(
                        $previousName,
                        $param['var']
                    );
                    $phpcsFile->addError($error, $param['tag'], 'ParameterCommentsNotAligned', $data);
                }
            }//end if

            $previousParam = $param;
        }//end foreach

        $realNames = array();
        foreach ($realParams as $realParam) {
            $realNames[] = $realParam['name'];
        }

        // Report missing comments.
        $diff = array_diff($realNames, $foundParams);
        foreach ($diff as $neededParam) {
            $error = 'Doc comment for parameter "%s" missing';
            $data  = array($neededParam);
            $phpcsFile->addError($error, $commentStart, 'MissingParamTag', $data);
        }

    }//end processParams()

    /**
     * Ensure the method's parameter comments align
     *
     * @param array $param         The current parameter being checked
     * @param array $previousParam The previous parameter that was checked
     *
     * @return bool
     */
    private function paramCommentsAlign($param, $previousParam)
    {
        $paramStringLength         = strlen($param['type']) + $param['type_space'] + strlen($param['var']) + $param['var_space'];
        $previousParamStringLength = strlen($previousParam['type']) + $previousParam['type_space'] + strlen($previousParam['var']) + $previousParam['var_space'];

        return $paramStringLength === $previousParamStringLength;
    }//end paramCommentsAlign()

    /**
     * Ensure the method's parameter variable names align
     *
     * @param array $param         The current parameter being checked
     * @param array $previousParam The previous parameter that was checked
     *
     * @return bool
     */
    private function paramVarsAlign($param, $previousParam)
    {
        $paramStringLength         = strlen($param['type']) + $param['type_space'];
        $previousParamStringLength = strlen($previousParam['type']) + $previousParam['type_space'];

        return $paramStringLength === $previousParamStringLength;
    }//end paramVarsAlign()
}//end class

?>

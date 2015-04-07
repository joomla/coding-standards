<?php
/**
 * Joomla_Sniffs_WhiteSpace_ControlStructureSpacingSniff.
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Greg Sherwood <gsherwood@squiz.net>
 * @author    Marc McIntyre <mmcintyre@squiz.net>
 * @copyright 2006-2014 Squiz Pty Ltd (ABN 77 084 670 600)
 * @license   https://github.com/squizlabs/PHP_CodeSniffer/blob/master/licence.txt BSD Licence
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */

/**
 * Joomla_Sniffs_WhiteSpace_ControlStructureSpacingSniff.
 *
 * Checks that control structures have the correct spacing around brackets.
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Greg Sherwood <gsherwood@squiz.net>
 * @author    Marc McIntyre <mmcintyre@squiz.net>
 * @copyright 2006-2014 Squiz Pty Ltd (ABN 77 084 670 600)
 * @license   https://github.com/squizlabs/PHP_CodeSniffer/blob/master/licence.txt BSD Licence
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */
class Joomla_Sniffs_WhiteSpace_ControlStructureSpacingSniff implements PHP_CodeSniffer_Sniff
{
    /**
     * A list of tokenizers this sniff supports.
     *
     * @var array
     */
    public $supportedTokenizers = array(
                                   'PHP',
                                   'JS',
                                  );


    /**
     * Returns an array of tokens this test wants to listen for.
     *
     * @return array
     */
    public function register()
    {
        return array(
                T_IF,
                T_WHILE,
                T_FOREACH,
                T_FOR,
                T_SWITCH,
                T_DO,
                T_ELSE,
                T_ELSEIF,
                T_TRY,
                T_CATCH,
                T_FUNCTION, //added line to standard
		T_CLASS,   //added line to standard
               );

    }//end register()


    /**
     * Processes this test, when one of its tokens is encountered.
     *
     * @param PHP_CodeSniffer_File $phpcsFile The file being scanned.
     * @param int                  $stackPtr  The position of the current token
     *                                        in the stack passed in $tokens.
     *
     * @return void
     */
    public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();
	
	//remove the section "parenthesis_opener"
	
        if (isset($tokens[$stackPtr]['scope_closer']) === false) {
            return;
        }

        $scopeOpener = $tokens[$stackPtr]['scope_opener'];
        $scopeCloser = $tokens[$stackPtr]['scope_closer'];

        for ($firstContent = ($scopeOpener + 1); $firstContent < $phpcsFile->numTokens; $firstContent++) {
            if ($tokens[$firstContent]['code'] !== T_WHITESPACE) {
                break;
            }
        }

        if ($tokens[$firstContent]['line'] >= ($tokens[$scopeOpener]['line'] + 2)) {
            $error = 'Blank line found at start of control structure';
            $fix   = $phpcsFile->addFixableError($error, $scopeOpener, 'SpacingAfterOpen');

            if ($fix === true) {
                $phpcsFile->fixer->beginChangeset();
                $i = ($scopeOpener + 1);
                while ($tokens[$i]['line'] !== $tokens[$firstContent]['line']) {
                    $phpcsFile->fixer->replaceToken($i, '');
                    $i++;
                }

                $phpcsFile->fixer->addNewline($scopeOpener);
                $phpcsFile->fixer->endChangeset();
            }
        }

        if ($firstContent !== $scopeCloser) {
            $lastContent = $phpcsFile->findPrevious(
                T_WHITESPACE,
                ($scopeCloser - 1),
                null,
                true
            );

            if ($tokens[$lastContent]['line'] <= ($tokens[$scopeCloser]['line'] - 2)) {
                $errorToken = $scopeCloser;
                for ($i = ($scopeCloser - 1); $i > $lastContent; $i--) {
                    if ($tokens[$i]['line'] < $tokens[$scopeCloser]['line']) {
                        $errorToken = $i;
                        break;
                    }
                }

                $error = 'Blank line found at end of control structure';
                $fix   = $phpcsFile->addFixableError($error, $errorToken, 'SpacingBeforeClose');

                if ($fix === true) {
                    $phpcsFile->fixer->beginChangeset();
                    $i = ($scopeCloser - 1);
                    for ($i = ($scopeCloser - 1); $i > $lastContent; $i--) {
                        if ($tokens[$i]['line'] === $tokens[$scopeCloser]['line']) {
                            continue;
                        }

                        if ($tokens[$i]['line'] === $tokens[$lastContent]['line']) {
                            break;
                        }

                        $phpcsFile->fixer->replaceToken($i, '');
                    }

                    $phpcsFile->fixer->endChangeset();
                }
            }//end if
        }//end if

        $trailingContent = $phpcsFile->findNext(
            T_WHITESPACE,
            ($scopeCloser + 1),
            null,
            true
        );

        if ($tokens[$trailingContent]['code'] === T_COMMENT) {
            // Special exception for code where the comment about
            // an ELSE or ELSEIF is written between the control structures.
            $nextCode = $phpcsFile->findNext(
                PHP_CodeSniffer_Tokens::$emptyTokens,
                ($scopeCloser + 1),
                null,
                true
            );

            if ($tokens[$nextCode]['code'] === T_ELSE
                || $tokens[$nextCode]['code'] === T_ELSEIF
            ) {
                $trailingContent = $nextCode;
            }
        }//end if

        if ($tokens[$trailingContent]['code'] === T_ELSE) {
            if ($tokens[$stackPtr]['code'] === T_IF) {
                // IF with ELSE.
                return;
            }
        }

        if ($tokens[$trailingContent]['code'] === T_WHILE
            && $tokens[$stackPtr]['code'] === T_DO
        ) {
            // DO with WHILE.
            return;
        }

        if ($tokens[$trailingContent]['code'] === T_CLOSE_TAG) {
            // At the end of the script or embedded code.
            return;
        }

        if (isset($tokens[$trailingContent]['scope_condition']) === true
            && $tokens[$trailingContent]['scope_condition'] !== $trailingContent
            && isset($tokens[$trailingContent]['scope_opener']) === true
            && $tokens[$trailingContent]['scope_opener'] !== $trailingContent
        ) {
            // Another control structure's closing brace.
            $owner = $tokens[$trailingContent]['scope_condition'];
            if ($tokens[$owner]['code'] === T_FUNCTION) {
                // The next content is the closing brace of a function
                // so normal function rules apply and we can ignore it.
                return;
            }

            if ($tokens[$owner]['code'] === T_CLOSURE
                && ($phpcsFile->hasCondition($stackPtr, T_FUNCTION) === true
                || $phpcsFile->hasCondition($stackPtr, T_CLOSURE) === true
                || isset($tokens[$stackPtr]['nested_parenthesis']) === true)
            ) {
                return;
            }

            if ($tokens[$trailingContent]['line'] !== ($tokens[$scopeCloser]['line'] + 1)) {
                $error = 'Blank line found after control structure';
                $fix   = $phpcsFile->addFixableError($error, $scopeCloser, 'LineAfterClose');

                if ($fix === true) {
                    $phpcsFile->fixer->beginChangeset();
                    $i = ($scopeCloser + 1);
                    while ($tokens[$i]['line'] !== $tokens[$trailingContent]['line']) {
                        $phpcsFile->fixer->replaceToken($i, '');
                        $i++;
                    }

                    $phpcsFile->fixer->addNewline($scopeCloser);
                    $phpcsFile->fixer->endChangeset();
                }
            }
        } else if ($tokens[$trailingContent]['code'] !== T_ELSE
            && $tokens[$trailingContent]['code'] !== T_ELSEIF
            && $tokens[$trailingContent]['code'] !== T_CATCH
            && $tokens[$trailingContent]['code'] !== T_COMMENT //added line to Squiz standard
            && $tokens[$trailingContent]['code'] !== T_WHILE  //added line to Squiz standard
            && $tokens[$trailingContent]['line'] === ($tokens[$scopeCloser]['line'] + 1)
        ) {
            $error = 'No blank line found after control structure';
            $fix   = $phpcsFile->addFixableError($error, $scopeCloser, 'NoLineAfterClose');
            if ($fix === true) {
                $phpcsFile->fixer->addNewline($scopeCloser);
            }
        }//end if
    }//end process()
}//end class

<?php
/**
 * Parses and verifies the doc comments for classes.
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Greg Sherwood <gsherwood@squiz.net>
 * @author    Marc McIntyre <mmcintyre@squiz.net>
 * @copyright 2006 Squiz Pty Ltd (ABN 77 084 670 600)
 * @license   http://matrix.squiz.net/developer/tools/php_cs/licence BSD Licence
 * @version   CVS: $Id: ClassCommentSniff.php 301632 2010-07-28 01:57:56Z squiz $
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */

if (class_exists('PHP_CodeSniffer_Tokenizers_Comment', true) === false) {
    $error = 'Class PHP_CodeSniffer_Tokenizers_Comment not found';
    throw new PHP_CodeSniffer_Exception($error);
}

require_once 'FileCommentSniff.php';

if (class_exists('Joomla_Sniffs_Commenting_FileCommentSniff', true) === false) {
    $error = 'Class Joomla_Sniffs_Commenting_FileCommentSniff not found';
    throw new PHP_CodeSniffer_Exception($error);
}

/**
 * Parses and verifies the doc comments for classes.
 *
 * Verifies that :
 * <ul>
 *  <li>A doc comment exists.</li>
 *  <li>There is a blank newline after the short description.</li>
 *  <li>There is a blank newline between the long and short description.</li>
 *  <li>There is a blank newline between the long description and tags.</li>
 *  <li>Check the order of the tags.</li>
 *  <li>Check the indentation of each tag.</li>
 *  <li>Check required and optional tags and the format of their content.</li>
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
class Joomla_Sniffs_Commenting_ClassCommentSniff extends Joomla_Sniffs_Commenting_FileCommentSniff
{


    /**
     * Tags in correct order and related info.
     *
     * @var array
     */
    protected $tags = array(
                       '@version'    => array(
                                        'required'       => false,
                                        'allow_multiple' => false,
                                        'order_text'     => 'is first',
                                       ),
                       '@category'    => array(
                                        'required'       => false,
                                        'allow_multiple' => false,
                                        'order_text'     => 'must follow @version (if used)',
                                       ),
                       '@package'    => array(
                                        'required'       => false,
                                        'allow_multiple' => false,
                                        'order_text'     => 'must follow @category (if used)',
                                       ),
                       '@subpackage' => array(
                                        'required'       => false,
                                        'allow_multiple' => false,
                                        'order_text'     => 'must follow @package',
                                       ),
                       '@author'    => array(
                                        'required'       => false,
                                        'allow_multiple' => true,
                                        'order_text'     => 'is first',
                                       ),
                       '@copyright'  => array(
                                        'required'       => false,
                                        'allow_multiple' => true,
                                        'order_text'     => 'must follow @author (if used) or @subpackage (if used) or @package',
                                       ),
                       '@license'    => array(
                                        'required'       => false,
                                        'allow_multiple' => false,
                                        'order_text'     => 'must follow @copyright (if used)',
                                       ),
                       '@link'       => array(
                                        'required'       => false,
                                        'allow_multiple' => true,
                                        'order_text'     => 'must follow @version (if used)',
                                       ),
                       '@see'        => array(
                                        'required'       => false,
                                        'allow_multiple' => true,
                                        'order_text'     => 'must follow @link (if used)',
                                       ),
                       '@since'      => array(
                                        'required'       => true,
                                        'allow_multiple' => false,
                                        'order_text'     => 'must follow @see (if used) or @link (if used)',
                                       ),
                       '@deprecated' => array(
                                        'required'       => false,
                                        'allow_multiple' => false,
                                        'order_text'     => 'must follow @since (if used) or @see (if used) or @link (if used)',
                                       ),
                );

    /**
     * Returns an array of tokens this test wants to listen for.
     *
     * @return array
     */
    public function register()
    {
        return array(
                T_CLASS,
                T_INTERFACE,
                T_TRAIT
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
        $this->currentFile = $phpcsFile;

        $tokens    = $phpcsFile->getTokens();
        $type      = strtolower($tokens[$stackPtr]['content']);
        $errorData = array($type);

        $find   = PHP_CodeSniffer_Tokens::$methodPrefixes;
        $find[] = T_WHITESPACE;

        $commentEnd = $phpcsFile->findPrevious($find, ($stackPtr - 1), null, true);
        if ($tokens[$commentEnd]['code'] !== T_DOC_COMMENT_CLOSE_TAG
            && $tokens[$commentEnd]['code'] !== T_COMMENT
        ) {
            $phpcsFile->addError('Missing class doc comment', $stackPtr, 'Missing');
            $phpcsFile->recordMetric($stackPtr, 'Class has doc comment', 'no');
            return;
        } else {
            $phpcsFile->recordMetric($stackPtr, 'Class has doc comment', 'yes');
        }

        // Try and determine if this is a file comment instead of a class comment.
        // We assume that if this is the first comment after the open PHP tag, then
        // it is most likely a file comment instead of a class comment.
        if ($tokens[$commentEnd]['code'] === T_DOC_COMMENT_CLOSE_TAG) {
            $start = ($tokens[$commentEnd]['comment_opener'] - 1);
        } else {
            $start = $phpcsFile->findPrevious(T_COMMENT, ($commentEnd - 1), null, true);
        }

        $prev = $phpcsFile->findPrevious(T_WHITESPACE, $start, null, true);
        if ($tokens[$prev]['code'] === T_OPEN_TAG) {
            $prevOpen = $phpcsFile->findPrevious(T_OPEN_TAG, ($prev - 1));
            if ($prevOpen === false) {
                // This is a comment directly after the first open tag,
                // so probably a file comment.
                $phpcsFile->addError('Missing class doc comment', $stackPtr, 'Missing');
                return;
            }
        }

        if ($tokens[$commentEnd]['code'] === T_COMMENT) {
            $phpcsFile->addError('You must use "/**" style comments for a class comment', $stackPtr, 'WrongStyle');
            return;
        }

        // Check each tag.
        $this->processTags($phpcsFile, $stackPtr, $tokens[$commentEnd]['comment_opener']);

    }//end process()


    /**
     * Process the version tag.
     *
     * @param PHP_CodeSniffer_File $phpcsFile The file being scanned.
     * @param array                $tags      The tokens for these tags.
     *
     * @return void
     */
    protected function processVersion(PHP_CodeSniffer_File $phpcsFile, array $tags)
    {
        $tokens = $phpcsFile->getTokens();
        foreach ($tags as $tag) {
            if ($tokens[($tag + 2)]['code'] !== T_DOC_COMMENT_STRING) {
                // No content.
                continue;
            }

            $content = $tokens[($tag + 2)]['content'];
            if ((strstr($content, 'Release:') === false)) {
                $error = 'Invalid version "%s" in doc comment; consider "Release: <package_version>" instead';
                $data  = array($content);
                $phpcsFile->addWarning($error, $tag, 'InvalidVersion', $data);
            }
        }

    }//end processVersion()


}//end class

?>

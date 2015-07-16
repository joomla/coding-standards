<?php
/**
 * PEAR_Sniffs_WhiteSpace_ObjectOperatorIndentSniff.
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Greg Sherwood <gsherwood@squiz.net>
 * @copyright 2006-2014 Squiz Pty Ltd (ABN 77 084 670 600)
 * @license   https://github.com/squizlabs/PHP_CodeSniffer/blob/master/licence.txt BSD Licence
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */

if (class_exists('PEAR_Sniffs_WhiteSpace_ObjectOperatorIndentSniff', true) === false) {
    $error = 'Class PEAR_Sniffs_WhiteSpace_ObjectOperatorIndentSniff not found';
    throw new PHP_CodeSniffer_Exception($error);
}

/**
 * PEAR_Sniffs_WhiteSpace_ObjectOperatorIndentSniff.
 *
 * Checks that object operators are indented 4 spaces (one tab) if they are the first
 * thing on a line.
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Greg Sherwood <gsherwood@squiz.net>
 * @copyright 2006-2014 Squiz Pty Ltd (ABN 77 084 670 600)
 * @license   https://github.com/squizlabs/PHP_CodeSniffer/blob/master/licence.txt BSD Licence
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */
class Joomla_Sniffs_WhiteSpace_ObjectOperatorIndentSniff extends PEAR_Sniffs_WhiteSpace_ObjectOperatorIndentSniff
{


    /**
     * The number of spaces (tabs) code should be indented.
     *
     * @var int
     */
    public $indent = 1;


}//end class

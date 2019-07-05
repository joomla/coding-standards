<?php
/**
 * This sniff looks for the usage of "error_reporting".
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   Joomla
 * @author    Jose A. Luque <contacto@protegeetuordenador.com>
 * @license   https://github.com/squizlabs/PHP_CodeSniffer/blob/master/licence.txt BSD Licence
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */

namespace Joomla\Sniffs\Rules;

use PHP_CodeSniffer\Sniffs\Sniff;
use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Util\Tokens;

class ErrorReportingSniff implements Sniff
{
	/**
	 * A list of tokenizers this sniff supports.
	 *
	 * @var array
	 */
	public $supportedTokenizers = array(
								   'PHP',
								  );

	/**
	 * Returns an array of tokens this test wants to listen for.
	 *
	 * @return array
	 */
	public function register()
	{
		return array(T_STRING);
	}
	
    /**
     * Processes this sniff, when one of its tokens is encountered.
     *
     * @param \PHP_CodeSniffer\Files\File $phpcsFile The current file being checked.
     * @param int                         $stackPtr  The position of the current token in the
     *                                               stack passed in $tokens.
     *
     * @return void
     */
    public function process(File $phpcsFile, $stackPtr)
    {
		// Tags to be searched
		$tags = array('error_reporting');				
		
		$tokens = $phpcsFile->getTokens();	
		$nextToken = $phpcsFile->findNext(Tokens::$emptyTokens, ($stackPtr + 1), null, true);		
				
		if (($tokens[$nextToken]['code'] === T_OPEN_PARENTHESIS) && ($tokens[($nextToken + 1)]['code'] === T_LNUMBER))
		{
			$error = "Use of error_reporting is discouraged as Joomla provides an error_reporting option in the Global Configuration.";
				$data  = array(trim($tokens[$stackPtr]['content']));
				$phpcsFile->addWarning($error, $stackPtr, 'Found', $data);
		}

    }//end process()


}//end class

?>

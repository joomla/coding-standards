<?php
/**
 * This sniff looks for the usage of JEXEC.
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   Joomla
 * @author    Jose A. Luque <contacto@protegeetuordenador.com>
 * @license   https://github.com/squizlabs/PHP_CodeSniffer/blob/master/licence.txt BSD Licence
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 * @IMPORTANT: This file requires a modification into the /vendor/squizlabs/php_codesniffer/src/Reporter.php file.
 */

namespace Joomla\Sniffs\Rules;

use PHP_CodeSniffer\Sniffs\Sniff;
use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Util\Tokens;

class JexecSniff implements Sniff
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
		return array(T_STRING,T_CONSTANT_ENCAPSED_STRING);
	}
	
    /**
     * Processes this sniff, when one of its tokens is encountered.
     *
     * @param \PHP_CodeSniffer\Files\File $phpcsFile The current file being checked.
     * @param int                         $stackPtr  The position of the current token in the
     *                                               stack passed in $tokens.
	 * @param array                      $tags	 	 Strings to be found.
	 * @param boolean                    $found		 Any of the strings to be found exists.
	 * @param string                     $content	 String of the @license token.
     *
     * @return void
     */
    public function process(File $phpcsFile, $stackPtr)
    {
		
		// Tags to be searched
		$tags = array('_JEXEC', 'FOF30_INCLUDED','JPATH_PLATFORM', 'JPATH_BASE', 'AKEEBAENGINE', 'WF_EDITOR');	
				
		$tokens = $phpcsFile->getTokens();	
		
		// Search for the 'defined' string
		$defined_pos = stripos($tokens[$stackPtr]['content'], 'defined');
			
		// Skip if "defined" is not found
		if ($defined_pos === false)
		{
			return;
		}
		
		// Look for the next token 2 positions ahead of the current token (because we are looking for defined('J_EXEC'))
		$nextToken = $phpcsFile->findNext(Tokens::$emptyTokens, ($stackPtr + 2), null, true);
				
		foreach ($tags as $tag)
		{
			if ( strstr(strtolower($tokens[$nextToken]['content']),strtolower($tag)) ) {				
				$error = "JEXEC found";
				$data  = array();
				$phpcsFile->addError($error, $stackPtr, 'Found', $data);
				return;						
			}			
		}
		

    }//end process()


}//end class

?>

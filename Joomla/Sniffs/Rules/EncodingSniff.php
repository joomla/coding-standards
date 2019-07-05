<?php
/**
 * This sniff looks for the usage of base64_ functions.
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

class EncodingSniff implements Sniff
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
		$tags = array('base64_encode','base64_decode');				
		
		$tokens = $phpcsFile->getTokens();	
		
		foreach ($tags as $tag)
		{
			if (strtolower($tokens[$stackPtr]['content']) === strtolower($tag)) {
				$error = "You've used encoding (%s) in this file. This is not an error, but a JED editor will have to review this file.";
				$data  = array(trim($tokens[$stackPtr]['content']));
				$phpcsFile->addWarning($error, $stackPtr, 'Found', $data);		
			}
		}

    }//end process()


}//end class

?>

<?php
/**
 * This sniff looks for the usage of licensing.
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

class GplSniff implements Sniff
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
		return array(T_OPEN_TAG);
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
		$tags = array('BSD','GPL','GNU','general public license');	
		
		$found = false;
		
		$tokens = $phpcsFile->getTokens();	
		
		// Locate the "@license" string. Extracted from \composer\vendor\joomla\coding-standards\Sniffs\Commenting\FileCommentSniff.php
		if ($tokens[(21 + 2)]['code'] !== T_DOC_COMMENT_STRING)
		{
			// No content.
			return;
		}

		$content = $tokens[(21 + 2)]['content'];
		
		foreach ($tags as $tag)
		{
			if ( strstr(strtolower($content),strtolower($tag)) ) {					
				$found = true;
				break;				
			}			
		}
				
		if (!$found)
		{
			$error = "GPL or compatible license was not found.";
			$data  = array();
			$phpcsFile->addError($error, $stackPtr, 'Not Found', $data);
		}	

    }//end process()


}//end class

?>

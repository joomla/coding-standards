<?php
/**
 * This sniff looks for the usage of some Framework rules.
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

class FrameworkSniff implements Sniff
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
		return array(T_STRING,T_VARIABLE,T_DOUBLE_COLON,T_OBJECT_OPERATOR);
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
		// Leftover_folders
		$leftover_folders = array('DS_Store','svn','git');
		
		// Directdb
		$directdb = array('mysql_connect','mysql_query','mysql_close','mysql_​escape_​string','directdb');
		
		// Superglobals
		$superglobals = array('$_GET','$_POST','$_SESSION','$_COOKIE','$_FILES');

		// Notice groups
		$notice_groups = array('errorlog','todo','error_log','var_export','var_dump','@TODO');

		// The following strings will have this syntax: 'JUtility::checkToken' or 'JWebClient'
		$compatibility_groups_not_object_operator = array('JFTP','JLDAP','JWebClient','JloadResultArray','nameQuote','JParameter','JElement','JFormFieldEditors','JHtmlImage','JRules','JSimpleXML','JPane','JRequest','assignRef','JError','isWinOS','checkToken','toMysql','sendMail','sendAdminMail','getToken','getXMLParser','mootools');
		
		// The following strings will have this syntax: '$db->getEscaped'
		$compatibility_groups_object_operator = array('getEscaped');
				
		$tokens = $phpcsFile->getTokens();		
		
		// Look for leftover_folders
		foreach ($leftover_folders as $tag)
		{
			if (strtolower($tokens[$stackPtr]['content']) === strtolower($tag)) {
				$previousToken = $phpcsFile->findNext(Tokens::$emptyTokens, ($stackPtr - 1), null, true);
								
				if ($tokens[$previousToken]['code'] == T_STRING_CONCAT)
				{
					$error = "Code-versioning (." . $tag . ") folders detected.";
					$data  = array(trim($tokens[$stackPtr]['content']));
					$phpcsFile->addError($error, $stackPtr, 'Found', $data);
				}						
			}
		}
		
		// Look for directdb
		foreach ($directdb as $tag)
		{			
			if ($tokens[$stackPtr]['content'] === $tag) {
				$error = "Direct connect (" .$tag . ") to database detected.";
				$data  = array(trim($tokens[$stackPtr]['content']));
				$phpcsFile->addError($error, $stackPtr, 'Found', $data);		
			}
		}
		
		// Look for superglobals
		foreach ($superglobals as $tag)
		{			
			if ($tokens[$stackPtr]['content'] === $tag) {
				$error = "Superglobal (" .$tag . ") found. Use of superglobals is strongly discouraged.";
				$data  = array(trim($tokens[$stackPtr]['content']));
				$phpcsFile->addError($error, $stackPtr, 'Found', $data);		
			}
		}
		
		// Look for notice_groups
		foreach ($notice_groups as $tag)
		{			
			if ($tokens[$stackPtr]['content'] === $tag) {
				$error = "Comments or dumps (" .$tag . ") found.";
				$data  = array(trim($tokens[$stackPtr]['content']));
				$phpcsFile->addWarning($error, $stackPtr, 'Found', $data);		
			}
		}
		
		// Look for compatibility_groups
		foreach ($compatibility_groups_not_object_operator as $tag)
		{			
			if ($tokens[$stackPtr]['content'] === $tag) {			
				
				$previousToken = $phpcsFile->findNext(Tokens::$emptyTokens, ($stackPtr - 1), null, true);
				if ($tokens[$previousToken]['code'] == T_DOUBLE_COLON)
				{
					$previousToken2 = $phpcsFile->findPrevious(Tokens::$emptyTokens, ($previousToken - 1), null, true);	
					$previousTokenContent = $tokens[$previousToken2]['content'];
					switch ($tag) {						
						case 'isWinOS':								
							if ($previousTokenContent == "JUtility")
							{
								$error = "Compatibility issues found (" . $previousTokenContent . "::" . $tag . ")";
								$data  = array(trim($tokens[$stackPtr]['content']));
								$phpcsFile->addWarning($error, $stackPtr, 'Found', $data);	
							}
							break;
						case 'checkToken':
							if ($previousTokenContent == "JRequest")
							{
								$error = "Compatibility issues found (" . $previousTokenContent . "::" . $tag . ")";
								$data  = array(trim($tokens[$stackPtr]['content']));
								$phpcsFile->addWarning($error, $stackPtr, 'Found', $data);	
							}
							break;		
						case 'toMysql':
							if ($previousTokenContent == "JDate")
							{
								$error = "Compatibility issues found (" . $previousTokenContent . "::" . $tag . ")";
								$data  = array(trim($tokens[$stackPtr]['content']));
								$phpcsFile->addWarning($error, $stackPtr, 'Found', $data);	
							}
							break;
						case 'sendMail':
							if ($previousTokenContent == "JUtility")
							{
								$error = "Compatibility issues found (" . $previousTokenContent . "::" . $tag . ")";
								$data  = array(trim($tokens[$stackPtr]['content']));
								$phpcsFile->addWarning($error, $stackPtr, 'Found', $data);	
							}
							break;
						case 'sendAdminMail':
							if ($previousTokenContent == "JUtility")
							{
								$error = "Compatibility issues found (" . $previousTokenContent . "::" . $tag . ")";
								$data  = array(trim($tokens[$stackPtr]['content']));
								$phpcsFile->addWarning($error, $stackPtr, 'Found', $data);	
							}
							break;
						case 'getToken':
							if ($previousTokenContent == "JUtility")
							{
								$error = "Compatibility issues found (" . $previousTokenContent . "::" . $tag . ")";
								$data  = array(trim($tokens[$stackPtr]['content']));
								$phpcsFile->addWarning($error, $stackPtr, 'Found', $data);	
							}
							break;
						case 'getXMLParser':
							if ($previousTokenContent == "JFactory")
							{
								$error = "Compatibility issues found (" . $previousTokenContent . "::" . $tag . ")";
								$data  = array(trim($tokens[$stackPtr]['content']));
								$phpcsFile->addWarning($error, $stackPtr, 'Found', $data);	
							}
							break;
						case 'mootools':
							if ($previousTokenContent == "JHtmlBehavior")
							{
								$error = "Compatibility issues found (" . $previousTokenContent . "::" . $tag . ")";
								$data  = array(trim($tokens[$stackPtr]['content']));
								$phpcsFile->addWarning($error, $stackPtr, 'Found', $data);	
							}
							break;
							
					}					
				}					
			}
		}
		
		foreach ($compatibility_groups_object_operator as $tag)
		{			
			if ($tokens[$stackPtr]['content'] === $tag) {			
				
				$previousToken = $phpcsFile->findNext(Tokens::$emptyTokens, ($stackPtr - 1), null, true);
				if ($tokens[$previousToken]['code'] == T_OBJECT_OPERATOR)
				{
					$previousToken2 = $phpcsFile->findPrevious(Tokens::$emptyTokens, ($previousToken - 1), null, true);	
					$previousTokenContent = $tokens[$previousToken2]['content'];					
					switch ($tag) {	
						case 'getEscaped':	
							var_dump($previousTokenContent);							
							if ($previousTokenContent == "\$db")
							{
								$error = "Compatibility issues found (" . $previousTokenContent . "->" . $tag . ")";
								$data  = array(trim($tokens[$stackPtr]['content']));
								$phpcsFile->addWarning($error, $stackPtr, 'Found', $data);	
							}
							break;
					}
				}
			}
		}

    }//end process()
	
}//end class

?>

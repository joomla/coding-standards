<?php
/**
 * Joomla! Coding Standard
 *
 * @package    Joomla.CodingStandard
 * @copyright  Copyright (C) 2017 Open Source Matters, Inc. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License Version 2 or Later
 */

/**
 * Extended ruleset that warns for the use of various deprecated Joomla functions and suggests alternatives.
 *
 * Discourages the use of deprecated functions that are kept in Joomla for compatibility with older versions.
 *
 * @since     0.0
 */
class Joomla_Sniffs_Deprecated_DeprecatedFunctionsSniff extends Generic_Sniffs_PHP_ForbiddenFunctionsSniff
{
	/**
	 * A list of deprecated / forbidden functions with their alternatives.
	 *
	 * The array lists : version number with 0 (deprecated) or 1 (forbidden) and an alternative function.
	 * If no alternative exists, it is NULL. IE, the function should just not be used.
	 *
	 * @var array(string => array(string => int|string|null))
	 */
	public $forbiddenFunctions = array(
										'isSite' => array(
											'3.2' => false,
											'5.0' => true,
											'alternative' => "Use isClient('site') instead"
										),
										'_buildRawRoute' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "Attach your logic as rule to the main build stage"
										),
										'_buildSefRoute' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "Attach your logic as rule to the main build stage"
										),
										'_cleanAttributes' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "Attach your logic as rule to the main build stage"
										),
										'addScriptVersion' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "This method is deprecated, use addScript(url, options, attributes) instead."
										),
										'addStyleSheetVersion' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "This method is deprecated, use addStyleSheet(url, options, attributes) instead."
										),
									);

	/**
	 * If true, an error will be thrown; otherwise a warning.
	 *
	 * @var boolean
	 */
	public $error = false;

	/**
	 * Enable or disable deprecated sniff.
	 *
	 * This property allows changing the activation of the deprecated sniff by setting a property in a custom phpcs.xml ruleset.
	 *
	 * Example usage:
	 * <rule ref="Joomla.Sniffs.Deprecated.DeprecatedFunctionsSniff">
	 *  <properties>
	 *   <property name="enable_deprecated_sniff" value="1"/>
	 *  </properties>
	 * </rule>
	 *
	 * Alternatively, the value can be passed for the sniff using it via the command line or by setting a `<config>` value in a custom phpcs.xml ruleset.
	 * Note: the `_joomla_` in the command line property name!
	 *
	 * CL: `phpcs --runtime-set enable_deprecated_joomla_sniff 1`
	 * Ruleset: `<config name="enable_deprecated_joomla_sniff" value="1"/>`
	 *
	 * When not set (or set to 0) the deprecated sniff check will NOT be executed
	 *
	 * When setting to value to a Joomla! version number, only deprecated functions for that version will be reported
	 * e.g. CL: `phpcs --runtime-set enable_deprecated_joomla_sniff 3.8.3` or Ruleset: `<config name="enable_deprecated_joomla_sniff" value="3.8.3"/>`
	 *
	 * @var string Joomla version.
	 *
	 * @since 0.0
	 */
	public $enable_deprecated_sniff = '0';

	/**
	 * Processes this test, when one of its tokens is encountered.
	 *
	 * @param   PHP_CodeSniffer_File $phpcsFile The file being scanned.
	 * @param   int                  $stackPtr  The position of the current token in the stack passed in $tokens.
	 *
	 * @return void
	 */
	public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
	{
		// Get menabled or disabled value from command line
		$this->get_enable_deprecated_joomla_sniff_from_cl();

		// If deprecated sniff is disabed ('0') return with checking for deprecated functions
		if ($this->enable_deprecated_sniff == '0')
		{
			return;
		}

		$tokens = $phpcsFile->getTokens();

		// Set ignore codes
		$ignore = array(
		);

		$prevToken = $phpcsFile->findPrevious(T_WHITESPACE, ($stackPtr - 1), null, true);

		if (in_array($tokens[$prevToken]['code'], $ignore) === true)
		{
			// Not a call to a PHP function.
			return;
		}

		$function = strtolower($tokens[$stackPtr]['content']);
		$pattern  = null;

		if ($this->patternMatch === true)
		{
			$count   = 0;
			$pattern = preg_replace(
				$this->forbiddenFunctionNames,
				$this->forbiddenFunctionNames,
				$function,
				1,
				$count
			);

			if ($count === 0)
			{
				return;
			}

			// Remove the pattern delimiters and modifier.
			$pattern = substr($pattern, 1, -2);
		}
		else
		{
			if (in_array($function, $this->forbiddenFunctionNames) === false)
			{
				return;
			}
		}

		$this->addError($phpcsFile, $stackPtr, $tokens[$stackPtr]['content'], $pattern);

	}

	/**
	 * Generates the error or wanrning for this sniff.
	 *
	 * @param   PHP_CodeSniffer_File $phpcsFile The file being scanned.
	 * @param   int                  $stackPtr  The position of the forbidden function in the token array.
	 * @param   string               $function  The name of the forbidden function.
	 * @param   string               $pattern   The pattern used for the match.
	 *
	 * @return void
	 */
	protected function addError($phpcsFile, $stackPtr, $function, $pattern=null)
	{
		$versionCheck = false;
		$error = 'The use of function ' . $function . ' is ';

		if ($pattern === null)
		{
			$pattern = strtolower($function);
		}

		$this->error = false;

		foreach ($this->forbiddenFunctions[$pattern] as $version => $forbidden)
		{
			// Do a version compare against the version to check against
			if (version_compare($version, $this->enable_deprecated_sniff, '>') && !$forbidden)
			{
				$versionCheck = true;
				break;
			}

			if ($version != 'alternative')
			{
				if ($forbidden === true)
				{
					$this->error = true;
					$error .= 'removed';
				}
				else
				{
					$error .= 'deprecated';
				}

				$error .= ' in Joomla version ' . $version . ' and ';
			}
		}

		if (!$versionCheck)
		{
			$error = substr($error, 0, strlen($error) - 5);

			if ($this->forbiddenFunctions[$pattern]['alternative'] !== null)
			{
				$error .= '; ' . $this->forbiddenFunctions[$pattern]['alternative'] . '.';
			}

			if ($this->error === true)
			{
				$phpcsFile->addError($error, $stackPtr);
			}
			else
			{
				$phpcsFile->addWarning($error, $stackPtr);
			}
		}
	}

	/**
	 * Overrule the minimum supported Joomla version with a command-line/config value.
	 *
	 * Handle setting the minimum supported Joomla version in one go for all sniffs which
	 * expect it via the command line or via a `<config>` variable in a ruleset.
	 * The config variable overrules the default `$minimum_supported_version` and/or a
	 * `$minimum_supported_version` set for individual sniffs through the ruleset.
	 *
	 * @since 0.0.0
	 *
	 * @return void
	 */
	protected function get_enable_deprecated_joomla_sniff_from_cl()
	{
		if (method_exists('\PHP_CodeSniffer\Config', 'getConfigData'))
		{
			// PHPCS 3.x.
			$cl_enable_deprecated_sniff = trim(\PHP_CodeSniffer\Config::getConfigData('enable_deprecated_joomla_sniff'));
		}
		else
		{
			// PHPCS 2.x.
			$cl_enable_deprecated_sniff = trim(\PHP_CodeSniffer::getConfigData('enable_deprecated_joomla_sniff'));
		}

		if (!empty($cl_enable_deprecated_sniff) && filter_var($cl_enable_deprecated_sniff, FILTER_VALIDATE_FLOAT) !== false)
		{
			$this->enable_deprecated_sniff = $cl_enable_deprecated_sniff;
		}

		return;
	}
}

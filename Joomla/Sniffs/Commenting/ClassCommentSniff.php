<?php
/**
 * Joomla! Coding Standard
 *
 * @copyright  Copyright (C) 2015 Open Source Matters, Inc. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License Version 2 or Later
 */

if (class_exists('PEAR_Sniffs_Commenting_ClassCommentSniff', true) === false)
{
	throw new PHP_CodeSniffer_Exception('Class PEAR_Sniffs_Commenting_ClassCommentSniff not found');
}

/**
 * Parses and verifies the doc comments for classes.
 *
 * @since  1.0
 */
class Joomla_Sniffs_Commenting_ClassCommentSniff extends PEAR_Sniffs_Commenting_ClassCommentSniff
{
	/**
	 * Tags in correct order and related info.
	 *
	 * @var  array
	 */
	protected $tags = array(
		'@version'    => array(
			'required'       => false,
			'allow_multiple' => false,
			'order_text'     => 'is first',
		),
		'@category'   => array(
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
		'@author'     => array(
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
	 * @return  array
	 */
	public function register()
	{
		return array(
			T_CLASS,
			T_INTERFACE,
			T_TRAIT
		);
	}
}

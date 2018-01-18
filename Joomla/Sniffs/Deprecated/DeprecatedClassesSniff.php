<?php
/**
 * Joomla! Coding Standard
 *
 * @package    Joomla.CodingStandard
 * @copyright  Copyright (C) 2017 Open Source Matters, Inc. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License Version 2 or Later
 */

/**
 * Extended ruleset that warns for the use of various deprecated Joomla Classes and suggests alternatives.
 *
 * Discourages the use of deprecated classes that are kept in Joomla for compatibility with older versions.
 *
 * @since     0.0
 */
class Joomla_Sniffs_Deprecated_DeprecatedClassesSniff extends Generic_Sniffs_PHP_ForbiddenFunctionsSniff
{
	/**
	 * A list of deprecated / forbidden classes with their alternatives.
	 *
	 * SOURCE: https://api.joomla.org/cms-3/deprecated.html
	 *
	 * The array lists : version number with 0 (deprecated) or 1 (forbidden) and an alternative class.
	 * If no alternative exists, it is NULL. IE, the class should just not be used.
	 *
	 * @var array(string => array(string => int|string|null))
	 */
	public $forbiddenFunctions = array(
										'JRegistry' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\Registry\Registry"
										),
										'JRegistryFormat' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\Registry\AbstractRegistryFormat"
										),
										'JRegistryFormatIni' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\Registry\Format\Ini"
										),
										'JRegistryFormatJson' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\Registry\Format\Json"
										),
										'JRegistryFormatPhp' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\Registry\Format\Php"
										),
										'JRegistryFormatXml' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\Registry\Format\Xml"
										),
										'JStringInflector' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\String\Inflector"
										),
										'JStringNormalise' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\String\Normalise"
										),
										'JData' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\Data\DataObject"
										),
										'JDataSet' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\Data\DataSet"
										),
										'JDataDumpable' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\Data\DumpableInterface"
										),
										'JApplicationAdministrator' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Application\AdministratorApplication"
										),
										'JApplicationHelper' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Application\ApplicationHelper"
										),
										'JApplicationBase' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Application\BaseApplication"
										),
										'JApplicationCli' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Application\CliApplication"
										),
										'JApplicationCms' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Application\CMSApplication"
										),
										'JApplicationDaemon' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Application\DaemonApplication"
										),
										'JApplicationSite' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Application\SiteApplication"
										),
										'JApplicationWeb' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Application\WebApplication"
										),
										'JApplicationWebClient' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\Application\Web\WebClient"
										),
										'JDaemon' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Application\DaemonApplication"
										),
										'JCli' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Application\CliApplication"
										),
										'JWeb' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "\Joomla\CMS\Application\WebApplication"
										),
										'JWebClient' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "\Joomla\Application\Web\WebClient"
										),
										'JModelAdmin' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\MVC\Model\AdminModel"
										),
										'JModelForm' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\MVC\Model\FormModel"
										),
										'JModelItem' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\MVC\Model\ItemModel"
										),
										'JModelList' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\MVC\Model\ListModel"
										),
										'JModelLegacy' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\MVC\Model\BaseDatabaseModel"
										),
										'JViewCategories' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\MVC\View\CategoriesView"
										),
										'JViewCategory' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\MVC\View\CategoryView"
										),
										'JViewCategoryfeed' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\MVC\View\CategoryFeedView"
										),
										'JViewLegacy' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\MVC\View\HtmlView"
										),
										'JControllerAdmin' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\MVC\Controller\AdminController"
										),
										'JControllerLegacy' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\MVC\Controller\BaseController"
										),
										'JControllerForm' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\MVC\Controller\FormController"
										),
										'JTableInterface' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Table\TableInterface"
										),
										'JTable' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Table\Table"
										),
										'JTableNested' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Table\Nested"
										),
										'JTableAsset' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Table\Asset"
										),
										'JTableExtension' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Table\Extension"
										),
										'JTableLanguage' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Table\Language"
										),
										'JTableUpdate' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Table\Update"
										),
										'JTableUpdatesite' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Table\UpdateSite"
										),
										'JTableUser' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Table\User"
										),
										'JTableUsergroup' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Table\Usergroup"
										),
										'JTableViewlevel' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Table\ViewLevel"
										),
										'JTableContenthistory' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Table\ContentHistory"
										),
										'JTableContenttype' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Table\ContentType"
										),
										'JTableCorecontent' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Table\CoreContent"
										),
										'JTableUcm' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Table\Ucm"
										),
										'JTableCategory' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Table\Category"
										),
										'JTableContent' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Table\Content"
										),
										'JTableMenu' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Table\Menu"
										),
										'JTableMenuType' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Table\MenuType"
										),
										'JTableModule' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Table\Module"
										),
										'JTableObserver' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Table\Observer\AbstractObserver"
										),
										'JTableObserverContenthistory' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Table\Observer\ContentHistory"
										),
										'JTableObserverTags' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Table\Observer\Tags"
										),
										'JAccess' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Access\Access"
										),
										'JAccessRule' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Access\Rule"
										),
										'JAccessRules' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Access\Rules"
										),
										'JAccessWrapperAccess' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "\Joomla\CMS\Access\Wrapper\Access"
										),
										'JAccessExceptionNotallowed' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Access\Exception\NotAllowed"
										),
										'JRule' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Access\Rule"
										),
										'JRules' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Access\Rules"
										),
										'JHelp' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Help\Help"
										),
										'JCaptcha' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Captcha\Captcha"
										),
										'JLanguageAssociations' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Language\Associations"
										),
										'JLanguage' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Language\Language"
										),
										'JLanguageHelper' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Language\LanguageHelper"
										),
										'JLanguageStemmer' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Language\LanguageStemmer"
										),
										'JLanguageMultilang' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Language\Multilanguage"
										),
										'JText' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Language\Text"
										),
										'JLanguageTransliterate' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Language\Transliterate"
										),
										'JLanguageStemmerPorteren' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Language\Stemmer\Porteren"
										),
										'JLanguageWrapperText' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "\Joomla\CMS\Language\Wrapper\JTextWrapper"
										),
										'JLanguageWrapperHelper' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "\Joomla\CMS\Language\Wrapper\LanguageHelperWrapper"
										),
										'JLanguageWrapperTransliterate' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "\Joomla\CMS\Language\Wrapper\TransliterateWrapper"
										),
										'JComponentHelper' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Component\ComponentHelper"
										),
										'JComponentRecord' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Component\ComponentRecord"
										),
										'JComponentExceptionMissing' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Component\Exception\MissingComponentException"
										),
										'JComponentRouterBase' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Component\Router\RouterBase"
										),
										'JComponentRouterInterface' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Component\Router\RouterInterface"
										),
										'JComponentRouterLegacy' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Component\Router\RouterLegacy"
										),
										'JComponentRouterView' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Component\Router\RouterView"
										),
										'JComponentRouterViewconfiguration' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Component\Router\RouterViewConfiguration"
										),
										'JComponentRouterRulesMenu' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Component\Router\Rules\MenuRules"
										),
										'JComponentRouterRulesNomenu' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Component\Router\Rules\NomenuRules"
										),
										'JComponentRouterRulesInterface' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Component\Router\Rules\RulesInterface"
										),
										'JComponentRouterRulesStandard' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Component\Router\Rules\StandardRules"
										),
										'JEditor' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Editor\Editor"
										),
										'JErrorPage' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Exception\ExceptionHandler"
										),
										'JAuthenticationHelper' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Helper\AuthenticationHelper"
										),
										'JHelper' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Helper\CMSHelper"
										),
										'JHelperContent' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Helper\ContentHelper"
										),
										'JHelperContenthistory' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Helper\ContentHistoryHelper"
										),
										'JLibraryHelper' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Helper\LibraryHelper"
										),
										'JHelperMedia' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Helper\MediaHelper"
										),
										'JModuleHelper' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Helper\ModuleHelper"
										),
										'JHelperRoute' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Helper\RouteHelper"
										),
										'JSearchHelper' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Helper\SearchHelper"
										),
										'JHelperTags' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Helper\TagsHelper"
										),
										'JHelperUsergroups' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Helper\UserGroupsHelper"
										),
										'JLayoutBase' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Layout\BaseLayout"
										),
										'JLayoutFile' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Layout\FileLayout"
										),
										'JLayoutHelper' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Layout\LayoutHelper"
										),
										'JLayout' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Layout\LayoutInterface"
										),
										'JResponseJson' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Response\JsonResponse"
										),
										'JPlugin' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Plugin\CMSPlugin"
										),
										'JPluginHelper' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Plugin\PluginHelper"
										),
										'JMenu' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Menu\AbstractMenu"
										),
										'JMenuAdministrator' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Menu\AdministratorMenu"
										),
										'JMenuItem' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Menu\MenuItem"
										),
										'JMenuSite' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Menu\SiteMenu"
										),
										'JPagination' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Pagination\Pagination"
										),
										'JPaginationObject' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Pagination\PaginationObject"
										),
										'JPathway' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Pathway\Pathway"
										),
										'JPathwaySite' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Pathway\SitePathway"
										),
										'JSchemaChangeitem' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Schema\ChangeItem"
										),
										'JSchemaChangeset' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Schema\ChangeSet"
										),
										'JSchemaChangeitemMysql' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Schema\ChangeItem\MysqlChangeItem"
										),
										'JSchemaChangeitemPostgresql' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Schema\ChangeItem\PostgresqlChangeItem"
										),
										'JSchemaChangeitemSqlsrv' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Schema\ChangeItem\SqlsrvChangeItem"
										),
										'JUcm' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\UCM\UCM"
										),
										'JUcmBase' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\UCM\UCMBase"
										),
										'JUcmContent' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\UCM\UCMContent"
										),
										'JUcmType' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\UCM\UCMType"
										),
										'JToolbar' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Toolbar\Toolbar"
										),
										'JToolBar' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Toolbar\Toolbar"
										),
										'JToolbarButton' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Toolbar\ToolbarButton"
										),
										'JToolbarButtonConfirm' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Toolbar\Button\ConfirmButton"
										),
										'JToolbarButtonCustom' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Toolbar\Button\CustomButton"
										),
										'JToolbarButtonHelp' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Toolbar\Button\HelpButton"
										),
										'JToolbarButtonLink' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Toolbar\Button\LinkButton"
										),
										'JToolbarButtonPopup' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Toolbar\Button\PopupButton"
										),
										'JToolbarButtonSeparator' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Toolbar\Button\SeparatorButton"
										),
										'JToolbarButtonSlider' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Toolbar\Button\SliderButton"
										),
										'JToolbarButtonStandard' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Toolbar\Button\StandardButton"
										),
										'JToolbarButtonStandard' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Toolbar\Button\StandardButton"
										),
										'JButton' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Toolbar\ToolbarButton"
										),
										'JVersion' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Version"
										),
										'JAuthentication' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Authentication\Authentication"
										),
										'JAuthenticationResponse' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Authentication\AuthenticationResponse"
										),
										'JBrowser' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Environment\Browser"
										),
										'JAssociationExtensionInterface' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Association\AssociationExtensionInterface"
										),
										'JAssociationExtensionHelper' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Association\AssociationExtensionHelper"
										),
										'JDocument' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Document\Document"
										),
										'JDocumentError' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Document\ErrorDocument"
										),
										'JDocumentFeed' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Document\FeedDocument"
										),
										'JDocumentHtml' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Document\HtmlDocument"
										),
										'JDocumentImage' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Document\ImageDocument"
										),
										'JDocumentJson' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Document\JsonDocument"
										),
										'JDocumentOpensearch' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Document\OpensearchDocument"
										),
										'JDocumentRaw' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Document\RawDocument"
										),
										'JDocumentRenderer' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Document\DocumentRenderer"
										),
										'JDocumentXml' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Document\XmlDocument"
										),
										'JDocumentRendererFeedAtom' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Document\Renderer\Feed\AtomRenderer"
										),
										'JDocumentRendererFeedRss' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Document\Renderer\Feed\RssRenderer"
										),
										'JDocumentRendererHtmlComponent' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Document\Renderer\Html\ComponentRenderer"
										),
										'JDocumentRendererHtmlHead' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Document\Renderer\Html\HeadRenderer"
										),
										'JDocumentRendererHtmlMessage' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Document\Renderer\Html\MessageRenderer"
										),
										'JDocumentRendererHtmlModule' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Document\Renderer\Html\ModuleRenderer"
										),
										'JDocumentRendererHtmlModules' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Document\Renderer\Html\ModulesRenderer"
										),
										'JDocumentRendererAtom' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "\Joomla\CMS\Document\Renderer\Feed\AtomRenderer"
										),
										'JDocumentRendererRSS' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "\Joomla\CMS\Document\Renderer\Feed\RssRenderer"
										),
										'JDocumentRendererComponent' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "\Joomla\CMS\Document\Renderer\Html\ComponentRenderer"
										),
										'JDocumentRendererHead' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "\Joomla\CMS\Document\Renderer\Html\HeadRenderer"
										),
										'JDocumentRendererMessage' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "\Joomla\CMS\Document\Renderer\Html\MessageRenderer"
										),
										'JDocumentRendererModule' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "\Joomla\CMS\Document\Renderer\Html\ModuleRenderer"
										),
										'JDocumentRendererModules' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "\Joomla\CMS\Document\Renderer\Html\ModulesRenderer"
										),
										'JFeedEnclosure' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Document\Feed\FeedEnclosure"
										),
										'JFeedImage' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Document\Feed\FeedImage"
										),
										'JFeedItem' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Document\Feed\FeedItem"
										),
										'JOpenSearchImage' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Document\Opensearch\OpensearchImage"
										),
										'JOpenSearchUrl' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Document\Opensearch\OpensearchUrl"
										),
										'JFilterInput' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Filter\InputFilter"
										),
										'JFilterOutput' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Filter\OutputFilter"
										),
										'JFilterWrapperOutput' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "\Joomla\CMS\Filter\Wrapper\OutputFilterWrapper"
										),
										'JHttp' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Http\Http"
										),
										'JHttpFactory' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Http\HttpFactory"
										),
										'JHttpResponse' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Http\Response"
										),
										'JHttpTransport' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Http\TransportInterface"
										),
										'JHttpTransportCurl' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Http\Transport\CurlTransport"
										),
										'JHttpTransportSocket' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Http\Transport\SocketTransport"
										),
										'JHttpTransportStream' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Http\Transport\StreamTransport"
										),
										'JHttpWrapperFactory' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "\Joomla\CMS\Http\Wrapper\FactoryWrapper"
										),
										'JInstaller' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Installer\Installer"
										),
										'JInstallerAdapter' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Installer\InstallerAdapter"
										),
										'JInstallerExtension' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Installer\InstallerExtension"
										),
										'JExtension' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Installer\InstallerExtension"
										),
										'JInstallerHelper' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Installer\InstallerHelper"
										),
										'JInstallerScript' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Installer\InstallerScript"
										),
										'JInstallerManifest' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Installer\Manifest"
										),
										'JInstallerAdapterComponent' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Installer\Adapter\ComponentAdapter"
										),
										'JInstallerComponent' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Installer\Adapter\ComponentAdapter"
										),
										'JInstallerAdapterFile' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Installer\Adapter\FileAdapter"
										),
										'JInstallerFile' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Installer\Adapter\FileAdapter"
										),
										'JInstallerAdapterLanguage' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Installer\Adapter\LanguageAdapter"
										),
										'JInstallerLanguage' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Installer\Adapter\LanguageAdapter"
										),
										'JInstallerAdapterLibrary' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Installer\Adapter\LibraryAdapter"
										),
										'JInstallerLibrary' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Installer\Adapter\LibraryAdapter"
										),
										'JInstallerAdapterModule' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Installer\Adapter\ModuleAdapter"
										),
										'JInstallerModule' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Installer\Adapter\ModuleAdapter"
										),
										'JInstallerAdapterPackage' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Installer\Adapter\PackageAdapter"
										),
										'JInstallerPackage' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Installer\Adapter\PackageAdapter"
										),
										'JInstallerAdapterPlugin' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Installer\Adapter\PluginAdapter"
										),
										'JInstallerPlugin' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Installer\Adapter\PluginAdapter"
										),
										'JInstallerAdapterTemplate' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Installer\Adapter\TemplateAdapter"
										),
										'JInstallerTemplate' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Installer\Adapter\TemplateAdapter"
										),
										'JInstallerManifestLibrary' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Installer\Manifest\LibraryManifest"
										),
										'JInstallerManifestPackage' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Installer\Manifest\PackageManifest"
										),
										'JRouterAdministrator' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Router\AdministratorRouter"
										),
										'JRoute' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Router\Route"
										),
										'JRouter' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Router\Router"
										),
										'JRouterSite' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Router\SiteRouter"
										),
										'JCategories' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Categories\Categories"
										),
										'JCategoryNode' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Categories\CategoryNode"
										),
										'JDate' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Date\Date"
										),
										'JLog' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Log\Log"
										),
										'JLogEntry' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Log\LogEntry"
										),
										'JLogLogger' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Log\Logger"
										),
										'JLogger' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Log\Logger"
										),
										'JLogLoggerCallback' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Log\Logger\CallbackLogger"
										),
										'JLogLoggerDatabase' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Log\Logger\DatabaseLogger"
										),
										'JLogLoggerEcho' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Log\Logger\EchoLogger"
										),
										'JLogLoggerFormattedtext' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Log\Logger\FormattedtextLogger"
										),
										'JLogLoggerMessagequeue' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Log\Logger\MessagequeueLogger"
										),
										'JLogLoggerSyslog' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Log\Logger\SyslogLogger"
										),
										'JLogLoggerW3c' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Log\Logger\W3cLogger"
										),
										'JProfiler' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Profiler\Profiler"
										),
										'JUri' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Uri\Uri"
										),
										'JCache' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Cache\Cache"
										),
										'JCacheController' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Cache\CacheController"
										),
										'JCacheStorage' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Cache\CacheStorage"
										),
										'JCacheControllerCallback' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Cache\Controller\CallbackController"
										),
										'JCacheControllerOutput' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Cache\Controller\OutputController"
										),
										'JCacheControllerPage' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Cache\Controller\PageController"
										),
										'JCacheControllerView' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Cache\Controller\ViewController"
										),
										'JCacheStorageApc' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Cache\Storage\ApcStorage"
										),
										'JCacheStorageApcu' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Cache\Storage\ApcuStorage"
										),
										'JCacheStorageHelper' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Cache\Storage\CacheStorageHelper"
										),
										'JCacheStorageCachelite' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Cache\Storage\CacheliteStorage"
										),
										'JCacheStorageFile' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Cache\Storage\FileStorage"
										),
										'JCacheStorageMemcached' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Cache\Storage\MemcachedStorage"
										),
										'JCacheStorageMemcache' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Cache\Storage\MemcacheStorage"
										),
										'JCacheStorageRedis' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Cache\Storage\RedisStorage"
										),
										'JCacheStorageWincache' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Cache\Storage\WincacheStorage"
										),
										'JCacheStorageXcache' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Cache\Storage\XcacheStorage"
										),
										'JCacheException' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Cache\Exception\CacheExceptionInterface"
										),
										'JCacheExceptionConnecting' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Cache\Exception\CacheConnectingException"
										),
										'JCacheExceptionUnsupported' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Cache\Exception\UnsupportedCacheException"
										),
										'JSession' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Session\Session"
										),
										'JSessionExceptionUnsupported' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Session\Exception\UnsupportedStorageException"
										),
										'JUser' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\User\User"
										),
										'JUserHelper' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\User\UserHelper"
										),
										'JUserWrapperHelper' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "\Joomla\CMS\User\UserWrapper"
										),
										'JForm' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Form\Form"
										),
										'JFormField' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Form\FormField"
										),
										'JFormHelper' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Form\FormHelper"
										),
										'JFormRule' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Form\FormRule"
										),
										'JFormWrapper' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "\Joomla\CMS\Form\FormWrapper"
										),
										'JFormFieldAuthor' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Form\Field\AuthorField"
										),
										'JFormFieldCaptcha' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Form\Field\CaptchaField"
										),
										'JFormFieldChromeStyle' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Form\Field\ChromestyleField"
										),
										'JFormFieldContenthistory' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Form\Field\ContenthistoryField"
										),
										'JFormFieldContentlanguage' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Form\Field\ContentlanguageField"
										),
										'JFormFieldContenttype' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Form\Field\ContenttypeField"
										),
										'JFormFieldEditor' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Form\Field\EditorField"
										),
										'JFormFieldFrontend_Language' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Form\Field\FrontendlanguageField"
										),
										'JFormFieldHeadertag' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Form\Field\HeadertagField"
										),
										'JFormFieldHelpsite' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Form\Field\HelpsiteField"
										),
										'JFormFieldLastvisitDateRange' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Form\Field\LastvisitdaterangeField"
										),
										'JFormFieldLimitbox' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Form\Field\LimitboxField"
										),
										'JFormFieldMedia' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Form\Field\MediaField"
										),
										'JFormFieldMenu' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Form\Field\MenuField"
										),
										'JFormFieldMenuitem' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Form\Field\MenuitemField"
										),
										'JFormFieldModuleOrder' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Form\Field\ModuleorderField"
										),
										'JFormFieldModulePosition' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Form\Field\ModulepositionField"
										),
										'JFormFieldModuletag' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Form\Field\ModuletagField"
										),
										'JFormFieldOrdering' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Form\Field\OrderingField"
										),
										'JFormFieldPlugin_Status' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Form\Field\PluginstatusField"
										),
										'JFormFieldRedirect_Status' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Form\Field\RedirectStatusField"
										),
										'JFormFieldRegistrationDateRange' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Form\Field\RegistrationdaterangeField"
										),
										'JFormFieldStatus' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Form\Field\StatusField"
										),
										'JFormFieldTag' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Form\Field\TagField"
										),
										'JFormFieldTemplatestyle' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Form\Field\TemplatestyleField"
										),
										'JFormFieldUserActive' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Form\Field\UseractiveField"
										),
										'JFormFieldUserGroupList' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Form\Field\UsergrouplistField"
										),
										'JFormFieldUserState' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Form\Field\UserstateField"
										),
										'JFormFieldUser' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Form\Field\UserField"
										),
										'JFormRuleBoolean' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Form\Rule\BooleanRule"
										),
										'JFormRuleCalendar' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Form\Rule\CalendarRule"
										),
										'JFormRuleCaptcha' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Form\Rule\CaptchaRule"
										),
										'JFormRuleColor' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Form\Rule\ColorRule"
										),
										'JFormRuleEmail' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Form\Rule\EmailRule"
										),
										'JFormRuleEquals' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Form\Rule\EqualsRule"
										),
										'JFormRuleNotequals' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Form\Rule\NotequalsRule"
										),
										'JFormRuleNumber' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Form\Rule\NumberRule"
										),
										'JFormRuleOptions' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Form\Rule\OptionsRule"
										),
										'JFormRulePassword' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Form\Rule\PasswordRule"
										),
										'JFormRuleRules' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Form\Rule\RulesRule"
										),
										'JFormRuleTel' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Form\Rule\TelRule"
										),
										'JFormRuleUrl' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Form\Rule\UrlRule"
										),
										'JFormRuleUsername' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Form\Rule\UsernameRule"
										),
										'JMicrodata' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Microdata\Microdata"
										),
										'JFactory' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Factory"
										),
										'JMail' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Mail\Mail"
										),
										'JMailHelper' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Mail\MailHelper"
										),
										'JMailWrapperHelper' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "\Joomla\CMS\Mail\MailWrapper"
										),
										'JClientHelper' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Client\ClientHelper"
										),
										'JClientWrapperHelper' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Client\ClientWrapper"
										),
										'JClientFtp' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Client\FtpClient"
										),
										'JFTP' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "\Joomla\CMS\Client\FtpClient"
										),
										'JClientLdap' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\Ldap\LdapClient"
										),
										'JLDAP' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "\Joomla\Ldap\LdapClient"
										),
										'JUpdate' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Updater\Update"
										),
										'JUpdateAdapter' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Updater\UpdateAdapter"
										),
										'JUpdater' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Updater\Updater"
										),
										'JUpdaterCollection' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Updater\Adapter\CollectionAdapter"
										),
										'JUpdaterExtension' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Updater\Adapter\ExtensionAdapter"
										),
										'JCrypt' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Crypt\Crypt"
										),
										'JCryptCipher' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Crypt\CipherInterface"
										),
										'JCryptKey' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Crypt\Key"
										),
										'JCryptPassword' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "\Joomla\CMS\Crypt\CryptPassword"
										),
										'JCryptCipherBlowfish' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "\Joomla\CMS\Crypt\Cipher\BlowfishCipher"
										),
										'JCryptCipherCrypto' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Crypt\Cipher\CryptoCipher"
										),
										'JCryptCipherMcrypt' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "\Joomla\CMS\Crypt\Cipher\McryptCipher"
										),
										'JCryptCipherRijndael256' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "\Joomla\CMS\Crypt\Cipher\Rijndael256Cipher"
										),
										'JCryptCipherSimple' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "\Joomla\CMS\Crypt\Cipher\SimpleCipher"
										),
										'JCryptCipherSodium' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Crypt\Cipher\SodiumCipher"
										),
										'JCryptCipher3Des' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "\Joomla\CMS\Crypt\Cipher\TripleDesCipher"
										),
										'JCryptPasswordSimple' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "\Joomla\CMS\Crypt\Password\SimpleCryptPassword"
										),
										'JStringPunycode' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\String\PunycodeHelper"
										),
										'JBuffer' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Utility\BufferStreamHandler"
										),
										'JUtility' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Utility\Utility"
										),
										'JInputCli' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Input\Cli"
										),
										'JInputCookie' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Input\Cookie"
										),
										'JInputFiles' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Input\Files"
										),
										'JInput' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Input\Input"
										),
										'JInputJSON' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Input\Json"
										),
										'JFeed' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Feed\Feed"
										),
										'JFeedEntry' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Feed\FeedEntry"
										),
										'JFeedFactory' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Feed\FeedFactory"
										),
										'JFeedLink' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Feed\FeedLink"
										),
										'JFeedParser' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Feed\FeedParser"
										),
										'JFeedPerson' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Feed\FeedPerson"
										),
										'JFeedParserAtom' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Feed\Parser\AtomParser"
										),
										'JFeedParserNamespace' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Feed\Parser\NamespaceParserInterface"
										),
										'JFeedParserRss' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Feed\Parser\RssParser"
										),
										'JFeedParserRssItunes' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Feed\Parser\Rss\ItunesRssParser"
										),
										'JFeedParserRssMedia' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Feed\Parser\Rss\MediaRssParser"
										),
										'JImage' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Image\Image"
										),
										'JImageFilter' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Image\ImageFilter"
										),
										'JImageFilterBackgroundfill' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\Image\Filter\Backgroundfill"
										),
										'JImageFilterBrightness' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\Image\Filter\Brightness"
										),
										'JImageFilterContrast' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\Image\Filter\Contrast"
										),
										'JImageFilterEdgedetect' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\Image\Filter\Edgedetect"
										),
										'JImageFilterEmboss' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\Image\Filter\Emboss"
										),
										'JImageFilterNegate' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\Image\Filter\Negate"
										),
										'JImageFilterSketchy' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\Image\Filter\Sketchy"
										),
										'JImageFilterSmooth' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\Image\Filter\Smooth"
										),
										'JObject' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Object\CMSObject"
										),
										'JExtensionHelper' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\Extension\ExtensionHelper"
										),
										'JHtml' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "\Joomla\CMS\HTML\HTMLHelper"
										),
										'JLessFormatterJoomla' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 without replacement"
										),
										'JLess' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 without replacement"
										),
										'JHtmlRules' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 "
										),
										'JHtmlTabs' => array(
											'3.7.0' => false,
											'4.0' => true,
											'alternative' => "3.7.0 These helpers are dependent on the deprecated MooTools support"
										),
										'JHtmlSliders' => array(
											'3.7.0' => false,
											'4.0' => true,
											'alternative' => "3.7.0 These helpers are dependent on the deprecated MooTools support"
										),
										'JHtmlBatch' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use JLayout directly"
										),
										'JSessionStorageMemcache' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 The CMS' Session classes will be replaced with the <code>joomla/session</code> package"
										),
										'JSessionStorageMemcached' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 The CMS' Session classes will be replaced with the <code>joomla/session</code> package"
										),
										'JSessionStorageApc' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 The CMS' Session classes will be replaced with the <code>joomla/session</code> package"
										),
										'JSessionStorageDatabase' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 The CMS' Session classes will be replaced with the <code>joomla/session</code> package"
										),
										'JSessionStorageXcache' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 The CMS' Session classes will be replaced with the <code>joomla/session</code> package"
										),
										'JSessionStorageWincache' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 The CMS' Session classes will be replaced with the <code>joomla/session</code> package"
										),
										'JSessionStorageNone' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 The CMS' Session classes will be replaced with the <code>joomla/session</code> package"
										),
										'JSessionStorage' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 The CMS' Session classes will be replaced with the <code>joomla/session</code> package"
										),
										'JSessionHandlerNative' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 The CMS' Session classes will be replaced with the <code>joomla/session</code> package"
										),
										'JSessionHandlerInterface' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 The CMS' Session classes will be replaced with the <code>joomla/session</code> package"
										),
										'JSessionHandlerJoomla' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 The CMS' Session classes will be replaced with the <code>joomla/session</code> package"
										),
										'JKeychain' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Deprecated without replacement"
										),
										'JArchiveGzip' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 use the Joomla\Archive\Gzip class instead"
										),
										'JArchiveWrapperArchive' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 use the Joomla\Archive\Archive class instead"
										),
										'JArchiveBzip2' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 use the Joomla\Archive\Bzip2 class instead"
										),
										'JArchiveExtractable' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 use the Joomla\Archive\ExtractableInterface interface instead"
										),
										'JArchiveZip' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 use the Joomla\Archive\Zip class instead"
										),
										'JArchiveTar' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 use the Joomla\Archive\Tar class instead"
										),
										'JArchive' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 use the Joomla\Archive\Archive class instead"
										),
										'JGoogleAuth' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/google</code> package via Composer instead"
										),
										'JGoogleEmbed' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/google</code> package via Composer instead"
										),
										'JGoogleDataAdsense' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/google</code> package via Composer instead"
										),
										'JGoogleDataPicasaAlbum' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/google</code> package via Composer instead"
										),
										'JGoogleDataPicasaPhoto' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/google</code> package via Composer instead"
										),
										'JGoogleDataPicasa' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/google</code> package via Composer instead"
										),
										'JGoogleDataPlus' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/google</code> package via Composer instead"
										),
										'JGoogleDataPlusPeople' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/google</code> package via Composer instead"
										),
										'JGoogleDataPlusComments' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/google</code> package via Composer instead"
										),
										'JGoogleDataPlusActivities' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/google</code> package via Composer instead"
										),
										'JGoogleDataCalendar' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/google</code> package via Composer instead"
										),
										'JGoogle' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/google</code> package via Composer instead"
										),
										'JGoogleEmbedAnalytics' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/google</code> package via Composer instead"
										),
										'JGoogleEmbedMaps' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/google</code> package via Composer instead"
										),
										'JGoogleData' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/google</code> package via Composer instead"
										),
										'JGoogleAuthOauth2' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/google</code> package via Composer instead"
										),
										'JFormFieldRepeatable' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use JFormFieldSubform"
										),
										'JFormFieldUsergroup' => array(
											'3.5' => false,
											'4.0' => true,
											'alternative' => "3.5 "
										),
										'JFacebookAlbum' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/facebook</code> package via Composer instead"
										),
										'JFacebookObject' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/facebook</code> package via Composer instead"
										),
										'JFacebookOAuth' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/facebook</code> package via Composer instead"
										),
										'JFacebookNote' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/facebook</code> package via Composer instead"
										),
										'JFacebookLink' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/facebook</code> package via Composer instead"
										),
										'JFacebookUser' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/facebook</code> package via Composer instead"
										),
										'JFacebookComment' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/facebook</code> package via Composer instead"
										),
										'JFacebookGroup' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/facebook</code> package via Composer instead"
										),
										'JFacebookPost' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/facebook</code> package via Composer instead"
										),
										'JFacebookStatus' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/facebook</code> package via Composer instead"
										),
										'JFacebookEvent' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/facebook</code> package via Composer instead"
										),
										'JFacebookCheckin' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/facebook</code> package via Composer instead"
										),
										'JFacebook' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/facebook</code> package via Composer instead"
										),
										'JFacebookPhoto' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/facebook</code> package via Composer instead"
										),
										'JFacebookVideo' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/facebook</code> package via Composer instead"
										),
										'JOAuth1Client' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/oauth1</code> framework package that will be bundled instead"
										),
										'JTwitterBlock' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/twitter</code> package via Composer instead"
										),
										'JTwitterObject' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/twitter</code> package via Composer instead"
										),
										'JTwitterOAuth' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/twitter</code> package via Composer instead"
										),
										'JTwitterStatuses' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/twitter</code> package via Composer instead"
										),
										'JTwitterDirectmessages' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/twitter</code> package via Composer instead"
										),
										'JTwitter' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/twitter</code> package via Composer instead"
										),
										'JTwittersearch' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/twitter</code> package via Composer instead"
										),
										'JTwitterFriends' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/twitter</code> package via Composer instead"
										),
										'JTwitterPlaces' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/twitter</code> package via Composer instead"
										),
										'JTwitterProfile' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/twitter</code> package via Composer instead"
										),
										'JTwitterTrends' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/twitter</code> package via Composer instead"
										),
										'JTwitterHelp' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/twitter</code> package via Composer instead"
										),
										'JTwitterLists' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/twitter</code> package via Composer instead"
										),
										'JTwitterUsers' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/twitter</code> package via Composer instead"
										),
										'JTwitterFavorites' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/twitter</code> package via Composer instead"
										),
										'JOAuth2Client' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/oauth2</code> framework package that will be bundled instead"
										),
										'JEventDispatcher' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 The CMS' Event classes will be replaced with the <code>joomla/event</code> package"
										),
										'JEvent' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 The CMS' Event classes will be replaced with the <code>joomla/event</code> package"
										),
										'JGithub' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubObject' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubStatuses' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubMilestones' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubPackageRepositories' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubPackageGitignore' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubPackageMarkdown' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubPackageSearch' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubPackageActivity' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubPackageIssues' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubPackageDataTrees' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubPackageDataTags' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubPackageDataRefs' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubPackageDataCommits' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubPackageDataBlobs' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubPackagePulls' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubPackageOrgsMembers' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubPackageOrgsTeams' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubPackageUsersKeys' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubPackageUsersFollowers' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubPackageUsersEmails' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubPackageGists' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubPackageActivityEvents' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubPackageActivityWatching' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubPackageActivityStarring' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubPackageActivityNotifications' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubPackageData' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubPackageAuthorization' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubPackagePullsComments' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubPackageUsers' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubPackageGistsComments' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubPackageOrgs' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubPackageIssuesAssignees' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubPackageIssuesEvents' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubPackageIssuesMilestones' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubPackageIssuesComments' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubPackageIssuesLabels' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubPackageRepositoriesContents' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubPackageRepositoriesStatistics' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubPackageRepositoriesStatuses' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubPackageRepositoriesDownloads' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubPackageRepositoriesMerging' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubPackageRepositoriesCollaborators' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubPackageRepositoriesComments' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubPackageRepositoriesKeys' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubPackageRepositoriesHooks' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubPackageRepositoriesForks' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubPackageRepositoriesCommits' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubMeta' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubPackage' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubHttp' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubRefs' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubAccount' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubHooks' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubForks' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JGithubCommits' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/github</code> package via Composer instead"
										),
										'JRouteWrapperRoute' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Will be removed without replacement"
										),
										'JDatabaseDriverMysql' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use MySQLi or PDO MySQL instead"
										),
										'JDatabaseImporterMysql' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use MySQLi or PDO MySQL instead"
										),
										'JDatabaseQueryMysql' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use MySQLi or PDO MySQL instead"
										),
										'JDatabase' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "13.3 (Platform) &amp; 4.0 (CMS)"
										),
										'JDatabaseExporterMysql' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use MySQLi or PDO MySQL instead"
										),
										'JDatabaseIteratorMysql' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use MySQLi or PDO MySQL instead"
										),
										'JOpenstreetmapInfo' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/openstreetmap</code> package via Composer instead"
										),
										'JOpenstreetmapObject' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/openstreetmap</code> package via Composer instead"
										),
										'JOpenstreetmapOauth' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/openstreetmap</code> package via Composer instead"
										),
										'JOpenstreetmapUser' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/openstreetmap</code> package via Composer instead"
										),
										'JOpenstreetmap' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/openstreetmap</code> package via Composer instead"
										),
										'JOpenstreetmapElements' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/openstreetmap</code> package via Composer instead"
										),
										'JOpenstreetmapChangesets' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/openstreetmap</code> package via Composer instead"
										),
										'JOpenstreetmapGps' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the <code>joomla/openstreetmap</code> package via Composer instead"
										),
										'JArrayHelper' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use Joomla\Utilities\ArrayHelper instead"
										),
										'JPlatform' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Deprecated without replacement"
										),
										'JString' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use {@link \Joomla\String\StringHelper} instead unless otherwise noted."
										),
										'JStringWrapperPunycode' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Will be removed without replacement"
										),
										'JStringWrapperNormalise' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Will be removed without replacement"
										),
										'JApplicationWebRouterRest' => array(
											'3.7.0' => false,
											'4.0' => true,
											'alternative' => "3.7.0 Use the <code>joomla/router</code> package via Composer instead"
										),
										'JApplicationWebRouterBase' => array(
											'3.7.0' => false,
											'4.0' => true,
											'alternative' => "3.7.0 Use the <code>joomla/router</code> package via Composer instead"
										),
										'JApplicationWebRouter' => array(
											'3.7.0' => false,
											'4.0' => true,
											'alternative' => "3.7.0 Use the <code>joomla/router</code> package via Composer instead"
										),
										'JGrid' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 This class will be removed without any replacement"
										),
										'JERROR_ILLEGAL_OPTIONS' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 "
										),
										'JERROR_CALLBACK_NOT_CALLABLE' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 "
										),
										'JERROR_ILLEGAL_MODE' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 "
										),
										'JError' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Will be removed without replacement"
										),
										'JDispatcher' => array(
											'3.0' => false,
											'4.0' => true,
											'alternative' => "3.0 "
										),
										'JRequest' => array(
											'1.7' => false,
											'4.0' => true,
											'alternative' => "1.7 Get the JInput object from the application instead"
										),
										'JException' => array(
											'1.7' => false,
											'4.0' => true,
											'alternative' => "1.7 "
										),
										'JResponse' => array(
											'1.5' => false,
											'4.0' => true,
											'alternative' => "1.5 Use JApplicationWeb instead"
										),
										'JTableSession' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 Use SQL queries to interact with the session table."
										),
										'JSimplecrypt' => array(
											'2.5.5' => false,
											'4.0' => true,
											'alternative' => "2.5.5 Use JCrypt instead."
										),
										'JSimplepieFactory' => array(
											'3.0' => false,
											'4.0' => true,
											'alternative' => "3.0 Use JFeed or supply your own methods"
										),
										'JDatabaseException' => array(
											'2.5.5' => false,
											'4.0' => true,
											'alternative' => "2.5.5 "
										),
										'JDatabaseSqlazure' => array(
											'3.0' => false,
											'4.0' => true,
											'alternative' => "3.0 Use JDatabaseDriverSqlazure instead."
										),
										'JDatabaseMysqli' => array(
											'3.0' => false,
											'4.0' => true,
											'alternative' => "3.0 Use JDatabaseDriverMysqli instead."
										),
										'JDatabaseSqlsrv' => array(
											'3.0' => false,
											'4.0' => true,
											'alternative' => "3.0 Use JDatabaseDriverSqlsrv instead."
										),
										'JDatabaseMysql' => array(
											'3.0' => false,
											'4.0' => true,
											'alternative' => "3.0 Use JDatabaseDriverMysql instead."
										),
										'JXMLElement' => array(
											'3.0' => false,
											'4.0' => true,
											'alternative' => "3.0 Use SimpleXMLElement instead."
										),
										'LogException' => array(
											'2.5.5' => false,
											'4.0' => true,
											'alternative' => "2.5.5 Use semantic exceptions instead"
										),
										'JNode' => array(
											'3.0' => false,
											'4.0' => true,
											'alternative' => "3.0 "
										),
										'JTree' => array(
											'3.0' => false,
											'4.0' => true,
											'alternative' => "3.0 "
										),
										'JObservable' => array(
											'2.5' => false,
											'4.0' => true,
											'alternative' => "2.5 "
										),
										'JObserver' => array(
											'2.5' => false,
											'4.0' => true,
											'alternative' => "2.5 "
										),
										'JApplication' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 Use CMSApplication instead unless specified otherwise"
										),
										'\Joomla\CMS\User\UserWrapper' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>Joomla\CMS\User\UserHelper</code> directly"
										),
										'\Joomla\CMS\Image\Image' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "5.0 Use the class \Joomla\Image\Image instead"
										),
										'\Joomla\CMS\Image\ImageFilter' => array(
											'4.0' => false,
											'5.0 ' => true,
											'alternative' => "5.0 Use Joomla\Image\ImageFilter instead."
										),
										'\Joomla\CMS\Extension\ExtensionHelper' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Replace class with a non static methods for better testing"
										),
										'\Joomla\CMS\Filter\Wrapper\OutputFilterWrapper' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>Joomla\CMS\Filter\OutputFilter</code> directly"
										),
										'\Joomla\CMS\Table\Content' => array(
											'3.1.4' => false,
											'4.0' => true,
											'alternative' => "3.1.4 Class will be removed upon completion of transition to UCM"
										),
										'\Joomla\CMS\Crypt\Cipher\McryptCipher' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Without replacment use CryptoCipher"
										),
										'\Joomla\CMS\Crypt\Cipher\BlowfishCipher' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Without replacment use CryptoCipher"
										),
										'\Joomla\CMS\Crypt\Cipher\Rijndael256Cipher' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Without replacment use CryptoCipher"
										),
										'\Joomla\CMS\Crypt\Cipher\TripleDesCipher' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Without replacement use CryptoCipher"
										),
										'\Joomla\CMS\Crypt\Cipher\SimpleCipher' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 (CMS)"
										),
										'\Joomla\CMS\Crypt\CryptPassword' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use PHP 5.5's native password hashing API"
										),
										'\Joomla\CMS\Crypt\Password\SimpleCryptPassword' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use PHP 5.5's native password hashing API"
										),
										'\Joomla\CMS\Language\Wrapper\LanguageHelperWrapper' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>Joomla\CMS\Language\LanguageHelper</code> directly"
										),
										'\Joomla\CMS\Language\Wrapper\TransliterateWrapper' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>Joomla\CMS\Language\Transliterate</code> directly"
										),
										'\Joomla\CMS\Language\Wrapper\JTextWrapper' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>JText</code> directly"
										),
										'\Joomla\CMS\Mail\MailWrapper' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Will be removed without replacement"
										),
										'\Joomla\CMS\Form\FormWrapper' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>Joomla\CMS\Form\FormHelper</code> directly"
										),
										'\Joomla\CMS\Cache\Storage\CacheliteStorage' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Deprecated without replacement"
										),
										'\Joomla\CMS\Input\Cli' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "5.0 Use Joomla\Input\Cli instead"
										),
										'\Joomla\CMS\Input\Cookie' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "5.0 Use Joomla\Input\Cookie instead"
										),
										'\Joomla\CMS\Input\Files' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "5.0 Use Joomla\Input\Files instead"
										),
										'\Joomla\CMS\Input\Json' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "5.0 Use Joomla\Input\Json instead"
										),
										'\Joomla\CMS\Input\Input' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "5.0 Use Joomla\Input\Input instead"
										),
										'\Joomla\CMS\Object\CMSObject' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 "
										),
										'\Joomla\CMS\Access\Wrapper\Access' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>Joomla\CMS\Access\Access</code> directly"
										),
										'\Joomla\CMS\Client\ClientWrapper' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Will be removed without replacement"
										),
										'\Joomla\Session\Storage\Database' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 The Storage class chain will be removed"
										),
										'\Joomla\Session\Storage\Memcache' => array(
											'420' => false,
											'4.0' => true,
											'alternative' => "2.0 The Storage class chain will be removed"
										),
										'\Joomla\Session\Storage\Xcache' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 The Storage class chain will be removed"
										),
										'\Joomla\Session\Storage\Memcached' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 The Storage class chain will be removed"
										),
										'\Joomla\Session\Storage\Wincache' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 The Storage class chain will be removed"
										),
										'\Joomla\Session\Storage\Apc' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 The Storage class chain will be removed."
										),
										'\Joomla\Session\Storage\None' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 The Storage class chain will be removed"
										),
										'\Joomla\Session\Storage' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 The Storage class chain will be removed."
										),
										'\Joomla\Registry\AbstractRegistryFormat' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 Format objects should directly implement the FormatInterface"
										),
										'\Joomla\String\String' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 Use StringHelper instead"
										),
										'\Joomla\Filesystem\Stream\String' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 Use StringWrapper instead"
										),
										'\Joomla\Application\Cli\ColorProcessor' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 Use \Joomla\Application\Cli\Output\Processor\ColorProcessor"
										),
										'\Joomla\Application\AbstractDaemonApplication' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 Deprecated without replacement"
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
	 * <rule ref="Joomla.Sniffs.Deprecated.DeprecatedClassesSniff">
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

		// If deprecated sniff is disabed ('0') return with checking for deprecated classes
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

		// Check for T_DOUBLE_COLON and T_EXTENDS
		if ($tokens[$stackPtr + 1]['code'] !== T_DOUBLE_COLON && $tokens[$stackPtr - 2]['code'] !== T_EXTENDS)
		{
			return;
		}

		$class = strtolower($tokens[$stackPtr]['content']);
		$pattern  = null;

		if ($this->patternMatch === true)
		{
			$count   = 0;
			$pattern = preg_replace(
				$this->forbiddenFunctionNames,
				$this->forbiddenFunctionNames,
				$class,
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
			if (in_array($class, $this->forbiddenFunctionNames) === false)
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
	 * @param   string               $class     The name of the forbidden function.
	 * @param   string               $pattern   The pattern used for the match.
	 *
	 * @return void
	 */
	protected function addError($phpcsFile, $stackPtr, $class, $pattern=null)
	{
		$versionCheck = false;
		$error = 'The use of class ' . $class . ' is ';

		if ($pattern === null)
		{
			$pattern = strtolower($class);
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
				$error .= '; Use ' . $this->forbiddenFunctions[$pattern]['alternative'] . ' instead.';
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

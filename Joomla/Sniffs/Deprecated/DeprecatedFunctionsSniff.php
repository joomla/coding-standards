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
	 * SOURCE: https://api.joomla.org/cms-3/deprecated.html

	 * The array lists : version number with 0 (deprecated) or 1 (forbidden) and an alternative function.
	 * If no alternative exists, it is NULL. IE, the function should just not be used.
	 *
	 * @var array(string => array(string => int|string|null))
	 */
	public $forbiddenFunctions = array(
										'JLoader::loadByPsr0()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 this method will be removed"
										),
										'JHtmlBootstrap::affix()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Bootstrap 4.0 dropped this so will Joomla."
										),
										'JHtmlBootstrap::modal()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 No replacement, use Bootstrap tooltips."
										),
										'JHtmlBootstrap::typeahead()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Bootstrap 4.0 dropped this so will Joomla."
										),
										'JHtmlBootstrap::startPane()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use JHtml::_('bootstrap.startTabSet') instead."
										),
										'JHtmlBootstrap::endPane()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use JHtml::_('bootstrap.endTabSet') instead."
										),
										'JHtmlBootstrap::addPanel()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use JHtml::_('bootstrap.addTab') instead."
										),
										'JHtmlBootstrap::endPanel()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use JHtml::_('bootstrap.endTab') instead."
										),
										'JHtmlBehavior::framework()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Update scripts to jquery"
										),
										'JHtmlBehavior::modal()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the modal equivalent from bootstrap"
										),
										'JHtmlBehavior::calendar()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 "
										),
										'JHtmlBehavior::colorpicker()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use directly the field or the layout"
										),
										'JHtmlBehavior::simplecolorpicker()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use directly the field or the layout"
										),
										'JHtmlBehavior::noframes()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Add a X-Frame-Options HTTP Header with the SAMEORIGIN value instead."
										),
										'JHtmlBehavior::_getJSObject()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "13.3 (Platform) & 4.0 (CMS) - Use JHtml::getJSObject() instead."
										),
										'JHtmlRules::assetFormWidget()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 "
										),
										'JHtmlRules::_getParentAssetId()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 "
										),
										'JHtmlRules::_getUserGroups()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 "
										),
										'JHtmlRules::_getImagesArray()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 "
										),
										'JHtmlTabs::start()' => array(
											'3.7.0' => false,
											'4.0' => true,
											'alternative' => "3.7.0 These helpers are dependent on the deprecated MooTools support"
										),
										'JHtmlTabs::end()' => array(
											'3.7.0' => false,
											'4.0' => true,
											'alternative' => "3.7.0 These helpers are dependent on the deprecated MooTools support"
										),
										'JHtmlTabs::panel()' => array(
											'3.7.0' => false,
											'4.0' => true,
											'alternative' => "3.7.0 These helpers are dependent on the deprecated MooTools support"
										),
										'JHtmlTabs::loadBehavior()' => array(
											'3.7.0' => false,
											'4.0' => true,
											'alternative' => "3.7.0 These helpers are dependent on the deprecated MooTools support"
										),
										'JHtmlSelect::suggestionlist()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Just create the <code><datalist></code> directly instead"
										),
										'JHtmlSelect::optgroup()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use JHtmlSelect::groupedList()"
										),
										'JHtmlSortablelist::_proceedSaveOrderButton()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 The logic is merged in the JLayout file"
										),
										'JHtmlSliders::start()' => array(
											'3.7.0' => false,
											'4.0' => true,
											'alternative' => "3.7.0 These helpers are dependent on the deprecated MooTools support"
										),
										'JHtmlSliders::end()' => array(
											'3.7.0' => false,
											'4.0' => true,
											'alternative' => "3.7.0 These helpers are dependent on the deprecated MooTools support"
										),
										'JHtmlSliders::panel()' => array(
											'3.7.0' => false,
											'4.0' => true,
											'alternative' => "3.7.0 These helpers are dependent on the deprecated MooTools support"
										),
										'JHtmlSliders::loadBehavior()' => array(
											'3.7.0' => false,
											'4.0' => true,
											'alternative' => "3.7.0 These helpers are dependent on the deprecated MooTools support"
										),
										'JHtmlBatch::access()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 instead of JHtml::_('batch.access'); use JLayoutHelper::render('joomla.html.batch.access', array());"
										),
										'JHtmlBatch::item()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 instead of JHtml::_('batch.item'); use JLayoutHelper::render('joomla.html.batch.item', array('extension' => ''com_XXX'));"
										),
										'JHtmlBatch::language()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 instead of JHtml::_('batch.language'); use JLayoutHelper::render('joomla.html.batch.language', array());"
										),
										'JHtmlBatch::user()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 instead of JHtml::_('batch.user'); use JLayoutHelper::render('joomla.html.batch.user', array());"
										),
										'JHtmlBatch::tag()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 instead of JHtml::_('batch.tag'); use JLayoutHelper::render('joomla.html.batch.tag', array());"
										),
										'JSessionStorage::test()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "12.3 (Platform) & 4.0 (CMS) - Use JSessionStorage::isSupported() instead."
										),
										'JArchiveWrapperArchive::extract()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 use the Joomla\Archive\Archive class instead"
										),
										'JArchiveWrapperArchive::getAdapter()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 use the Joomla\Archive\Archive class instead"
										),
										'JArchive::extract()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 use the Joomla\Archive\Archive class instead"
										),
										'JArchive::getAdapter()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 use the Joomla\Archive\Archive class instead"
										),
										'JFormFieldText::getSuggestions()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use getOptions instead"
										),
										'JGithubStatuses::create()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use repositories->statuses->create()"
										),
										'JGithubStatuses::getList()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use repositories->statuses->getList()"
										),
										'JGithubMilestones::getList()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use issues->milestones->getList()"
										),
										'JGithubMilestones::get()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use issues->milestones->get()"
										),
										'JGithubMilestones::create()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use issues->milestones->create()"
										),
										'JGithubMilestones::edit()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use issues->milestones->edit()"
										),
										'JGithubMilestones::delete()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use issues->milestones->delete()"
										),
										'JGithubPackageIssues::createComment()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use issues->comments->create()"
										),
										'JGithubPackageIssues::createLabel()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use issues->labels->create()"
										),
										'JGithubPackageIssues::deleteComment()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use issues->comments->delete()"
										),
										'JGithubPackageIssues::deleteLabel()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use issues->labels->delete()"
										),
										'JGithubPackageIssues::editComment()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use issues->comments->edit()"
										),
										'JGithubPackageIssues::editLabel()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use issues->labels->update()"
										),
										'JGithubPackageIssues::getComment()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use issues->comments->get()"
										),
										'JGithubPackageIssues::getComments()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use issues->comments->getList()"
										),
										'JGithubPackageIssues::getLabel()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use issues->labels->get()"
										),
										'JGithubPackageIssues::getLabels()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use issues->labels->getList()"
										),
										'JGithubPackagePulls::createComment()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use pulls->comments->create()"
										),
										'JGithubPackagePulls::createCommentReply()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use pulls->comments->createReply()"
										),
										'JGithubPackagePulls::deleteComment()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use pulls->comments->delete()"
										),
										'JGithubPackagePulls::editComment()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use pulls->comments->edit()"
										),
										'JGithubPackagePulls::getComment()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use pulls->comments->get()"
										),
										'JGithubPackagePulls::getComments()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use pulls->comments->getList()"
										),
										'JGithubPackageGists::createComment()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use gists->comments->create()"
										),
										'JGithubPackageGists::deleteComment()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use gists->comments->delete()"
										),
										'JGithubPackageGists::editComment()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use gists->comments->edit()"
										),
										'JGithubPackageGists::getComment()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use gists->comments->get()"
										),
										'JGithubPackageGists::getComments()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use gists->comments->getList()"
										),
										'JGithubPackageUsers::getUser()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use users->get()"
										),
										'JGithubPackageUsers::updateUser()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use users->edit()"
										),
										'JGithubPackageUsers::getUsers()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use users->getList()"
										),
										'JGithubRefs::create()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use data->refs->create()"
										),
										'JGithubRefs::edit()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use data->refs->edit()"
										),
										'JGithubRefs::get()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use data->refs->get()"
										),
										'JGithubRefs::getList()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use data->refs->getList()"
										),
										'JGithubAccount::createAuthorisation()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use authorization->create()"
										),
										'JGithubAccount::deleteAuthorisation()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use authorization->delete()"
										),
										'JGithubAccount::editAuthorisation()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use authorization->edit()"
										),
										'JGithubAccount::getAuthorisation()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use authorization->get()"
										),
										'JGithubAccount::getAuthorisations()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use authorization->getList()"
										),
										'JGithubAccount::getRateLimit()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use authorization->getRateLimit()"
										),
										'JGithubHooks::create()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use repositories->hooks->create()"
										),
										'JGithubHooks::delete()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use repositories->hooks->delete()"
										),
										'JGithubHooks::edit()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use repositories->hooks->edit()"
										),
										'JGithubHooks::get()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use repositories->hooks->get()"
										),
										'JGithubHooks::getList()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use repositories->hooks->getList()"
										),
										'JGithubHooks::test()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use repositories->hooks->test()"
										),
										'JGithubForks::create()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use repositories->forks->create()"
										),
										'JGithubForks::getList()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use repositories->forks->getList()"
										),
										'JGithubCommits::create()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use data->commits->create()"
										),
										'JGithubCommits::createCommitComment()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use repositories->comments->create()"
										),
										'JGithubCommits::deleteCommitComment()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use repositories->comments->delete()"
										),
										'JGithubCommits::editCommitComment()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use repositories->comments->edit()"
										),
										'JGithubCommits::getCommit()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use repositories->commits->get()"
										),
										'JGithubCommits::getCommitComment()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use repositories->comments->get()"
										),
										'JGithubCommits::getCommitComments()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use repositories->comments->getList()"
										),
										'JGithubCommits::getDiff()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use repositories->commits->compare()"
										),
										'JGithubCommits::getList()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use repositories->commits->getList()"
										),
										'JGithubCommits::getListComments()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "use repositories->comments->getListRepository()"
										),
										'JDatabaseDriver::getUTFSupport()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "12.3 (Platform) & 4.0 (CMS) - Use hasUTFSupport() instead"
										),
										'JDatabaseDriver::loadNextObject()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "12.3 (Platform) & 4.0 (CMS) - Use getIterator() instead"
										),
										'JDatabaseDriver::loadNextRow()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 (CMS)  Use JDatabaseDriver::getIterator() instead"
										),
										'JDatabaseDriver::errorNum' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "12.1 "
										),
										'JDatabaseDriver::errorMsg' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "12.1 "
										),
										'JDatabaseDriverPdo::loadNextObject()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 (CMS)  Use getIterator() instead"
										),
										'JDatabaseDriverPdo::loadNextRow()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 (CMS)  Use getIterator() instead"
										),
										'JDatabase::query()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "13.1 (Platform) & 4.0 (CMS)"
										),
										'JDatabase::getConnectors()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "13.1 (Platform) & 4.0 (CMS)"
										),
										'JDatabase::getErrorMsg()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "13.3 (Platform) & 4.0 (CMS)"
										),
										'JDatabase::getErrorNum()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "13.3 (Platform) & 4.0 (CMS)"
										),
										'JDatabase::getInstance()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "13.1 (Platform) & 4.0 (CMS)"
										),
										'JDatabase::splitSql()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "13.1 (Platform) & 4.0 (CMS)"
										),
										'JDatabase::stderr()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "13.3 (Platform) & 4.0 (CMS)"
										),
										'JDatabase::test()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "12.3 (Platform) & 4.0 (CMS) - Use JDatabaseDriver::isSupported() instead."
										),
										'JArrayHelper::toInteger()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use Joomla\Utilities\ArrayHelper::toInteger instead"
										),
										'JArrayHelper::toObject()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use Joomla\Utilities\ArrayHelper::toObject instead"
										),
										'JArrayHelper::toString()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use Joomla\Utilities\ArrayHelper::toString instead"
										),
										'JArrayHelper::fromObject()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use Joomla\Utilities\ArrayHelper::fromObject instead"
										),
										'JArrayHelper::getColumn()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use Joomla\Utilities\ArrayHelper::getColumn instead"
										),
										'JArrayHelper::getValue()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use Joomla\Utilities\ArrayHelper::getValue instead"
										),
										'JArrayHelper::invert()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use Joomla\Utilities\ArrayHelper::invert instead"
										),
										'JArrayHelper::isAssociative()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use Joomla\Utilities\ArrayHelper::isAssociative instead"
										),
										'JArrayHelper::pivot()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use Joomla\Utilities\ArrayHelper::pivot instead"
										),
										'JArrayHelper::sortObjects()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use Joomla\Utilities\ArrayHelper::sortObjects instead"
										),
										'JArrayHelper::arrayUnique()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use Joomla\Utilities\ArrayHelper::arrayUnique instead"
										),
										'JPlatform::isCompatible()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Deprecated without replacement"
										),
										'JPlatform::getShortVersion()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Deprecated without replacement"
										),
										'JPlatform::getLongVersion()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Deprecated without replacement"
										),
										'JString::splitCamelCase()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "12.3 (Platform) & 4.0 (CMS) - Use JStringNormalise::fromCamelCase()"
										),
										'JString::parse_url()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 (CMS) - Use {@link \Joomla\Uri\UriHelper::parse_url()} instead."
										),
										'JFile::read()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "13.3 (Platform) & 4.0 (CMS) - Use the native file_get_contents() instead."
										),
										'JFile::getName()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "13.3 (Platform) & 4.0 (CMS) - Use basename() instead."
										),
										'JError::isError()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 "
										),
										'JError::getError()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 "
										),
										'JError::getErrors()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 "
										),
										'JError::addToStack()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 "
										),
										'JError::raise()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 "
										),
										'JError::throwError()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Just throw an Exception"
										),
										'JError::raiseError()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Just throw an Exception"
										),
										'JError::raiseWarning()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => '4.0 Use \Joomla\CMS\Factory::getApplication()->enqueueMessage($msg, "warning") when wou want to notify the UI'
										),
										'JError::raiseNotice()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => '4.0 Use \Joomla\CMS\Factory::getApplication()->enqueueMessage($msg, "notice") when wou want to notify the UI'
										),
										'JError::getErrorHandling()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 "
										),
										'JError::setErrorHandling()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 "
										),
										'JError::attachHandler()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 "
										),
										'JError::detachHandler()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 "
										),
										'JError::registerErrorLevel()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 "
										),
										'JError::translateErrorLevel()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 "
										),
										'JError::handleIgnore()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 "
										),
										'JError::handleEcho()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 "
										),
										'JError::handleVerbose()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 "
										),
										'JError::handleDie()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 "
										),
										'JError::handleMessage()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 "
										),
										'JError::handleLog()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 "
										),
										'JError::handleCallback()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 "
										),
										'JError::customErrorPage()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use \Joomla\CMS\Exception\ExceptionHandler::render() instead"
										),
										'JError::customErrorHandler()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => '4.0 Throw an Exception or enqueue the message to the application, eg. \Joomla\CMS\Factory::getApplication()->enqueueMessage($msg)'
										),
										'JError::renderBacktrace()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => '4.0 Use JLayoutHelper::render("joomla.error.backtrace", array("backtrace" => $error->getTrace())) instead'
										),
										'JError::legacy' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 "
										),
										'JError::levels' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 "
										),
										'JError::handlers' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 "
										),
										'JError::stack' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 "
										),
										'JRequest::getUri()' => array(
											'1.7' => false,
											'4.0' => true,
											'alternative' => "1.7 "
										),
										'JRequest::getMethod()' => array(
											'1.7' => false,
											'4.0' => true,
											'alternative' => "1.7 Use JInput::getMethod() instead"
										),
										'JRequest::getVar()' => array(
											'1.7' => false,
											'4.0' => true,
											'alternative' => "1.7 Use JInput::get()"
										),
										'JRequest::getInt()' => array(
											'1.7' => false,
											'4.0' => true,
											'alternative' => "1.7 "
										),
										'JRequest::getUInt()' => array(
											'1.7' => false,
											'4.0' => true,
											'alternative' => "1.7 "
										),
										'JRequest::getFloat()' => array(
											'1.7' => false,
											'4.0' => true,
											'alternative' => "1.7 "
										),
										'JRequest::getBool()' => array(
											'1.7' => false,
											'4.0' => true,
											'alternative' => "1.7 "
										),
										'JRequest::getWord()' => array(
											'1.7' => false,
											'4.0' => true,
											'alternative' => "1.7 "
										),
										'JRequest::getCmd()' => array(
											'1.7' => false,
											'4.0' => true,
											'alternative' => "1.7 "
										),
										'JRequest::getString()' => array(
											'1.7' => false,
											'4.0' => true,
											'alternative' => "1.7 "
										),
										'JRequest::setVar()' => array(
											'1.7' => false,
											'4.0' => true,
											'alternative' => "1.7 "
										),
										'JRequest::get()' => array(
											'1.7' => false,
											'4.0' => true,
											'alternative' => "1.7 Use JInput::get()"
										),
										'JRequest::set()' => array(
											'1.7' => false,
											'4.0' => true,
											'alternative' => "1.7 Use JInput::set()"
										),
										'JRequest::checkToken()' => array(
											'1.7' => false,
											'4.0' => true,
											'alternative' => "1.7 Use JSession::checkToken() instead. Note that 'default' has to become 'request'."
										),
										'JRequest::_cleanVar()' => array(
											'1.7' => false,
											'4.0' => true,
											'alternative' => "1.7 "
										),
										'JException::__construct()' => array(
											'1.7' => false,
											'4.0' => true,
											'alternative' => "1.7 "
										),
										'JException::__toString()' => array(
											'1.7' => false,
											'4.0' => true,
											'alternative' => "1.7 "
										),
										'JException::toString()' => array(
											'1.7' => false,
											'4.0' => true,
											'alternative' => "1.7 "
										),
										'JException::get()' => array(
											'1.7' => false,
											'4.0' => true,
											'alternative' => "1.7 "
										),
										'JException::getProperties()' => array(
											'1.7' => false,
											'4.0' => true,
											'alternative' => "1.7 "
										),
										'JException::getError()' => array(
											'1.7' => false,
											'4.0' => true,
											'alternative' => "1.7 "
										),
										'JException::getErrors()' => array(
											'1.7' => false,
											'4.0' => true,
											'alternative' => "1.7 "
										),
										'JException::set()' => array(
											'1.7' => false,
											'4.0' => true,
											'alternative' => "1.7 "
										),
										'JException::setProperties()' => array(
											'1.7' => false,
											'4.0' => true,
											'alternative' => "1.7 "
										),
										'JException::setError()' => array(
											'1.7' => false,
											'4.0' => true,
											'alternative' => "1.7 "
										),
										'JException::level' => array(
											'1.7' => false,
											'4.0' => true,
											'alternative' => "1.7 "
										),
										'JException::code' => array(
											'1.7' => false,
											'4.0' => true,
											'alternative' => "1.7 "
										),
										'JException::message' => array(
											'1.7' => false,
											'4.0' => true,
											'alternative' => "1.7 "
										),
										'JException::info' => array(
											'1.7' => false,
											'4.0' => true,
											'alternative' => "1.7 "
										),
										'JException::file' => array(
											'1.7' => false,
											'4.0' => true,
											'alternative' => "1.7 "
										),
										'JException::line' => array(
											'1.7' => false,
											'4.0' => true,
											'alternative' => "1.7 "
										),
										'JException::function' => array(
											'1.7' => false,
											'4.0' => true,
											'alternative' => "1.7 "
										),
										'JException::class' => array(
											'1.7' => false,
											'4.0' => true,
											'alternative' => "1.7 "
										),
										'JException::type' => array(
											'1.7' => false,
											'4.0' => true,
											'alternative' => "1.7 "
										),
										'JException::args' => array(
											'1.70' => false,
											'4.0' => true,
											'alternative' => "1.7 "
										),
										'JException::backtrace' => array(
											'1.7' => false,
											'4.0' => true,
											'alternative' => "1.7 "
										),
										'JException::_errors' => array(
											'1.7' => false,
											'4.0' => true,
											'alternative' => "1.7 "
										),
										'JResponse::allowCache()' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 Use JApplicationWeb::allowCache() instead"
										),
										'JResponse::setHeader()' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 Use JApplicationWeb::setHeader() instead"
										),
										'JResponse::getHeaders()' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 Use JApplicationWeb::getHeaders() instead"
										),
										'JResponse::clearHeaders()' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 Use JApplicationWeb::clearHeaders() instead"
										),
										'JResponse::sendHeaders()' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 Use JApplicationWeb::sendHeaders() instead"
										),
										'JResponse::setBody()' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 Use JApplicationWeb::setBody() instead"
										),
										'JResponse::prependBody()' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 Use JApplicationWeb::prependBody() instead"
										),
										'JResponse::appendBody()' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 Use JApplicationWeb::appendBody() instead"
										),
										'JResponse::getBody()' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 Use JApplicationWeb::getBody() instead"
										),
										'JResponse::toString()' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 Use JApplicationCms::toString() instead"
										),
										'JResponse::compress()' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 Use JApplicationWeb::compress() instead"
										),
										'JResponse::clientEncoding()' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 Use JApplicationWebClient instead"
										),
										'JResponse::body' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 "
										),
										'JResponse::cachable' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 "
										),
										'JResponse::headers' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 "
										),
										'JTableSession::__construct()' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 Use SQL queries to interact with the session table."
										),
										'JTableSession::insert()' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 Use SQL queries to interact with the session table."
										),
										'JTableSession::update()' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 Use SQL queries to interact with the session table."
										),
										'JTableSession::destroy()' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 Use SQL queries to interact with the session table."
										),
										'JTableSession::purge()' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 Use SQL queries to interact with the session table."
										),
										'JTableSession::exists()' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 Use SQL queries to interact with the session table."
										),
										'JTableSession::delete()' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 Use SQL queries to interact with the session table."
										),
										'JSimplecrypt::__construct()' => array(
											'2.5.5' => false,
											'4.0' => true,
											'alternative' => "2.5.5 Use JCrypt instead."
										),
										'JSimplecrypt::decrypt()' => array(
											'2.5.5' => false,
											'4.0' => true,
											'alternative' => "2.5.5 Use JCrypt instead."
										),
										'JSimplecrypt::encrypt()' => array(
											'2.5.5' => false,
											'4.0' => true,
											'alternative' => "2.5.5 Use JCrypt instead."
										),
										'JSimplecrypt::_crypt' => array(
											'3.0' => false,
											'4.0' => true,
											'alternative' => "3.0 Use JCrypt instead."
										),
										'JSimplepieFactory::getFeedParser()' => array(
											'3.0' => false,
											'4.0' => true,
											'alternative' => '3.0 Use JFeedFactory($url) instead.'
										),
										'JXMLElement::name()' => array(
											'3.0' => false,
											'4.0' => true,
											'alternative' => "3.0 Use SimpleXMLElement::getName() instead."
										),
										'JXMLElement::asFormattedXml()' => array(
											'3.0' => false,
											'4.0' => true,
											'alternative' => "3.0 Use SimpleXMLElement::asXml() instead."
										),
										'JNode::__construct()' => array(
											'3.0' => false,
											'4.0' => true,
											'alternative' => "3.0 "
										),
										'JNode::addChild()' => array(
											'3.0' => false,
											'4.0' => true,
											'alternative' => "3.0 "
										),
										'JNode::setParent()' => array(
											'3.0' => false,
											'4.0' => true,
											'alternative' => "3.0 "
										),
										'JNode::getChildren()' => array(
											'3.0' => false,
											'4.0' => true,
											'alternative' => "3.0 "
										),
										'JNode::getParent()' => array(
											'3.0' => false,
											'4.0' => true,
											'alternative' => "3.0 "
										),
										'JNode::hasChildren()' => array(
											'3.0' => false,
											'4.0' => true,
											'alternative' => "3.0 "
										),
										'JNode::hasParent()' => array(
											'3.0' => false,
											'4.0' => true,
											'alternative' => "3.0 "
										),
										'JNode::_parent' => array(
											'3.0' => false,
											'4.0' => true,
											'alternative' => "3.0 "
										),
										'JNode::_children' => array(
											'3.0' => false,
											'4.0' => true,
											'alternative' => "3.0 "
										),
										'JTree::__construct()' => array(
											'3.0' => false,
											'4.0' => true,
											'alternative' => "3.0 "
										),
										'JTree::addChild()' => array(
											'3.0' => false,
											'4.0' => true,
											'alternative' => "3.0 "
										),
										'JTree::getParent()' => array(
											'3.0' => false,
											'4.0' => true,
											'alternative' => "3.0 "
										),
										'JTree::reset()' => array(
											'3.0' => false,
											'4.0' => true,
											'alternative' => "3.0 "
										),
										'JTree::_root' => array(
											'3.0' => false,
											'4.0' => true,
											'alternative' => "3.0 "
										),
										'JTree::_current' => array(
											'3.0' => false,
											'4.0' => true,
											'alternative' => "3.0 "
										),
										'JObservable::__construct()' => array(
											'2.5' => false,
											'4.0' => true,
											'alternative' => "2.5 "
										),
										'JObservable::getState()' => array(
											'2.5' => false,
											'4.0' => true,
											'alternative' => "2.5 "
										),
										'JObservable::notify()' => array(
											'2.5' => false,
											'4.0' => true,
											'alternative' => "2.5 "
										),
										'JObservable::attach()' => array(
											'2.5' => false,
											'4.0' => true,
											'alternative' => "2.5 "
										),
										'JObservable::detach()' => array(
											'2.5' => false,
											'4.0' => true,
											'alternative' => "2.5 "
										),
										'JObservable::_observers' => array(
											'2.5' => false,
											'4.0' => true,
											'alternative' => "2.5 "
										),
										'JObservable::_state' => array(
											'2.5' => false,
											'4.0' => true,
											'alternative' => "2.5 "
										),
										'JObservable::_methods' => array(
											'2.5' => false,
											'4.0' => true,
											'alternative' => "2.5 "
										),
										'JObserver::__construct()' => array(
											'2.5' => false,
											'4.0' => true,
											'alternative' => "2.5 "
										),
										'JObserver::update()' => array(
											'2.5' => false,
											'4.0' => true,
											'alternative' => "2.5 "
										),
										'JObserver::_subject' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "2.5 "
										),
										'JApplication::__construct()' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 "
										),
										'JApplication::getInstance()' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 Use JApplicationCms::getInstance() instead"
										),
										'JApplication::initialise()' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 "
										),
										'JApplication::route()' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 "
										),
										'JApplication::dispatch()' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 "
										),
										'JApplication::render()' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 "
										),
										'JApplication::redirect()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "3.2 "
										),
										'JApplication::enqueueMessage()' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 "
										),
										'JApplication::getMessageQueue()' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 "
										),
										'JApplication::getCfg()' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 "
										),
										'JApplication::getName()' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 "
										),
										'JApplication::getUserState()' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 "
										),
										'JApplication::setUserState()' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 "
										),
										'JApplication::getUserStateFromRequest()' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 "
										),
										'JApplication::login()' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 "
										),
										'JApplication::logout()' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 "
										),
										'JApplication::getTemplate()' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 "
										),
										'JApplication::getRouter()' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 "
										),
										'JApplication::stringURLSafe()' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 Use JApplicationHelper::stringURLSafe instead"
										),
										'JApplication::getPathway()' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 "
										),
										'JApplication::getMenu()' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 "
										),
										'JApplication::getHash()' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 Use JApplicationHelper::getHash instead"
										),
										'JApplication::_createConfiguration()' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 "
										),
										'JApplication::_createSession()' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 "
										),
										'JApplication::checkSession()' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 "
										),
										'JApplication::afterSessionStart()' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 "
										),
										'JApplication::getClientId()' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 "
										),
										'JApplication::isAdmin()' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 "
										),
										'JApplication::isSite()' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 "
										),
										'JApplication::isWinOs()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use the IS_WIN constant instead."
										),
										'JApplication::isSSLConnection()' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 "
										),
										'JApplication::__toString()' => array(
											'3.20' => false,
											'4.0' => true,
											'alternative' => "3.2 "
										),
										'JApplication::_clientId' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 "
										),
										'JApplication::_messageQueue' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 "
										),
										'JApplication::_name' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 "
										),
										'JApplication::scope' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 "
										),
										'JApplication::requestTime' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 "
										),
										'JApplication::startTime' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 "
										),
										'JApplication::client' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 "
										),
										'JApplication::instances' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 "
										),
										'\Joomla\CMS\User\UserHelper::getCryptedPassword()' => array(
											'4.0 ' => false,
											'4.0' => true,
											'alternative' => "4.0 "
										),
										'\Joomla\CMS\User\UserHelper::getSalt()' => array(
											'4.0 ' => false,
											'4.0' => true,
											'alternative' => "4.0 "
										),
										'\Joomla\CMS\User\UserHelper::invalidateCookie()' => array(
											'4.0 ' => false,
											'4.0' => true,
											'alternative' => "4.0 This is handled in the authentication plugin itself. The 'invalid' column in the db should be removed as well"
										),
										'\Joomla\CMS\User\UserHelper::clearExpiredTokens()' => array(
											'4.0 ' => false,
											'4.0' => true,
											'alternative' => "4.0 This is handled in the authentication plugin itself"
										),
										'\Joomla\CMS\User\UserHelper::getRememberCookieData()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 This is handled in the authentication plugin itself"
										),
										'\Joomla\CMS\User\User::getParameters()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "12.3 (Platform) & 4.0 (CMS) - Instead use User::getParam()"
										),
										'\Joomla\CMS\User\User::userHelper' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>Joomla\CMS\User\UserHelper</code> directly"
										),
										'\Joomla\CMS\User\UserWrapper::addUserToGroup()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>Joomla\CMS\User\UserHelper</code> directly"
										),
										'\Joomla\CMS\User\UserWrapper::getUserGroups()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>Joomla\CMS\User\UserHelper</code> directly"
										),
										'\Joomla\CMS\User\UserWrapper::removeUserFromGroup()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>Joomla\CMS\User\UserHelper</code> directly"
										),
										'\Joomla\CMS\User\UserWrapper::setUserGroups()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>Joomla\CMS\User\UserHelper</code> directly"
										),
										'\Joomla\CMS\User\UserWrapper::getProfile()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>Joomla\CMS\User\UserHelper</code> directly"
										),
										'\Joomla\CMS\User\UserWrapper::activateUser()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>Joomla\CMS\User\UserHelper</code> directly"
										),
										'\Joomla\CMS\User\UserWrapper::getUserId()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>Joomla\CMS\User\UserHelper</code> directly"
										),
										'\Joomla\CMS\User\UserWrapper::hashPassword()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>Joomla\CMS\User\UserHelper</code> directly"
										),
										'\Joomla\CMS\User\UserWrapper::verifyPassword()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>Joomla\CMS\User\UserHelper</code> directly"
										),
										'\Joomla\CMS\User\UserWrapper::getCryptedPassword()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 "
										),
										'\Joomla\CMS\User\UserWrapper::getSalt()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 "
										),
										'\Joomla\CMS\User\UserWrapper::genRandomPassword()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>Joomla\CMS\User\UserHelper</code> directly"
										),
										'\Joomla\CMS\User\UserWrapper::invalidateCookie()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 "
										),
										'\Joomla\CMS\User\UserWrapper::clearExpiredTokens()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 "
										),
										'\Joomla\CMS\User\UserWrapper::getRememberCookieData()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 "
										),
										'\Joomla\CMS\User\UserWrapper::getShortHashedUserAgent()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>Joomla\CMS\User\UserHelper</code> directly"
										),
										'\Joomla\CMS\Installer\InstallerHelper::splitSql()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "13.3 Use \JDatabaseDriver::splitSql() directly"
										),
										'\Joomla\CMS\Installer\Installer::getAdapter()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Individual adapters should be instantiated as needed"
										),
										'\Joomla\CMS\Installer\Installer::instance' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 "
										),
										'\Joomla\CMS\Document\Document::addScript()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 The (url, mime, defer, async) method signature is deprecated, use (url, options, attributes) instead."
										),
										'\Joomla\CMS\Document\Document::addScriptVersion()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 This method is deprecated, use addScript(url, options, attributes) instead."
										),
										'\Joomla\CMS\Document\Document::addStyleSheet()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 The (url, mime, media, attribs) method signature is deprecated, use (url, options, attributes) instead."
										),
										'\Joomla\CMS\Document\Document::addStyleSheetVersion()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 This method is deprecated, use addStyleSheet(url, options, attributes) instead."
										),
										'\Joomla\CMS\Document\Renderer\Html\HeadRenderer::fetchHead()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Method code will be moved into the render method"
										),
										'\Joomla\CMS\Factory::getAcl()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "13.3 (Platform) & 4.0 (CMS) - Use JAccess directly."
										),
										'\Joomla\CMS\Factory::getFeedParser()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use directly JFeedFactory or supply SimplePie instead. Mehod will be proxied to JFeedFactory beginning in 3.2"
										),
										'\Joomla\CMS\Factory::getXml()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "13.3 (Platform) & 4.0 (CMS) - Use SimpleXML directly."
										),
										'\Joomla\CMS\Factory::getEditor()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "12.3 (Platform) & 4.0 (CMS) - Use Editor directly"
										),
										'\Joomla\CMS\Factory::getUri()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "13.3 (Platform) & 4.0 (CMS) - Use JUri directly."
										),
										'\Joomla\CMS\Factory::acl' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "13.3 (Platform) & 4.0 (CMS)"
										),
										'\Joomla\CMS\Image\ImageFilter::__construct()' => array(
											'5.0' => false,
											'5.0' => true,
											'alternative' => "5.0 Use Joomla\Image\ImageFilter instead."
										),
										'\Joomla\CMS\Layout\FileLayout::setLayout()' => array(
											'3.5' => false,
											'4.0' => true,
											'alternative' => "3.5 Use setLayoutId()"
										),
										'\Joomla\CMS\Layout\FileLayout::refreshIncludePaths()' => array(
											'3.5' => false,
											'4.0' => true,
											'alternative' => "3.5 Use FileLayout::clearIncludePaths()"
										),
										'\Joomla\CMS\Environment\Browser::isSSLConnection()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "13.3 (Platform) & 4.0 (CMS) - Use the isSSLConnection method on the application object."
										),
										'\Joomla\CMS\Filter\Wrapper\OutputFilterWrapper::objectHTMLSafe()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>Joomla\CMS\Filter\OutputFilter</code> directly"
										),
										'\Joomla\CMS\Filter\Wrapper\OutputFilterWrapper::linkXHTMLSafe()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>Joomla\CMS\Filter\OutputFilter</code> directly"
										),
										'\Joomla\CMS\Filter\Wrapper\OutputFilterWrapper::stringURLSafe()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>Joomla\CMS\Filter\OutputFilter</code> directly"
										),
										'\Joomla\CMS\Filter\Wrapper\OutputFilterWrapper::stringURLUnicodeSlug()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>Joomla\CMS\Filter\OutputFilter</code> directly"
										),
										'\Joomla\CMS\Filter\Wrapper\OutputFilterWrapper::ampReplace()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>Joomla\CMS\Filter\OutputFilter</code> directly"
										),
										'\Joomla\CMS\Filter\Wrapper\OutputFilterWrapper::_ampReplaceCallback()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>Joomla\CMS\Filter\OutputFilter</code> directly"
										),
										'\Joomla\CMS\Filter\Wrapper\OutputFilterWrapper::cleanText()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>Joomla\CMS\Filter\OutputFilter</code> directly"
										),
										'\Joomla\CMS\Filter\Wrapper\OutputFilterWrapper::stripImages()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>Joomla\CMS\Filter\OutputFilter</code> directly"
										),
										'\Joomla\CMS\Filter\Wrapper\OutputFilterWrapper::stripIframes()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>Joomla\CMS\Filter\OutputFilter</code> directly"
										),
										'\Joomla\CMS\Filter\InputFilter::_remove()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use InputFilter::remove() instead"
										),
										'\Joomla\CMS\Filter\InputFilter::_cleanTags()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use InputFilter::cleanTags() instead"
										),
										'\Joomla\CMS\Filter\InputFilter::_cleanAttributes()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use InputFilter::cleanAttributes() instead"
										),
										'\Joomla\CMS\Filter\InputFilter::_decode()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use InputFilter::decode() instead"
										),
										'\Joomla\CMS\Filter\InputFilter::_escapeAttributeValues()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use InputFilter::escapeAttributeValues() instead"
										),
										'\Joomla\CMS\Filter\InputFilter::_stripCSSExpressions()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use InputFilter::stripCSSExpressions() instead"
										),
										'\Joomla\CMS\Filter\OutputFilter::_ampReplaceCallback()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use OutputFilter::ampReplaceCallback() instead"
										),
										'\Joomla\CMS\Pathway\Pathway::_makeItem()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use makeItem() instead"
										),
										'\Joomla\CMS\Pathway\Pathway::_pathway' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => '4.0 Will convert to $pathway'
										),
										'\Joomla\CMS\Pathway\Pathway::_count' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => '4.0 Will convert to $count'
										),
										'\Joomla\CMS\Uri\Uri::setPath()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use {@link \Joomla\Uri\Uri::setPath()}"
										),
										'\Joomla\CMS\Uri\Uri::_cleanPath()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use {@link \Joomla\Uri\Uri::cleanPath()} instead"
										),
										'\Joomla\CMS\Table\Content::__construct()' => array(
											'3.1.4' => false,
											'4.0' => true,
											'alternative' => "3.1.4 Class will be removed upon completion of transition to UCM"
										),
										'\Joomla\CMS\Table\Content::_getAssetName()' => array(
											'3.1.4' => false,
											'4.0' => true,
											'alternative' => "3.1.4 Class will be removed upon completion of transition to UCM"
										),
										'\Joomla\CMS\Table\Content::_getAssetTitle()' => array(
											'3.1.4' => false,
											'4.0' => true,
											'alternative' => "3.1.4 Class will be removed upon completion of transition to UCM"
										),
										'\Joomla\CMS\Table\Content::_getAssetParentId()' => array(
											'3.1.4' => false,
											'4.0' => true,
											'alternative' => "3.1.4 Class will be removed upon completion of transition to UCM"
										),
										'\Joomla\CMS\Table\Content::bind()' => array(
											'3.1.4' => false,
											'4.0' => true,
											'alternative' => "3.1.4 Class will be removed upon completion of transition to UCM"
										),
										'\Joomla\CMS\Table\Content::check()' => array(
											'3.1.4' => false,
											'4.0' => true,
											'alternative' => "3.1.4 Class will be removed upon completion of transition to UCM"
										),
										'\Joomla\CMS\Table\Content::getDefaultAssetValues()' => array(
											'3.4' => false,
											'4.0' => true,
											'alternative' => "3.4 Class will be removed upon completion of transition to UCM"
										),
										'\Joomla\CMS\Table\Content::store()' => array(
											'3.1.4' => false,
											'4.0' => true,
											'alternative' => "3.1.4 Class will be removed upon completion of transition to UCM"
										),
										'\Joomla\CMS\Table\Observer\Tags::_myTableForPregreplaceOnly' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "Never use this"
										),
										'\Joomla\CMS\Table\Observer\ContentHistory::_myTableForPregreplaceOnly' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "Never use this"
										),
										'\Joomla\CMS\Application\SiteApplication::getPageParameters()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use getParams() instead"
										),
										'\Joomla\CMS\Application\SiteApplication::_language_filter' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => '4.0 Will be renamed $language_filter'
										),
										'\Joomla\CMS\Application\SiteApplication::_detect_browser' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => '4.0 Will be renamed $detect_browser'
										),
										'\Joomla\CMS\Application\WebApplication::initialise()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "13.1 (Platform) & 4.0 (CMS)"
										),
										'\Joomla\CMS\Application\ApplicationHelper::parseXMLInstallFile()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use \JInstaller::parseXMLInstallFile instead."
										),
										'\Joomla\CMS\Application\ApplicationHelper::parseXMLLangMetaFile()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use \JInstaller::parseXMLInstallFile instead."
										),
										'\Joomla\CMS\Application\CMSApplication::getCfg()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use get() instead"
										),
										'\Joomla\CMS\Application\CMSApplication::isAdmin()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "Use isClient('administrator') instead."
										),
										'\Joomla\CMS\Application\CMSApplication::isSite()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "Use isClient('site') instead."
										),
										'\Joomla\CMS\Application\CMSApplication::_clientId' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => '4.0 Will be renamed $clientId'
										),
										'\Joomla\CMS\Application\CMSApplication::_messageQueue' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => '4.0 Will be renamed $messageQueue'
										),
										'\Joomla\CMS\Application\CMSApplication::_name' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => '4.0 Will be renamed $name'
										),
										'\Joomla\CMS\Application\BaseApplication::doExecute()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 The default concrete implementation of doExecute() will be removed, subclasses will need to provide their own implementation."
										),
										'\Joomla\CMS\Crypt\Crypt::hasStrongPasswordSupport()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 "
										),
										'\Joomla\CMS\Crypt\CryptPassword::create()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use PHP 5.5's native password hashing API"
										),
										'\Joomla\CMS\Crypt\CryptPassword::verify()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use PHP 5.5's native password hashing API"
										),
										'\Joomla\CMS\Crypt\CryptPassword::setDefaultType()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use PHP 5.5's native password hashing API"
										),
										'\Joomla\CMS\Crypt\CryptPassword::getDefaultType()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use PHP 5.5's native password hashing API"
										),
										'\Joomla\CMS\Crypt\Password\SimpleCryptPassword::create()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use PHP 5.5's native password hashing API"
										),
										'\Joomla\CMS\Crypt\Password\SimpleCryptPassword::setCost()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use PHP 5.5's native password hashing API"
										),
										'\Joomla\CMS\Crypt\Password\SimpleCryptPassword::getSalt()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use PHP 5.5's native password hashing API"
										),
										'\Joomla\CMS\Crypt\Password\SimpleCryptPassword::verify()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use PHP 5.5's native password hashing API"
										),
										'\Joomla\CMS\Crypt\Password\SimpleCryptPassword::setDefaultType()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use PHP 5.5's native password hashing API"
										),
										'\Joomla\CMS\Crypt\Password\SimpleCryptPassword::getDefaultType()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use PHP 5.5's native password hashing API"
										),
										'\Joomla\CMS\Crypt\Password\SimpleCryptPassword::cost' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use PHP 5.5's native password hashing API"
										),
										'\Joomla\CMS\Crypt\Password\SimpleCryptPassword::defaultType' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use PHP 5.5's native password hashing API"
										),
										'\Joomla\CMS\Helper\ModuleHelper::_load()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use ModuleHelper::load() instead"
										),
										'\Joomla\CMS\Helper\LibraryHelper::_load()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use LibraryHelper::loadLibrary() instead"
										),
										'\Joomla\CMS\Helper\ContentHelper::_getActions()' => array(
											'3.2' => false,
											'4.0' => true,
											'alternative' => "3.2 Use ContentHelper::getActions() instead"
										),
										'\Joomla\CMS\Helper\TagsHelper::createTagsFromMetadata()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 This method is no longer used in the CMS and will not be replaced."
										),
										'\Joomla\CMS\Helper\TagsHelper::getTypeId()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use \JUcmType::getTypeId() instead"
										),
										'\Joomla\CMS\Profiler\Profiler::getmicrotime()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "12.3 (Platform) & 4.0 (CMS) - Use PHP's microtime(1)"
										),
										'\Joomla\CMS\Profiler\Profiler::getMemory()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "12.3 (Platform) & 4.0 (CMS) - Use PHP's native memory_get_usage()"
										),
										'\Joomla\CMS\Router\SiteRouter::parseRawRoute()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Attach your logic as rule to the main parse stage"
										),
										'\Joomla\CMS\Router\SiteRouter::parseSefRoute()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Attach your logic as rule to the main parse stage"
										),
										'\Joomla\CMS\Router\SiteRouter::buildRawRoute()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Attach your logic as rule to the main build stage"
										),
										'\Joomla\CMS\Router\SiteRouter::_buildSefRoute()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Attach your logic as rule to the main build stage"
										),
										'\Joomla\CMS\Router\SiteRouter::buildSefRoute()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Attach your logic as rule to the main build stage"
										),
										'\Joomla\CMS\Router\SiteRouter::processBuildRules()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 The special logic should be implemented as rule"
										),
										'\Joomla\CMS\Router\Router::getMode()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 "
										),
										'\Joomla\CMS\Router\Router::setMode()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 "
										),
										'\Joomla\CMS\Router\Router::_parseRawRoute()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Attach your logic as rule to the main parse stage"
										),
										'\Joomla\CMS\Router\Router::parseRawRoute()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Attach your logic as rule to the main parse stage"
										),
										'\Joomla\CMS\Router\Router::_parseSefRoute()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Attach your logic as rule to the main parse stage"
										),
										'\Joomla\CMS\Router\Router::parseSefRoute()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Attach your logic as rule to the main parse stage"
										),
										'\Joomla\CMS\Router\Router::_buildRawRoute()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Attach your logic as rule to the main build stage"
										),
										'\Joomla\CMS\Router\Router::buildRawRoute()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Attach your logic as rule to the main build stage"
										),
										'\Joomla\CMS\Router\Router::_buildSefRoute()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Attach your logic as rule to the main build stage"
										),
										'\Joomla\CMS\Router\Router::buildSefRoute()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Attach your logic as rule to the main build stage"
										),
										'\Joomla\CMS\Router\Router::_processParseRules()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use processParseRules() instead"
										),
										'\Joomla\CMS\Router\Router::_processBuildRules()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use processBuildRules() instead"
										),
										'\Joomla\CMS\Router\Router::_createUri()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use createUri() instead"
										),
										'\Joomla\CMS\Router\Router::_encodeSegments()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 This should be performed in the component router instead"
										),
										'\Joomla\CMS\Router\Router::encodeSegments()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 This should be performed in the component router instead"
										),
										'\Joomla\CMS\Router\Router::_decodeSegments()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 This should be performed in the component router instead"
										),
										'\Joomla\CMS\Router\Router::decodeSegments()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 This should be performed in the component router instead"
										),
										'\Joomla\CMS\Router\Router::mode' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 "
										),
										'\Joomla\CMS\Router\Router::_mode' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 "
										),
										'\Joomla\CMS\Router\Router::_vars' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => '4.0 Will convert to $vars'
										),
										'\Joomla\CMS\Router\Router::_rules' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => '4.0 Will convert to $rules'
										),
										'\Joomla\CMS\MVC\Controller\BaseController::authorise()' => array(
											'3.0' => false,
											'4.0' => true,
											'alternative' => "3.0 Use \JAccess instead."
										),
										'\Joomla\CMS\MVC\View\HtmlView::assign()' => array(
											'3.0' => false,
											'4.0' => true,
											'alternative' => "3.0 Use native PHP syntax."
										),
										'\Joomla\CMS\MVC\View\HtmlView::assignRef()' => array(
											'3.0' => false,
											'4.0' => true,
											'alternative' => "3.0 Use native PHP syntax."
										),
										'\Joomla\CMS\MVC\View\HtmlView::setEscape()' => array(
											'3.0' => false,
											'4.0' => true,
											'alternative' => "3.0 Override \JViewLegacy::escape() instead."
										),
										'\Joomla\CMS\MVC\View\HtmlView::_escape' => array(
											'3.0' => false,
											'4.0' => true,
											'alternative' => "3.0 "
										),
										'\Joomla\CMS\Language\Multilanguage::getSiteLangs()' => array(
											'3.7.0' => false,
											'4.0' => true,
											'alternative' => "3.7.0 Use \JLanguageHelper::getInstalledLanguages(0) instead."
										),
										'\Joomla\CMS\Language\Wrapper\LanguageHelperWrapper::createLanguageList()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>Joomla\CMS\Language\LanguageHelper</code> directly"
										),
										'\Joomla\CMS\Language\Wrapper\LanguageHelperWrapper::detectLanguage()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>Joomla\CMS\Language\LanguageHelper</code> directly"
										),
										'\Joomla\CMS\Language\Wrapper\LanguageHelperWrapper::getLanguages()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>Joomla\CMS\Language\LanguageHelper</code> directly"
										),
										'\Joomla\CMS\Language\Wrapper\TransliterateWrapper::utf8_latin_to_ascii()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>Joomla\CMS\Language\Transliterate</code> directly"
										),
										'\Joomla\CMS\Language\Wrapper\JTextWrapper::_()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>JText</code> directly"
										),
										'\Joomla\CMS\Language\Wrapper\JTextWrapper::alt()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>JText</code> directly"
										),
										'\Joomla\CMS\Language\Wrapper\JTextWrapper::plural()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>JText</code> directly"
										),
										'\Joomla\CMS\Language\Wrapper\JTextWrapper::sprintf()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>JText</code> directly"
										),
										'\Joomla\CMS\Language\Wrapper\JTextWrapper::printf()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>JText</code> directly"
										),
										'\Joomla\CMS\Language\Wrapper\JTextWrapper::script()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>JText</code> directly"
										),
										'\Joomla\CMS\Language\Language::exists()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "3.7.0, use LanguageHelper::exists() instead."
										),
										'\Joomla\CMS\Language\Language::getMetadata()' => array(
											'3.7.0' => false,
											'4.0' => true,
											'alternative' => "3.7.0, use LanguageHelper::getMetadata() instead."
										),
										'\Joomla\CMS\Language\Language::getKnownLanguages()' => array(
											'3.7.0' => false,
											'4.0' => true,
											'alternative' => "3.7.0, use LanguageHelper::getKnownLanguages() instead."
										),
										'\Joomla\CMS\Language\Language::getLanguagePath()' => array(
											'3.7.0' => false,
											'4.0' => true,
											'alternative' => "3.7.0, use LanguageHelper::getLanguagePath() instead."
										),
										'\Joomla\CMS\Language\Language::setLanguage()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 (CMS) - Instantiate a new Language object instead"
										),
										'\Joomla\CMS\Language\Language::parseLanguageFiles()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "3.7.0, use LanguageHelper::parseLanguageFiles() instead."
										),
										'\Joomla\CMS\Language\Language::parseXMLLanguageFile()' => array(
											'3.7.0' => false,
											'4.0' => true,
											'alternative' => "3.7.0, use LanguageHelper::parseXMLLanguageFile() instead."
										),
										'\Joomla\CMS\Updater\Updater::update()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 No replacement."
										),
										'\Joomla\CMS\Mail\Mail::sendAdminMail()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Without replacement please implement it in your own code"
										),
										'\Joomla\CMS\Menu\MenuItem::__get()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Access the item parameters through the <code>getParams()</code> method"
										),
										'\Joomla\CMS\Menu\MenuItem::__set()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Set the item parameters through the <code>setParams()</code> method"
										),
										'\Joomla\CMS\Menu\MenuItem::__isset()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Deprecated without replacement"
										),
										'\Joomla\CMS\Menu\MenuItem::get()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 "
										),
										'\Joomla\CMS\Menu\MenuItem::set()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 "
										),
										'\Joomla\CMS\Menu\AbstractMenu::_items' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => '4.0 Will convert to $items'
										),
										'\Joomla\CMS\Menu\AbstractMenu::_default' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => '4.0 Will convert to $default'
										),
										'\Joomla\CMS\Menu\AbstractMenu::_active' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => '4.0 Will convert to $active'
										),
										'\Joomla\CMS\Form\FormField::getControlGroup()' => array(
											'3.2.3' => false,
											'4.0' => true,
											'alternative' => "3.2.3 Use renderField() instead"
										),
										'\Joomla\CMS\Form\Form::getControlGroup()' => array(
											'3.2.3' => false,
											'4.0' => true,
											'alternative' => "3.2.3 Use renderField() instead of getControlGroup"
										),
										'\Joomla\CMS\Form\Form::getControlGroups()' => array(
											'3.2.3' => false,
											'4.0' => true,
											'alternative' => "3.2.3 Use renderFieldset() instead of getControlGroups"
										),
										'\Joomla\CMS\Form\FormWrapper::loadFieldType()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>Joomla\CMS\Form\FormHelper</code> directly"
										),
										'\Joomla\CMS\Form\FormWrapper::loadRuleType()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>Joomla\CMS\Form\FormHelper</code> directly"
										),
										'\Joomla\CMS\Form\FormWrapper::loadFieldClass()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>Joomla\CMS\Form\FormHelper</code> directly"
										),
										'\Joomla\CMS\Form\FormWrapper::loadRuleClass()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>Joomla\CMS\Form\FormHelper</code> directly"
										),
										'\Joomla\CMS\Form\FormWrapper::addFieldPath()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>Joomla\CMS\Form\FormHelper</code> directly"
										),
										'\Joomla\CMS\Form\FormWrapper::addFormPath()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>Joomla\CMS\Form\FormHelper</code> directly"
										),
										'\Joomla\CMS\Form\FormWrapper::addRulePath()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>Joomla\CMS\Form\FormHelper</code> directly"
										),
										'\Joomla\CMS\Pagination\Pagination::set()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Access the properties directly."
										),
										'\Joomla\CMS\Pagination\Pagination::get()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Access the properties directly."
										),
										'\Joomla\CMS\Plugin\PluginHelper::_import()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use PluginHelper::import() instead"
										),
										'\Joomla\CMS\Plugin\PluginHelper::_load()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use PluginHelper::load() instead"
										),
										'\Joomla\CMS\Version::__get()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Access the constants directly"
										),
										'\Joomla\CMS\Version::RELEASE' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use separated version constants instead"
										),
										'\Joomla\CMS\Version::DEV_LEVEL' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use separated version constants instead"
										),
										'\Joomla\CMS\Version::BUILD' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 "
										),
										'\Joomla\CMS\Cache\CacheController::get()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Implement own method in subclass"
										),
										'\Joomla\CMS\Cache\CacheController::store()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Implement own method in subclass"
										),
										'\Joomla\CMS\Cache\Controller\OutputController::start()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 "
										),
										'\Joomla\CMS\Cache\Controller\OutputController::end()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 "
										),
										'\Joomla\CMS\Cache\Controller\OutputController::_locktest' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 "
										),
										'\Joomla\CMS\Cache\Controller\CallbackController::call()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 "
										),
										'\Joomla\CMS\Cache\CacheStorage::test()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "12.3 (Platform) & 4.0 (CMS)"
										),
										'\Joomla\CMS\Input\Cli::__construct()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "5.0 Use Joomla\Input\Cli instead"
										),
										'\Joomla\CMS\Input\Cli::serialize()' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "5.0 Use Joomla\Input\Cli instead"
										),
										'\Joomla\CMS\Input\Cli::unserialize()' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "5.0 Use Joomla\Input\Cli instead"
										),
										'\Joomla\CMS\Input\Cli::parseArguments()' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "5.0 Use Joomla\Input\Cli instead"
										),
										'\Joomla\CMS\Input\Cli::executable' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "5.0 Use Joomla\Input\Cli instead"
										),
										'\Joomla\CMS\Input\Cli::args' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "5.0 Use Joomla\Input\Cli instead"
										),
										'\Joomla\CMS\Input\Cookie::__construct()' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "5.0 Use Joomla\Input\Cookie instead"
										),
										'\Joomla\CMS\Input\Cookie::set()' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "5.0 Use Joomla\Input\Cookie instead"
										),
										'\Joomla\CMS\Input\Files::__construct()' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "5.0 Use Joomla\Input\Files instead"
										),
										'\Joomla\CMS\Input\Files::get()' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "5.0 Use Joomla\Input\Files instead"
										),
										'\Joomla\CMS\Input\Files::decodeData()' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "5.0 Use Joomla\Input\Files instead"
										),
										'\Joomla\CMS\Input\Files::set()' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "5.0 Use Joomla\Input\Files instead"
										),
										'\Joomla\CMS\Input\Files::decodedData' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "5.0 Use Joomla\Input\Files instead"
										),
										'\Joomla\CMS\Input\Json::__construct()' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "5.0 Use Joomla\Input\Json instead"
										),
										'\Joomla\CMS\Input\Json::getRaw()' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "5.0 Use Joomla\Input\Json instead"
										),
										'\Joomla\CMS\Input\Json::_raw' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "5.0 Use Joomla\Input\Json instead"
										),
										'\Joomla\CMS\Input\Input::__construct()' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "5.0 Use Joomla\Input\Input instead"
										),
										'\Joomla\CMS\Input\Input::__get()' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "5.0 Use Joomla\Input\Input instead"
										),
										'\Joomla\CMS\Input\Input::getArray()' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "5.0 Use Joomla\Input\Input instead"
										),
										'\Joomla\CMS\Input\Input::getArrayRecursive()' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "5.0 Use Joomla\Input\Input instead"
										),
										'\Joomla\CMS\Input\Input::unserialize()' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "5.0 Use Joomla\Input\Input instead"
										),
										'\Joomla\CMS\Input\Input::inputs' => array(
											'4.0' => false,
											'5.0' => true,
											'alternative' => "5.0 Use Joomla\Input\Input instead"
										),
										'\Joomla\CMS\Component\ComponentRecord::__get()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Access the item parameters through the <code>getParams()</code> method"
										),
										'\Joomla\CMS\Component\ComponentRecord::__set()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Set the item parameters through the <code>setParams()</code> method"
										),
										'\Joomla\CMS\Component\ComponentHelper::_load()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use JComponentHelper::load() instead"
										),
										'\Joomla\CMS\Object\CMSObject::__toString()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "12.3 Classes should provide their own __toString() implementation."
										),
										'\Joomla\CMS\Object\CMSObject::getError()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "12.3 JError has been deprecated"
										),
										'\Joomla\CMS\Object\CMSObject::getErrors()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "12.3 JError has been deprecated"
										),
										'\Joomla\CMS\Object\CMSObject::setError()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "12.3 JError has been deprecated"
										),
										'\Joomla\CMS\Object\CMSObject::_errors' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "12.3 JError has been deprecated"
										),
										'\Joomla\CMS\Access\Access::preloadPermissionsParentIdMapping()' => array(
											'3.7.0' => false,
											'4.0' => true,
											'alternative' => "3.7.0 No replacement. Will be removed in 4.0."
										),
										'\Joomla\CMS\Access\Access::getActions()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "12.3 (Platform) & 4.0 (CMS)  Use Access::getActionsFromFile or Access::getActionsFromData instead."
										),
										'\Joomla\CMS\Access\Access::assetPermissionsById' => array(
											'3.7.0' => false,
											'4.0' => true,
											'alternative' => "3.7.0 No replacement. Will be removed in 4.0."
										),
										'\Joomla\CMS\Access\Access::assetPermissionsByName' => array(
											'3.7.0' => false,
											'4.0' => true,
											'alternative' => "3.7.0 No replacement. Will be removed in 4.0."
										),
										'\Joomla\CMS\Access\Wrapper\Access::clearStatics()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>Joomla\CMS\Access\Access</code> directly"
										),
										'\Joomla\CMS\Access\Wrapper\Access::check()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>Joomla\CMS\Access\Access</code> directly"
										),
										'\Joomla\CMS\Access\Wrapper\Access::checkGroup()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>Joomla\CMS\Access\Access</code> directly"
										),
										'\Joomla\CMS\Access\Wrapper\Access::getAssetRules()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>Joomla\CMS\Access\Access</code> directly"
										),
										'\Joomla\CMS\Access\Wrapper\Access::getGroupsByUser()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>Joomla\CMS\Access\Access</code> directly"
										),
										'\Joomla\CMS\Access\Wrapper\Access::getUsersByGroup()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>Joomla\CMS\Access\Access</code> directly"
										),
										'\Joomla\CMS\Access\Wrapper\Access::getAuthorisedViewLevels()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>Joomla\CMS\Access\Access</code> directly"
										),
										'\Joomla\CMS\Access\Wrapper\Access::getActions()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "12.3 (Platform) & 4.0 (CMS)  Use StaticAccess::getActionsFromFile or StaticAccess::getActionsFromData instead."
										),
										'\Joomla\CMS\Access\Wrapper\Access::getActionsFromFile()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>Joomla\CMS\Access\Access</code> directly"
										),
										'\Joomla\CMS\Access\Wrapper\Access::getActionsFromData()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>Joomla\CMS\Access\Access</code> directly"
										),
										'\Joomla\CMS\Editor\Editor::save()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Bind functionality to form submit through javascript"
										),
										'\Joomla\CMS\Editor\Editor::getContent()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use Joomla.editors API, see core.js"
										),
										'\Joomla\CMS\Editor\Editor::setContent()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use Joomla.editors API, see core.js"
										),
										'\Joomla\CMS\HTML\HTMLHelper::getMd5Version()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Usage of MD5SUM files is deprecated, use version instead."
										),
										'\Joomla\CMS\HTML\HTMLHelper::stylesheet()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "4.0 Use <code>json_encode()</code> or <code>Joomla\Registry\Registry::toString('json')</code> instead"
										),
										'\Joomla\Session\Storage\Database::__construct()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "2.0 "
										),
										'\Joomla\Session\Storage\Database::read()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "2.0 "
										),
										'\Joomla\Session\Storage\Database::write()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "2.0 "
										),
										'\Joomla\Session\Storage\Database::destroy()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "2.0 "
										),
										'\Joomla\Session\Storage\Database::gc()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "2.0 "
										),
										'\Joomla\Session\Storage\Database::db' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "2.0 "
										),
										'\Joomla\Session\Storage\Memcache::__construct()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "2.0 "
										),
										'\Joomla\Session\Storage\Memcache::register()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "2.0 "
										),
										'\Joomla\Session\Storage\Memcache::isSupported()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "2.0 "
										),
										'\Joomla\Session\Storage\Memcache::_servers' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 "
										),
										'\Joomla\Session\Storage\Xcache::__construct()' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 "
										),
										'\Joomla\Session\Storage\Xcache::read()' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 "
										),
										'\Joomla\Session\Storage\Xcache::write()' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 "
										),
										'\Joomla\Session\Storage\Xcache::destroy()' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 "
										),
										'\Joomla\Session\Storage\Xcache::isSupported()' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 "
										),
										'\Joomla\Session\Storage\Memcached::__construct()' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 "
										),
										'\Joomla\Session\Storage\Memcached::register()' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 "
										),
										'\Joomla\Session\Storage\Memcached::isSupported()' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 "
										),
										'\Joomla\Session\Storage\Memcached::_servers' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 "
										),
										'\Joomla\Session\Storage\Wincache::__construct()' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 "
										),
										'\Joomla\Session\Storage\Wincache::register()' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 "
										),
										'\Joomla\Session\Storage\Wincache::isSupported()' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 "
										),
										'\Joomla\Session\Storage\Apc::__construct()' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 "
										),
										'\Joomla\Session\Storage\Apc::read()' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 "
										),
										'\Joomla\Session\Storage\Apc::write()' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 "
										),
										'\Joomla\Session\Storage\Apc::destroy()' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 "
										),
										'\Joomla\Session\Storage\Apc::isSupported()' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 "
										),
										'\Joomla\Session\Storage\None::register()' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 "
										),
										'\Joomla\Session\Storage::__construct()' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 "
										),
										'\Joomla\Session\Storage::getInstance()' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 "
										),
										'\Joomla\Session\Storage::register()' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 "
										),
										'\Joomla\Session\Storage::open()' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 "
										),
										'\Joomla\Session\Storage::close()' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 "
										),
										'\Joomla\Session\Storage::read()' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 "
										),
										'\Joomla\Session\Storage::write()' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 "
										),
										'\Joomla\Session\Storage::destroy()' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 "
										),
										'\Joomla\Session\Storage::gc()' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 "
										),
										'\Joomla\Session\Storage::isSupported()' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 "
										),
										'\Joomla\Session\Storage::instances' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 "
										),
										'\Joomla\Session\Session::__get()' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 Use get methods for non-deprecated properties"
										),
										'\Joomla\Session\Session::getInstance()' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 A singleton object store will no longer be supported"
										),
										'\Joomla\Session\Session::getStores()' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 The Storage class chain will be removed"
										),
										'\Joomla\Session\Session::initialise()' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 In 2.0 the DispatcherInterface should be injected via the object constructor"
										),
										'\Joomla\Session\Session::_start()' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 "
										),
										'\Joomla\Session\Session::_setCookieParams()' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 "
										),
										'\Joomla\Session\Session::_createToken()' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 Use createToken instead"
										),
										'\Joomla\Session\Session::_setCounter()' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 Use setCounter instead"
										),
										'\Joomla\Session\Session::_setTimers()' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 Use setTimers instead"
										),
										'\Joomla\Session\Session::_setOptions()' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 Use setOptions instead"
										),
										'\Joomla\Session\Session::_validate()' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 Use validate instead"
										),
										'\Joomla\Session\Session::cookie_domain' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 "
										),
										'\Joomla\Session\Session::cookie_path' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 "
										),
										'\Joomla\Session\Session::instance' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 "
										),
										'\Joomla\Session\Session::storeName' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 "
										),
										'\Joomla\Event\Dispatcher::setListenerFilter()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "Incorporate a method in your listener object such as <code>getEvents</code> to feed into the <code>setListener</code> method."
										),
										'\Joomla\Event\Dispatcher::listenerFilter' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 The getter will no longer be part of the interface."
										),
										'\Joomla\Filter\InputFilter::decode()' => array(
											'4.0' => false,
											'4.0' => true,
											'alternative' => "This method will be removed once support for PHP 5.3 is discontinued."
										),
										'\Joomla\Filter\InputFilter::instances' => array(
											'1.2.0' => false,
											'4.0' => true,
											'alternative' => "1.2.0 "
										),
										'\Joomla\Registry\AbstractRegistryFormat::getInstance()' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 Use Factory::getFormat() instead"
										),
										'\Joomla\Registry\AbstractRegistryFormat::instances' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 Object caching will no longer be supported"
										),
										'\Joomla\Registry\Factory::formatInstances' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 Object caching will no longer be supported"
										),
										'\Joomla\Registry\Registry::getInstance()' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 Instantiate a new Registry instance instead"
										),
										'\Joomla\Registry\Registry::instances' => array(
											'2.0' => false,
											'4.0' => true,
											'alternative' => "2.0 Object caching will no longer be supported"
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

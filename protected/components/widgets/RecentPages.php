<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

Yii::import('zii.widgets.CPortlet');
/**
 * RecentPages represents widget that displays last added pages.
 *
 * @package Yiitrn\components\widgets
 * @author  Eugene Zakursky <Eugene.Zakursky@sigmaukraine.com>
 */
class RecentPages extends CPortlet
{
	/**
	 * Widget title.
	 *
	 * @var string
	 */
	public $title = 'Recent Pages';

	/**
	 * Maximum number of pages.
	 *
	 * @var integer
	 */
	public $maxPages = 10;

	/**
	 * Get last pages.
	 *
	 * @return mixed
	 */
	public function getRecentPages()
	{
		return Page::model()->findRecentPages($this->maxPages);
	}

	/**
	 * Render widget.
	 *
	 * @return void
	 */
	protected function renderContent()
	{
		$this->render('recentPages');
	}

}
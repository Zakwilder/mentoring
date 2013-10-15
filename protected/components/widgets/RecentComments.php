<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

Yii::import('zii.widgets.CPortlet');
/**
 * RecentComments represents widget that displays last made comments.
 *
 * @package Yiitrn\components\widgets
 * @author  Eugene Zakursky <Eugene.Zakursky@sigmaukraine.com>
 */
class RecentComments extends CPortlet
{
	/**
	 * Widget title.
	 *
	 * @var string
	 */
	public $title = 'Recent Comments';

	/**
	 * Maximum number of comments.
	 *
	 * @var integer
	 */
	public $maxComments = 10;

	/**
	 * Get last comments.
	 *
	 * @return mixed
	 */
	public function getRecentComments()
	{
		return Comments::model()->findRecentComments($this->maxComments);
	}

	/**
	 * Render widget.
	 *
	 * @return void
	 */
	protected function renderContent()
	{
		$this->render('recentComments');
	}

}
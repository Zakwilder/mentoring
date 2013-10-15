<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * UrlManager represents logic for language-compatible url paths.
 *
 * @package Yiitrn\components
 * @author  aprogonniy <alexey.progonniy@sigmaukraine.com>
 */
class UrlManager extends CUrlManager
{

	/**
	 * Create url using user language settings if exists or global website settings.
	 *
	 * @param string $route     Initial called url path.
	 * @param array  $params    Initial called url params.
	 * @param string $ampersand Params divider.
	 *
	 * @return string
	 */
	public function createUrl($route, $params = array(), $ampersand = '&')
	{
		if (!isset($params['language'])) {
			if (Yii::app()->user->hasState('language')) {
				Yii::app()->language = Yii::app()->user->getState('language');
			}
			else if (isset(Yii::app()->request->cookies['language'])) {
				Yii::app()->language = Yii::app()->request->cookies['language']->value;
			}

			$params['language'] = Yii::app()->language;
		}

		return parent::createUrl($route, $params, $ampersand);
	}

}
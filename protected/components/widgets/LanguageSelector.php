<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * LanguageSelector represents widget with change language controls.
 *
 * @package Yiitrn\components\widgets
 * @author  aprogonniy <alexey.progonniy@sigmaukraine.com>
 */
class LanguageSelector extends CWidget
{

	/**
	 * Generate widget using global configuration settings.
	 *
	 * @return void
	 */
	public function run()
	{
		$currentLang = Yii::app()->language;
		$languages   = Yii::app()->params->languages;

		$langParams = array();
		foreach ($languages as $key => $lang) {
			$langLink['label'] = $lang;
			$langLink['url']   = $this->getOwner()->createMultilanguageReturnUrl($key);
			$langLink['icon'] = 'flag_' . $key;
			if ($key != $currentLang) {
				$langLink['active'] = false;
			}
			else {
				$langLink['active'] = true;
			}

			$langParams[] = $langLink;
		}

		$this->render('languageSelector', array('currentLang' => $currentLang, 'languages' => $langParams));
	}

}
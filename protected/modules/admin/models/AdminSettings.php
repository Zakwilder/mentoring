<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * Default Admin controller.
 *
 * @package Yiitrn\modules\admin\models
 * @author  aprogonniy <alexey.progonniy@sigmaukraine.com>
 */
class AdminSettings extends CActiveRecord
{
	/**
	 * Name of maintenance page template file.
	 *
	 * @var string
	 */
	private $_templateFilename;
	/**
	 * Name of maintenance page config file.
	 *
	 * @var string
	 */
	private $_configFilename;

	/**
	 * Is maintenance mode enabled.
	 *
	 * @var boolean
	 */
	public $enabled;
	/**
	 * Message for maintenance page.
	 *
	 * @var string
	 */
	public $message;
	/**
	 * Content of maintenance page template file.
	 *
	 * @var string
	 */
	public $templateContent;
	/**
	 * Name of settings config file.
	 *
	 * @var string
	 */
	private $_settingsFilename;
	/**
	 * Is captcha enabled.
	 *
	 * @var boolean
	 */
	public $captcha;
	/**
	 * Number of recent comments.
	 *
	 * @var integer
	 */
	public $recentComments;
	/**
	 * Number of recent pages.
	 *
	 * @var integer
	 */
	public $recentPages;

	/**
	 * AdminSettings class constructor.
	 */
	public function __construct()
	{
		$this->_templateFilename = Yii::app()->basePath . '/extensions/MaintenanceMode/views/index.php';
		$this->_configFilename   = Yii::app()->basePath . '/config/_maintenance.php';
		$this->_settingsFilename   = Yii::app()->basePath . '/config/_settings.php';

		$this->enabled = Yii::app()->params['maintenanceMode']['enabled'];
		$this->message = Yii::app()->params['maintenanceMode']['message'];
		$this->captcha = Yii::app()->params['settings']['captcha'];
		$this->recentComments = Yii::app()->params['settings']['recentComments'];
		$this->recentPages = Yii::app()->params['settings']['recentPages'];

		$this->templateContent = file_get_contents($this->_templateFilename);
	}

	/**
	 * Store new settings to config files.
	 *
	 * @param array $newSettings Form values.
	 *
	 * @return void
	 */
	public function storeSettings(array $newSettings)
	{
		$this->enabled = Yii::app()->params['maintenanceMode']['enabled'] = $newSettings['enabled'];
		$this->message = Yii::app()->params['maintenanceMode']['message'] = $newSettings['message'];
		$this->captcha = Yii::app()->params['settings']['captcha'] = $newSettings['captcha'];
		$this->recentComments = Yii::app()->params['settings']['recentComments'] = $newSettings['recentComments'];
		$this->recentPages = Yii::app()->params['settings']['recentPages'] = $newSettings['recentPages'];

		file_put_contents($this->_configFilename, $newSettings['enabled'] . "\r\n" . $newSettings['message']);

		file_put_contents($this->_templateFilename, $newSettings['templateContent']);

		file_put_contents($this->_settingsFilename, $newSettings['captcha'] . "\r\n" . $newSettings['recentComments'] . "\r\n" . $newSettings['recentPages']);
	}

	/**
	 * Aliases for model parameters for i18n support.
	 *
	 * @return array
	 */
	public function attributeLabels()
	{
		return array(
			'enabled' => Yii::t('admin', 'Enabled'),
			'message' => Yii::t('admin', 'Message'),
			'templateContent' => Yii::t('admin', 'Content of template file'),
			'captcha' => Yii::t('admin', 'Captcha Enabled'),
			'recentComments' => Yii::t('admin', 'Number of recent comments'),
			'recentPages' => Yii::t('admin', 'Number of recent pages'),
		);
	}

}

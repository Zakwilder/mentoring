<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * Default Api module class.
 *
 * @package Yiitrn\modules\api\
 * @author  Alexander Bespalko <Alexander.Bespalko@sigmaukraine.com>
 */
class ApiModule extends CWebModule
{

	/**
	 * Init api module.
	 *
	 * @return void
	 */
	public function init()
	{
		// This method is called when the module is being created
		// You may place code here to customize the module or the application
		// Import the module-level models and components
		$this->setImport(array(
			'api.models.*',
			'api.components.*',
			'admin.models.*',
		));
	}

	/**
	 * The pre-filter for controller actions.
	 *
	 * @param CController $controller
	 * @param CAction $action
	 *
	 * @return boolean
	 */
	public function beforeControllerAction($controller, $action)
	{
		if (parent::beforeControllerAction($controller, $action)) {
			// This method is called before any module controller action is performed
			// You may place customized code here
			return true;
		}
		else {
			return false;
		}
	}

}

<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * Class AdminModule.
 *
 * @package Yiitrn\modules\admin\Admin
 * @author  Eugene Zakursky <Eugene.Zakursky@sigmaukraine.com>
 */
class AdminModule extends CWebModule
{
	/**
	 * Init function.
	 *
	 * @return void
	 */

	public function init()
	{
		/*
		 * This method is called when the module is being created
		 * you may place code here to customize the module or the application
		 * import the module-level models and components
		 */

		$this->setImport(array(
			'admin.models.*',
			'admin.components.*',
		));
	}

	/**
	 * The pre-filter for controller actions.
	 *
	 * @param object $controller The controller.
	 * @param object $action     The action.
	 *
	 * @return boolean
	 */
	public function beforeControllerAction($controller, $action)
	{
		if (parent::beforeControllerAction($controller, $action)) {

			// This method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else {
			return false;
		}
	}

}

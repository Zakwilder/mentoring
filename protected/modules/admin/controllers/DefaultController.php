<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * Default Admin controller.
 *
 * @package Yiitrn\modules\admin\controllers
 * @author  Eugene Zakursky <Eugene.Zakursky@sigmaukraine.com>
 */

class DefaultController extends Controller
{
	/**
	 * Layout for AdminController.
	 *
	 * @var string
	 */
	public $layout = 'content';

	/**
	 * Controller filters.
	 *
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl',
		);
	}

	/**
	 * Specifies the access control rules. This method is used by the 'accessControl' filter.
	 *
	 * @return array
	 */
	public function accessRules()
	{
		return array(
			array('allow',
				'controllers' => array('default'),
				'roles' => array('superadmin', 'admin'),
			),
			// Deny all users
			array('deny',
				'users' => array('*'),
			),
		);
	}

	/**
	 * Displays Admin main page.
	 *
	 * @return void
	 */
	public function actionIndex()
	{
		$this->render('index');
	}

}
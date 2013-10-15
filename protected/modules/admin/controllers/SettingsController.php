<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * Admin settings controller.
 *
 * @package Yiitrn\modules\admin\controllers
 * @author  aprogonniy <alexey.progonniy@sigmaukraine.com>
 */
class SettingsController extends Controller
{
	/**
	 * Layout for SettingsController.
	 *
	 * @var string
	 */
	public $layout = 'content';

	/**
	 * Specifies the access control rules. This method is used by the 'accessControl' filter.
	 *
	 * @return array
	 */
	public function accessRules()
	{
		return array(
			array('allow',
				'controllers' => array('settings'),
				'roles' => array('superadmin', 'admin'),
			),
			// Deny all users
			array('deny',
				'users' => array('*'),
			),
		);
	}

	/**
	 * Displays Admin settings page.
	 *
	 * @return void
	 */
	public function actionIndex()
	{
		$model = new AdminSettings();
		$this->render('globals', array('model' => $model));
	}

	/**
	 * Page callback.
	 *
	 * @param object $action Called action.
	 *
	 * @return boolean
	 */
	public function beforeAction($action)
	{
		if (isset($_POST['AdminSettings'])) {
			$model = new AdminSettings();
			$model->storeSettings($_POST['AdminSettings']);

			Yii::app()->user->setFlash('success', Yii::t('admin', 'Settings have been successfully saved!'));
			$this->refresh();
		}

		return parent::beforeAction($action);
	}

}
<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * Page controller.
 *
 * @package Yiitrn\controllers\User
 * @author  Eugene Zakursky <Eugene.Zakursky@sigmaukraine.com>
 */
class UserController extends Controller
{
	/**
	 * Default layout for UserController.
	 *
	 * @var string
	 */
	public $layout = 'column1';

	/**
	 * Action filters.
	 *
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			// Perform access control for CRUD operations.
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
				'actions' => array('profile', 'edit', 'changepassword'),
				'users' => array('@'),
			),
			// Deny all users
			array('deny',
				'users' => array('*'),
			),
		);
	}

	/**
	 * Displays user profile.
	 *
	 * @return void
	 */
	public function actionProfile()
	{
		$model = $this->loadModel();

		$this->render('profile', array('model' => $model));
	}

	/**
	 * Edit user profile.
	 *
	 * @return void
	 */
	public function actionEdit()
	{
		$model = $this->loadModel();

		if (isset($_POST['User'])) {
			$model->attributes = $_POST['User'];
			if ($model->save()) {
				$this->redirect('profile');
			}
		}

		$this->render('edit', array('model' => $model));
	}

	/**
	 *  Change user password.
	 *
	 * @return void
	 */
	public function actionChangePassword()
	{
		$form = new ChangePassForm();
		$model = $this->loadModel();

		if (isset($_POST['ChangePassForm'])) {
			$form->attributes = $_POST['ChangePassForm'];
			if ($form->validate()) {
				$model->password = $_POST['ChangePassForm']['password'];
				$model->password = $model->hashPassword($model->password);
				if (!$form->hasErrors() && $model->save()) {
					$this->redirect('profile');
				}
			}
		}

		$this->render('changepassword', array('model' => $form));
	}

	/**
	 * Returns the data model based on the session attributes of current user. If the data model is not found, an HTTP exception will be raised.
	 *
	 * @return User the loaded model.
	 *
	 * @throws CHttpException Throws exception.
	 */
	public function loadModel()
	{
		$username = Yii::app()->user->name;
		$model = User::model()->findByAttributes(array('username' => $username));
		if ($model === null) {
			throw new CHttpException(404, 'The requested page does not exist.');
		}
		return $model;
	}

}

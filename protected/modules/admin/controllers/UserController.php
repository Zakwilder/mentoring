<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * Default Admin controller.
 *
 * @package Yiitrn\modules\admin\controllers
 * @author  Alexander Bespalko <Alexander.Bespalko@sigmaukraine.com>
 */
class UserController extends Controller
{
	/**
	 * Layout for AdminController.
	 *
	 * @var string
	 */
	public $layout = 'content';

	/**
	 * Layout path.
	 *
	 * @var string
	 */
	public $layoutPath;

	/**
	 * Controller filters.
	 *
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl',
			// Allow deletion via POST request only
			'postOnly + delete',
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
				'actions' => array('recovery'),
				'users' => array('?'),
			),
			array('deny',
				'actions' => array('recovery'),
				'users' => array('@'),
			),
			array('allow',
				'controllers' => array('user'),
				'users' => array('@'),
				'roles' => array('superadmin', 'admin'),
			),
			array('allow',
				'actions' => array('activate'),
				'roles' => array('superadmin'),
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
		$model = new AdminUser();
		$this->render('users', array('model' => $model));
	}

	/**
	 * Displays a particular model.
	 *
	 * @param integer $id The ID of the model to be displayed.
	 *
	 * @return void
	 */
	public function actionView($id)
	{
		$this->render('view', array(
			'model' => $this->loadModel($id),
		));
	}

	/**
	 * Register new user action.
	 *
	 * @return void
	 */
	public function actionCreate()
	{
		$model = new AdminUser;

		if (isset($_POST['AdminUser'])) {
			$model->attributes = $_POST['AdminUser'];
			if ($model->save()) {
				$this->redirect(array('/admin/user'), array('model' => $model));
			}
		}

		$this->render('create', array(
			'model' => $model,
		));
	}

	/**
	 * Updates a particular model. If update is successful, the browser will be redirected to the 'view' page.
	 *
	 * @param integer $id The ID of the model to be updated.
	 *
	 * @return void
	 */
	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);
		$form = new ChangePassForm();

		if (isset($_POST['AdminUser'])) {
			$model->attributes = $_POST['AdminUser'];
			if ($model->save()) {
				$this->redirect(array('view','id' => $model->id));
			}
		}

		if (isset($_POST['ChangePassForm'])) {
			$form->attributes = $_POST['ChangePassForm'];
			if ($form->validate()) {
				$model->password = $_POST['ChangePassForm']['password'];
				$model->password = $model->hashPassword($model->password);
				if (!$form->hasErrors() && $model->save()) {
					$this->redirect(array('/admin/user/view', 'id' => $model->id));
				}
			}
		}
		$this->render('update', array(
			'model' => $model,
			'form' => $form,
		));
	}

	/**
	 * Deletes a particular model. If deletion is successful, the browser will be redirected to the 'admin' page.
	 *
	 * @param integer $id The ID of the model to be deleted.
	 *
	 * @return void
	 */
	public function actionDelete($id)
	{
		$user = $this->loadModel($id);

		if ($user && ($user->id == Yii::app()->user->id)) {
			Yii::app()->user->setFlash('USER_SELF_DELETE_ERROR', Yii::t('admin', 'You can not delete your own account'));
		}
		else if (!Yii::app()->user->checkAccess('deleteUser')) {
			Yii::app()->user->setFlash('USER_DELETE_NO_PERMISSIONS', Yii::t('admin',
				'You have not access to delete users'));
		}
		else {
			if ($user->delete()) {
				Yii::app()->user->setFlash('USER_DELETED', Yii::t('admin', 'The User has been deleted'));
			}

			// If AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if (!isset($_GET['ajax'])) {
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
			}
		}
	}

	/**
	 * Recovery user`s password action.
	 *
	 * @param string $email User`s email.
	 * @param string $key   User`s activation key.
	 *
	 * @throws CHttpException Throws error exception.
	 *
	 * @return void
	 */
	public function actionRecovery($email = null, $key = null)
	{
		$this->layoutPath = Yii::getPathOfAlias('application.views.layouts');
		$this->layout = '//layouts/column1';

		$form = new PasswordRecoveryForm;

		if ($email != null && $key != null) {
			$criteria = new CDbCriteria();
			$time = new CDbExpression('NOW()');
			$criteria->addCondition('activationExpTime >= ' . $time);
			$criteria->compare('email', $email);
			$criteria->compare('activationKey', $key);
			if ($user = AdminUser::model()->find($criteria)) {
					$passwordform = new ChangePassForm;
					if (isset($_POST['ChangePassForm'])) {
						$passwordform->attributes = $_POST['ChangePassForm'];
						if ($passwordform->validate()) {
							$user->password = $user->hashPassword($passwordform->password);
							$user->activationKey = $user->generateActivationKey();
							$user->save();
							Yii::app()->user->setFlash('passwordChanged', Yii::t('admin',
								'Password has been changed! Now you can log in with your new password!'));
							$this->redirect('/site/login');
						}
					}
					$this->render(
						'changepassword',
						array(
							'model' => $passwordform,
							'user' => $user
						)
					);
					Yii::app()->end();
			}
			else {
				throw new CHttpException(404, Yii::t('admin', 'Invalid username or recovery key is wrong'));
			}
		}
		if (isset($_POST['PasswordRecoveryForm'])) {
			$form->attributes = $_POST['PasswordRecoveryForm'];
			if ($form->validate()) {
				if ($form->user instanceof AdminUser) {
					$form->user->activationKey = $form->user->generateActivationKey();
					$form->user->activationExpTime = new CDbExpression('NOW() + INTERVAL 2 DAY');
					$form->user->save(false, array('activationKey', 'activationExpTime'));
					$recovery_url = $this->createAbsoluteUrl(
						'',
						array(
							'key' => $form->user->activationKey,
							'email' => $form->user->email,
						)
					);
					$message = $recovery_url;
					if ($this->sendMail($form->user->email, 'Password Recovery', $message)) {
						Yii::app()->user->setFlash('successEmailSent', Yii::t('admin', 'Email has been sent!'));
					}
				}
				else {
					$form->addError('login_or_email', Yii::t('admin', 'User does not exist'));
				}
			}
		}
		$this->render('recovery', array('model' => $form));
	}

	/**
	 * User activation.
	 *
	 * @param integer $id User's id.
	 *
	 * @return void
	 */
	public function actionActivate($id)
	{
		$user = $this->loadModel($id);
		$user->active = 1;
		if ($user->save()) {
			$this->redirect(array('index'));
		}
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable. If the data model is not found, an HTTP exception will be raised.
	 *
	 * @param integer $id The ID of the model to be loaded.
	 *
	 * @return User the loaded model.
	 *
	 * @throws CHttpException Throws exception.
	 */
	public function loadModel($id)
	{
		$model = AdminUser::model()->findByPk($id);
		if ($model === null) {
			throw new CHttpException(404, 'The requested page does not exist.');
		}
		return $model;
	}

}
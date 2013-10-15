<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * Site controller class implementation.
 *
 * @package Yiitrn
 * @author  aprogonniy <alexey.progonniy@sigmaukraine.com>
 */
class SiteController extends Controller
{
	/**
	 * Default layout for SiteController.
	 *
	 * @var string
	 */
	public $layout = 'column1';

	/**
	 * Declares class-based actions.
	 *
	 * @return array
	 */
	public function actions()
	{
		return array(
			// Captcha action renders the CAPTCHA image displayed on the contact page
			'captcha' => array(
				'class' => 'CCaptchaAction',
				'backColor' => 0xFFFFFF,
			),
			// Page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page' => array(
				'class' => 'CViewAction',
			),
		);
	}

	/**
	 * This is the action to handle external exceptions.
	 *
	 * @return void
	 */
	public function actionError()
	{
		if ($error = Yii::app()->errorHandler->error) {
			if (Yii::app()->request->isAjaxRequest) {
				echo $error['message'];
			}
			else {
				$this->render('error', $error);
			}
		}
	}

	/**
	 * Displays the login page.
	 *
	 * @return void
	 *
	 * @throws CHttpException Blowfish php compiler error.
	 */
	public function actionLogin()
	{
		$service = Yii::app()->request->getQuery('service');
		if (isset($service)) {
			$authIdentity = Yii::app()->eauth->getIdentity($service);
			$authIdentity->redirectUrl = Yii::app()->user->returnUrl;
			$authIdentity->cancelUrl = $this->createAbsoluteUrl('site/login');

			if ($authIdentity->authenticate()) {
				$identity = new EAuthUserIdentity($authIdentity);

				// Successful authentication
				if ($identity->authenticate()) {
					Yii::app()->user->login($identity);

					// Special redirect with closing popup window
					$authIdentity->redirect();
				}
				else {
					// Close popup window and redirect to cancelUrl
					$authIdentity->cancel();
				}
			}

			// Something went wrong, redirect to login page
			$this->redirect(array('site/login'));
		}

		if (!defined('CRYPT_BLOWFISH') || !CRYPT_BLOWFISH) {
			throw new CHttpException(500, 'This application requires that PHP was compiled with Blowfish support for crypt().');
		}

		if (!Yii::app()->user->isGuest) {
			$this->redirect(Yii::app()->user->returnUrl);
		}

		$model = new LoginForm;

		// If it is ajax validation request
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// Collect user input data
		if (isset($_POST['LoginForm'])) {
			$model->attributes = $_POST['LoginForm'];
			// Validate user input and redirect to the previous page if valid
			if ($model->validate() && $model->login()) {
				if (!Yii::app()->user->checkAccess('admin')) {
					$this->redirect('index');
				}
				$this->redirect('/admin');
			}
		}
		// Display the login form
		$this->render('login', array('model' => $model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 *
	 * @return void
	 */
	public function actionLogout()
	{
		if (Yii::app()->user->isGuest) {
			$this->redirect(Yii::app()->user->returnUrl);
		}

		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	/**
	 * Register user.
	 *
	 * @return void
	 */
	public function actionRegister()
	{
		if (!Yii::app()->user->isGuest) {
			$this->redirect(Yii::app()->user->returnUrl);
		}
		$model = new User();

		if (isset($_POST['User'])) {
			$model->attributes = $_POST['User'];
			$model->verifyCode = $_POST['User']['verifyCode'];

			if ($model->validate()) {
				if ($model->model()->count('username=:username', array(':username' => $model->username))) {
					$model->addError('login', Yii::t('front', 'Username already exists'));
					$this->render('registration', array('model' => $model));
				}
				else {
					$model->save();
					$this->redirect('index');

				}
			}
		}

		$this->render('registration', array('model' => $model));
	}

	/**
	 *  Displays main site page.
	 *
	 * @return void
	 */
	public function actionIndex()
	{
		$model = Category::model()->findAll();
		$this->render('index', array('model' => $model));
	}

	/**
	 * View list of pages.
	 *
	 * @param string $slug Slug of the specified category.
	 *
	 * @return void
	 */
	public function actionPages($slug = null)
	{
		$criteria = new CDbCriteria();
		if ($slug != null) {
			$criteria->condition = 'category.slug = :slug';
			$criteria->params = array(
				':slug' => $slug,
			);
		}
		$criteria->addCondition('visibility = 1');
		$count = Page::model()->with('category')->count($criteria);
		$paginator = new CPagination($count);
		$paginator->pageSize = 3;
		$paginator->applyLimit($criteria);
		$model = Page::model()->with('category')->findAll($criteria);
		$this->render('pages', array(
			'model' => $model,
			'pages' => $paginator,
		));
	}

}

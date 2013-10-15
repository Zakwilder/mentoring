<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * Partners Admin controller.
 *
 * @package Yiitrn\modules\admin\controllers\Partners
 * @author  Eugene Zakursky <Eugene.Zakursky@sigmaukraine.com>
 */
class PartnersController extends Controller
{

	/**
	 * Default layout for controller.
	 *
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = 'content';

	/**
	 * Action filters.
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
	 * Specifies the access control rules.
	 *
	 * This method is used by the 'accessControl' filter.
	 *
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',
				'actions' => array('index','view'),
				'users' => array('@'),
			),
			array('allow',
				'actions' => array('create','update'),
				'users' => array('@'),
				'roles' => array('admin'),
			),
			array('allow',
				'actions' => array('admin','delete'),
				'users' => array('@'),
				'roles' => array('admin')
			),
			array('deny',
				'users' => array('*'),
			),
		);
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
	 * Creates a new model.
	 *
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 *
	 * @return void
	 */
	public function actionCreate()
	{
		$model = new Partners;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if (isset($_POST['Partners'])) {
			$model->attributes = $_POST['Partners'];
			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array(
			'model' => $model,
		));
	}

	/**
	 * Updates a particular model.
	 *
	 * If update is successful, the browser will be redirected to the 'view' page.
	 *
	 * @param integer $id The ID of the model to be updated.
	 *
	 * @return void
	 */
	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if (isset($_POST['Partners'])) {
			$model->attributes = $_POST['Partners'];
			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
			'model' => $model,
		));
	}

	/**
	 * Deletes a particular model.
	 *
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 *
	 * @param integer $id The ID of the model to be deleted.
	 *
	 * @return void
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// If AJAX request (triggered by deletion via admin grid view), we should not redirect the browser.
		if (!isset($_GET['ajax'])) {
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
		}
	}

	/**
	 * Lists all models.
	 *
	 * @return void
	 */
	public function actionIndex()
	{
		$model = new Partners('search');

		$model->unsetAttributes();
		if (isset($_GET['Partners'])) {
			$model->attributes = $_GET['Partners'];
		}
		$this->render('index', array(
			'model'         => $model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 *
	 * If the data model is not found, an HTTP exception will be raised.
	 *
	 * @param integer $id The ID of the model to be loaded.
	 *
	 * @return Partners the loaded model
	 * @throws CHttpException Throws exception if page does not exist.
	 */
	public function loadModel($id)
	{
		$model = Partners::model()->findByPk($id);
		if ($model === null) {
			throw new CHttpException(404, 'The requested page does not exist.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 *
	 * @param Partners $model The model to be validated.
	 *
	 * @return void
	 */
	protected function performAjaxValidation(Partners $model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'partners-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

}

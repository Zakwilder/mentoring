<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * Performs requests for category.
 *
 * @package Yiitrn\modules\api\controllers
 * @author  Alexander Bespalko <Alexander.Bespalko@sigmaukraine.com>
 */
class CategoryController extends ApiController
{

	/**
	 * Get category list from a model.
	 *
	 * @return array Array of category objects.
	 */
	public function actionAll()
	{
		$data = Category::model()->findAll();
		return $this->sendResponse($data);
	}

	/**
	 * Returns single category that given in url by id.
	 *
	 * @param integer $id Category id.
	 *
	 * @return object|null
	 */
	public function actionSingle($id)
	{
		$data = Category::model()->findByPk($id);
		return $this->sendResponse($data);
	}

}
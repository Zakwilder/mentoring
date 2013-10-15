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
class PageController extends ApiController
{

	/**
	 * Get category list from a model.
	 *
	 * @return array Array of category objects.
	 */
	public function actionAll()
	{
		$data = Page::model()->findAll('visibility=1');
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
		$data = Page::model()->findByPk($id, 'visibility=1');
		return $this->sendResponse($data);
	}

}
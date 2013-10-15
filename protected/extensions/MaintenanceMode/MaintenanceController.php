<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * Maintenance mode controller class implementation.
 *
 * @package Yiitrn\extensions\MaintenanceMode\views
 * @author  aprogonniy <alexey.progonniy@sigmaukraine.com>
 */
class MaintenanceController extends CExtController
{

	/**
	 * Display maintenance page.
	 *
	 * @return void
	 */
	public function actionIndex()
	{
		$this->renderPartial('index');
	}

}

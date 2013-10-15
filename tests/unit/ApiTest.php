<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * API tests.
 *
 * @package Yiitrn\Tests\Unit
 * @author  Alexander Bespalko <alexander.bespalko@sigmaukraine.com>
 */
class ApiTest extends CTestCase
{

	/**
	 * Set up tests.
	 *
	 * @return void
	 */
	public function setUp()
	{
		Yii::import('application.modules.api.components.*');
		Yii::import('application.modules.api.controllers.*');
	}

	/**
	 * Sending request to API.
	 *
	 * @return void
	 */
	public function testSendRequestJSON()
	{
		$this->_setRequestData('json');
		$apiCategory = new CategoryController('Category', Yii::app()->getModule('api'));
		$this->assertTrue($apiCategory != null);
		$this->assertInstanceOf('CategoryController', $apiCategory);

		$apiCategory->init();
		$echo = $apiCategory->actionAll();
		$echo = CJSON::decode($echo);

		$this->assertArrayNotHasKey('error', $echo);
		$this->assertArrayNotHasKey('message', $echo);
		$this->assertArrayNotHasKey('code', $echo);
	}

	/**
	 * Sending request to API.
	 *
	 * @return void
	 */
	public function testSendRequestXML()
	{
		$this->_setRequestData('xml');
		$apiCategory = new CategoryController('Category', Yii::app()->getModule('api'));
		$this->assertTrue($apiCategory != null);
		$this->assertInstanceOf('CategoryController', $apiCategory);

		$apiCategory->init();
		$echo = $apiCategory->actionAll();

		$this->assertArrayNotHasKey('error', $echo);
		$this->assertArrayNotHasKey('message', $echo);
		$this->assertArrayNotHasKey('code', $echo);
	}

	/**
	 * Sets fixture data.
	 *
	 * @param string $output Output type.
	 *
	 * @return void
	 */
	private function _setRequestData($output)
	{
		$_POST['output'] = $output;
		$_POST['key'] = 'mtUUXDU45y38.';
		$_POST['timestamp'] = time();
		$_POST['token'] = ApiHelper::getApiToken($_POST);
	}

}
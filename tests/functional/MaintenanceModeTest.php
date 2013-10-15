<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * Maintenance mode test suite implementation.
 *
 * Before running this test suite you should change config file 'config\params.php' manually.
 * Yii::app()->params['maintenanceMode']['enabledMode'] = true;
 * Yii::app()->params['maintenanceMode']['urls'] = array('site/login');
 * Yii::app()->params['maintenanceMode']['users'] = array('demo');
 * Yii::app()->params['maintenanceMode']['message'] = 'Site is running in maintenance mode now.';
 *
 * @package Yiitrn\Tests\Functional
 * @author  aprogonniy <alexey.progonniy@sigmaukraine.com>
 */
class MaintenanceModeTest extends CWebTestCase
{

	/**
	 * Selenium configuration script implementation.
	 *
	 * @return void
	 */
	protected function setUp()
	{
		parent::setUp();

		$this->setBrowserUrl('http://localhost/index.php/');
		$this->setBrowser('*googlechrome C:\Program Files (x86)\Google\Chrome\Application\chrome.exe');
	}

	/**
	 * Check is not logged in user able to see home page in maintenance mode.
	 *
	 * @return void
	 */
	public function testGuestPageAccessTestCase()
	{
		$this->open('post/index');
		$this->assertTextPresent('Site is running in maintenance mode now.');
	}

	/**
	 * Check is logged in user able to see home page in maintenance mode.
	 *
	 * @return void
	 */
	public function testUserPageAccessTestCase()
	{
		$this->_loginUser();

		$this->open('post/index');
		$this->assertTextNotPresent('Site is running in maintenance mode now.');
	}

	/**
	 * Log in using credentials demo/demo.
	 *
	 * @return void
	 */
	private function _loginUser()
	{
		$this->open('site/login');
		$this->assertTextPresent('Login');
		$this->type('name=LoginForm[username]', 'demo');
		$this->type('name=LoginForm[password]', 'demo');
		$this->clickAndWait("//button[.='Login']");
		$this->assertTextNotPresent('Incorrect username or password');
	}

}


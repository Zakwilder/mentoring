<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * This is an example of the authorization test class.
 *
 * @package Yiitrn\Tests\Functional
 * @author  Alexander Bespalko <alexander.bespalko@sigmaukraine.com>
 */
class LoginTest extends CWebTestCase
{

	/**
	 * Set up functional test.
	 *
	 * @return void
	 */
	protected function setUp()
	{
		parent::setUp();
		$this->setBrowserUrl("http://localhost/index.php/");
		$this->setBrowser("*googlechrome C:\Program Files (x86)\Google\Chrome\Application\chrome.exe");
	}

	/**
	 * This is an example of the functional test case.
	 *
	 * @return void
	 */
	public function testSuccessfulAuthTestCase()
	{
		$this->open('site/login');
		$this->assertTextPresent('Login');
		$this->type('name=LoginForm[username]', 'demo');
		$this->type('name=LoginForm[password]', 'demo');
		$this->clickAndWait("//button[.='Login']");
		$this->assertTextNotPresent('Incorrect username or password');
	}

	/**
	 * This is an example of the functional test case.
	 *
	 * @return void
	 */
	public function testSecondFunctionalTestCase()
	{
		$this->assertTrue(true);
		$this->assertFalse(false);
	}

}
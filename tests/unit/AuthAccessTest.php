<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * Checking access unit test class.
 *
 * @package Yiitrn\Tests\Unit
 * @author  Alexander Bespalko <alexander.bespalko@sigmaukraine.com>
 */
class AuthAccessTest extends CTestCase
{

	/**
	 * This is an example of the unit test case.
	 *
	 * @return void
	 */
	public function testCheckAccess()
	{
		$this->assertTrue(Yii::app()->getAuthManager()->checkAccess('createPage', '1'));
		$this->assertTrue(Yii::app()->getAuthManager()->checkAccess('deletePage', '1'));
	}

	/**
	 * Register new test user and delete him.
	 *
	 * @return void
	 */
	public function testRegister()
	{
		$user = new User();
		$user->attributes = array(
			'username' => 'NewTestName',
			'password' => 'demo',
			'verifyPassword' => 'demo',
			'email' => 'testmail@test.test',
			'profile' => 'Profile',
		);
		$this->assertTrue($user->save());

		$user = User::model()->findByPk($user->id);

		$this->assertTrue($this->authorize('NewTestName', 'demo'));
		$this->assertTrue($user instanceof User);
		$this->assertTrue($user->delete());
	}

	/**
	 * Performs user authorization unit test.
	 *
	 * @return void
	 */
	protected function authorize($username, $password)
	{
		$identity = new UserIdentity($username, $password);
		return $identity->authenticate();
	}

	protected function tearDown()
	{

	}

}
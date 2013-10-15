<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * UserIdentity represents the data needed to identity a user.
 *
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 *
 * @package Yiitrn
 * @author  aprogonniy <alexey.progonniy@sigmaukraine.com>
 */
class UserIdentity extends CUserIdentity
{
	const ERROR_NOT_ACTIVE = 3;

	/**
	 * The ID of the user record.
	 *
	 * @var integer
	 */
	private $_id;

	/**
	 * Authenticates a user.
	 *
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$user = User::model()->find('LOWER(username)=?', array(strtolower($this->username)));
		if ($user === null) {
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		}
		else if (!$user->validatePassword($this->password)) {
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		}
		else if ($user->active == 0) {
			$this->errorCode = self::ERROR_NOT_ACTIVE;
		}
		else {
			$this->_id = $user->id;
			$this->username  = $user->username;
			$this->errorCode = self::ERROR_NONE;
		}
		return $this->errorCode == self::ERROR_NONE;
	}

	/**
	 * Get the ID of the user record.
	 *
	 * @return integer
	 */
	public function getId()
	{
		return $this->_id;
	}

}
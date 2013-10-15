<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * LoginForm class.
 *
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 *
 * @package Yiitrn
 * @author  aprogonniy <alexey.progonniy@sigmaukraine.com>
 */
class LoginForm extends CFormModel
{
	/**
	 * User login.
	 *
	 * @var string
	 */
	public $username;
	/**
	 * User password.
	 *
	 * @var string
	 */
	public $password;
	/**
	 * User setting to remember password.
	 *
	 * @var boolean
	 */
	public $rememberMe;

	/**
	 * User parameters.
	 *
	 * @var UserIdentity
	 */
	private $_identity;

	/**
	 * Declares the validation rules.
	 *
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 *
	 * @return array
	 */
	public function rules()
	{
		return array(
			// Username and password are required
			array('username, password', 'required'),
			// RememberMe needs to be a boolean
			array('rememberMe', 'boolean'),
			// Password needs to be authenticated
			array('password', 'authenticate'),
		);
	}

	/**
	 * Declares attribute labels.
	 *
	 * @return array
	 */
	public function attributeLabels()
	{
		return array(
			'username' => Yii::t('admin', 'Username'),
			'password' => Yii::t('admin', 'Password'),
			'rememberMe' => Yii::t('admin', 'Remember me next time'),
		);
	}

	/**
	 * Authenticates the password.
	 *
	 * This is the 'authenticate' validator as declared in rules().
	 *
	 * @return void
	 */
	public function authenticate()
	{
		$this->_identity = new UserIdentity($this->username, $this->password);
		if (!$this->_identity->authenticate()) {
			switch($this->_identity->errorCode) {
				case UserIdentity::ERROR_USERNAME_INVALID:
					$this->addError('username', Yii::t('admin', 'Username is incorrect.'));
					break;
				case UserIdentity::ERROR_PASSWORD_INVALID:
					$this->addError('password', Yii::t('admin', 'Password is incorrect.'));
					break;
				case UserIdentity::ERROR_NOT_ACTIVE:
					$this->addError('active', Yii::t('admin', 'User is not active.'));
					Yii::app()->user->setFlash('error', Yii::t('admin', 'User is not active.'));
					break;
			}
		}
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 *
	 * @return boolean
	 */
	public function login()
	{
		if ($this->_identity === null) {
			$this->_identity = new UserIdentity($this->username, $this->password);
			$this->_identity->authenticate();
		}
		if ($this->_identity->errorCode === UserIdentity::ERROR_NONE) {
			// Set 30 days duration
			$duration = $this->rememberMe ? 3600 * 24 * 30 : 0;
			Yii::app()->user->login($this->_identity, $duration);
			return true;
		}
		return false;
	}

}

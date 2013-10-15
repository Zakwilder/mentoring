<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * PasswordRecoveryForm class. PasswordRecoveryForm is the data structure for keeping the password recovery form data. It is used by the 'recovery' action of the Registration Module.
 *
 * @package Yiitrn\modules\admin\models
 * @author  Alexander Bespalko <Alexander.Bespalko@sigmaukraine.com>
 */
class PasswordRecoveryForm extends CFormModel
{

	/**
	 * Login or email field at PasswordRecoveryForm.
	 *
	 * @var $login_or_email
	 */
	public $login_or_email;

	/**
	 * User will be populated with the user instance, if found.
	 *
	 * @var $user
	 */
	public $user;

	/**
	 * PasswordRecoveryForm rules.
	 *
	 * @return array
	 */
	public function rules()
	{
		$rules = array(
				array('login_or_email', 'required'),
				array('login_or_email', 'checkExists'),
				);

		return $rules;
	}

	/**
	 * PasswordRecoveryForm attribute labels.
	 *
	 * @return array
	 */
	public function attributeLabels()
	{
		return array(
			'login_or_email' => Yii::t('admin', 'Login or email'),
		);
	}

	/**
	 * Returns user`s model by his login or email.
	 *
	 * @return void
	 */
	public function checkExists()
	{
		$user = null;

		if (!$this->hasErrors()) {
			if (strpos($this->login_or_email, '@')) {
				$user = AdminUser::model()->findByAttributes(array(
							'email' => $this->login_or_email));
				$this->user = $user;
			}
			else {
				$this->user = AdminUser::model()->findByAttributes(array(
							'username' => $this->login_or_email));
			}

		}
	}

}

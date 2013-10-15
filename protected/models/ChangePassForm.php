<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * Password change form.
 *
 * @package Yiitrn\modules\admin\models
 * @author  Alexander Bespalko <Alexander.Bespalko@sigmaukraine.com>
 */
class ChangePassForm extends CFormModel
{
	/**
	 * Password field.
	 *
	 * @var $password
	 */
	public $password;

	/**
	 * Verify password field.
	 *
	 * @var $verifyPassword
	 */
	public $verifyPassword;

	/**
	 * Returns the static model of the specified AR class.
	 *
	 * @param string $className Name of the class.
	 *
	 * @return mixed
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * Form validation rules.
	 *
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		$rules[] = array('password', 'safe');
		$rules[] = array('password, verifyPassword', 'length', 'max' => 128, 'min' => 4);
		$rules[] = array('password', 'required', 'on' => 'user_request');
		$rules[] = array('password, verifyPassword', 'required');
		$rules[] = array('password', 'compare', 'compareAttribute' => 'verifyPassword');

		return $rules;
	}

	/**
	 * ChangePassForm attribute labels.
	 *
	 * @return array
	 */
	public function attributeLabels()
	{
		return array(
			'password' => Yii::t('admin', 'New password'),
			'verifyPassword' => Yii::t('admin', 'Retype your new password'),
		);
	}

}

<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * Default Admin controller.
 *
 * @package Yiitrn\modules\admin\models
 * @author  Alexander Bespalko <Alexander.Bespalko@sigmaukraine.com>
 */
class AdminUser extends User
{

	/**
	 * Returns the static model of the specified AR class.
	 *
	 * @param string $className Name of the class.
	 *
	 * @return CActiveRecord
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @params boolean $activate Whether to generate activation key when user is
	 * registering first time (false)
	 * or when it is activating (true)
	 * @params string $password password entered by user
	 * @param array $params, optional, to allow passing values outside class in inherited classes
	 * By default it uses password and microtime combination to generated activation key
	 * When user is activating, activation key becomes micortime()
	 * @return string
	 */
	public function generateActivationKey()
	{
		$this->activationKey = sha1(mt_rand(10000, 99999) . time() . $this->email);
		/*if (!$this->isNewRecord) {
			$this->save(false, array('activationKey'));
		}*/
		return $this->activationKey;
	}

}

<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * User active record class implementation.
 *
 * @package Yiitrn\models
 * @author  Alexander Bespalko <Alexander.Bespalko@sigmaukraine.com>
 */
class User extends CActiveRecord
{
	/**
	 * Confirm password field.
	 *
	 * @var $verifyPassword
	 */
	public $verifyPassword;

	/**
	 * Verify captcha code.
	 *
	 * @var $verifyCode
	 */
	public $verifyCode;

	/**
	 * User activation.
	 *
	 * @var boolean
	 */
	public $active;

	/**
	 * Returns the static model of the specified AR class.
	 *
	 * @param string $className Model class name.
	 *
	 * @return CActiveRecord the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * Get name of table.
	 *
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{user}}';
	}

	/**
	 * Validation rules.
	 *
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		$captcha = array();

		if (Yii::app()->params['settings']['captcha'] == 1) {
			$captcha = array(
				array('verifyCode', 'required', 'on' => 'register'),
				array('verifyCode', 'captcha', 'allowEmpty' => !Yii::app()->user->isGuest),
			);
		}

		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array_merge(array(
			array('username, password, email', 'required'),
			array('username, password, verifyPassword', 'length', 'max' => 60, 'min' => 4),
			array('email', 'email'),
			array('username', 'unique'),
			array('profile', 'safe'),
			array('verifyPassword', 'required', 'on' => 'insert, register'),
			array('npassword', 'safe', 'on' => 'update'),
			array('password', 'compare', 'compareAttribute' => 'verifyPassword'),
		), $captcha);
	}

	/**
	 * Relational rules.
	 *
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(

		);
	}

	/**
	 * Attribute labels.
	 *
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'username' => Yii::t('admin', 'Username'),
			'password' => Yii::t('admin', 'Password'),
			'verifyPassword' => Yii::t('admin', 'Confirm Password'),
			'email' => Yii::t('admin', 'Email'),
			'profile' => Yii::t('admin', 'Profile'),
		);
	}

	/**
	 * Checks if the given password is correct.
	 *
	 * @param string $password The password to be validated.
	 *
	 * @return boolean whether the password is valid
	 */
	public function validatePassword($password)
	{
		return crypt($password, $this->password) === $this->password;
	}

	/**
	 * Generates the password hash.
	 *
	 * @param string $password The password to be hashed.
	 *
	 * @return string hash
	 */
	public function hashPassword($password)
	{
		return crypt($password, $this->generateSalt());
	}

	/**
	 * Generates a salt that can be used to generate a password hash.
	 *
	 * The {@link http://php.net/manual/en/function.crypt.php PHP `crypt()` built-in function}
	 * requires, for the Blowfish hash algorithm, a salt string in a specific format:
	 *  - "$2a$"
	 *  - a two digit cost parameter
	 *  - "$"
	 *  - 22 characters from the alphabet "./0-9A-Za-z".
	 *
	 * @param integer $cost Parameter for Blowfish hash algorithm.
	 *
	 * @return string the salt
	 *
	 * @throws CException Cost parameter must be between 4 and 31.
	 */
	protected function generateSalt($cost = 10)
	{
		if (!is_numeric($cost) || $cost < 4 || $cost > 31) {
			throw new CException(Yii::t('admin', 'Cost parameter must be between 4 and 31.'));
		}
		// Get some pseudo-random data from mt_rand().
		$rand = '';
		for ($i = 0; $i < 8; ++$i) {
			$rand .= pack('S', mt_rand(0, 0xffff));
		}
		// Add the microtime for a little more entropy.
		$rand .= microtime();
		// Mix the bits cryptographically.
		$rand = sha1($rand, true);
		// Form the prefix that specifies hash algorithm type and cost parameter.
		$salt = '$2a$' . str_pad((int) $cost, 2, '0', STR_PAD_RIGHT) . '$';
		// Append the random salt string in the required base64 format.
		$salt .= strtr(substr(base64_encode($rand), 0, 22), array('+' => '.'));
		return $salt;
	}

	/**
	 * The URL that shows the detail of the user.
	 *
	 * @return string
	 */
	public function getUrl()
	{
		return Yii::app()->createUrl('admin/user/view', array(
			'id' => $this->id,
		));
	}

	/**
	 * Get empty password.
	 *
	 * @return string
	 */
	public function getNpassword()
	{
		return '';
	}

	/**
	 * Set not empty password.
	 *
	 * @param string $password Password which should be setted.
	 *
	 * @return void
	 */
	public function setNpassword($password)
	{
		$password = trim($password);
		if (!empty($password)) {
			$this->password = $password;
		}
	}

	/**
	 * Search users from DB.
	 *
	 * @return CActiveDataProvider
	 */
	public function search()
	{
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('username', $this->username, true);
		$criteria->compare('email', $this->email, true);

		return new CActiveDataProvider('User', array(
			'criteria' => $criteria,
			'sort' => array(
				'defaultOrder' => 'id ASC',
			),
		));
	}

	/**
	 * Get user role.
	 *
	 * @return mixed
	 */
	public function getRole()
	{
		$role = Yii::app()->db->createCommand()
			->select('itemname')
			->from('AuthAssignment')
			->where('userid=:id', array(':id' => $this->id))
			->queryScalar();

		return $role;
	}

	/**
	 * Returns an array of available roles.
	 *
	 * @return array
	 */
	public static function getUserRoleOptions()
	{
		return CHtml::listData(Yii::app()->authManager->getRoles(),	'name', 'name');
	}

	/**
	 * This is invoked before the record is saved.
	 *
	 * @return boolean whether the record should be saved.
	 */
	protected function beforeSave()
	{
		if (parent::beforeSave()) {
			if ($this->isNewRecord) {
				$this->password = $this->hashPassword($this->password);
			}
			return true;
		}
		else {
			return false;
		}
	}

	/**
	 * This is invoked after the record is saved.
	 *
	 * @return void
	 */
	protected function afterSave()
	{
		if (isset($_POST['AdminUser']) && isset($_POST['AdminUser']['role'])) {
			$auth = Yii::app()->authManager;
			// Delete all assigned roles
			$roles = $auth->getRoles($this->id);
			foreach ($roles as $role) {
				$auth->revoke($role->name, $this->id);
			}
			// Assign new role to user
			$auth->assign($_POST['AdminUser']['role'], $this->id);
			$auth->save();
		}
		parent::afterSave();
	}

}
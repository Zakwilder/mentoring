<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * This is the model class for table "{{partners}}".
 *
 * The followings are the available columns in table '{{partners}}':
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $active
 * @property string $key
 * @property string $salt
 * @package Yiitrn
 * @author  Eugene Zakursky <Eugene.Zakursky@sigmaukraine.com>
 */
class Partners extends CActiveRecord
{

	/**
	 * Returns the static model of the specified AR class.
	 *
	 * @param string $className Active record class name.
	 *
	 * @return Partners the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * Database table name.
	 *
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{partners}}';
	}

	/**
	 * Specifies the access control rules. This method is used by the 'accessControl' filter.
	 *
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('active', 'numerical', 'integerOnly' => true),
			array('name, description, key, salt', 'length', 'max' => 100),
			array('name', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, description, active', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * Relations of the table.
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
	 * Table attribute labels.
	 *
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('admin', 'ID'),
			'name' => Yii::t('admin', 'Name'),
			'description' => Yii::t('admin', 'Description'),
			'active' => Yii::t('admin', 'Active?'),
			'key' => Yii::t('admin', 'Key'),
			'salt' => Yii::t('admin', 'Salt'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * @return CActiveDataProvider The data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('name', $this->name, true);
		$criteria->compare('description', $this->description, true);
		$criteria->compare('active', $this->active);
		$criteria->compare('key', $this->key, true);
		$criteria->compare('salt', $this->salt, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	/**
	 * Generates salt.
	 *
	 * @param integer $length Salt length.
	 *
	 * @return string
	 */
	public function generateSalt($length=32)
	{
		$chars = 'abcdefghijkmnopqrstuvwxyz023456789';
		srand((double) microtime() * 1000000);
		$i = 1;
		$salt = '';

		while ($i <= $length) {
			$num = rand() % 33;
			$tmp = substr($chars, $num, 1);
			$salt .= $tmp;
			$i++;
		}
		return $salt;
	}

	/**
	 * This method is invoked before saving a record (after validation, if any).
	 *
	 * @return boolean whether the saving should be executed. Defaults to true.
	 */
	protected function beforeSave()
	{
		if (parent::beforeSave()) {
			if ($this->isNewRecord) {
				$this->salt = $this->generateSalt();
				$this->key = crypt($this->name, $this->salt);
			}
			return true;
		}
		else {
			return false;
		}
	}

}
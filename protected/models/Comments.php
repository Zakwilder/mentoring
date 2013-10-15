<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * This is the model class for table "{{comments}}".
 *
 * The followings are the available columns in table '{{comments}}':
 *
 * @property integer $id
 * @property integer $author_id
 * @property string $comment
 * @property integer $page_id
 *
 * @package Yiitrn
 * @author  Eugene Zakursky <Eugene.Zakursky@sigmaukraine.com>
 */
class Comments extends CActiveRecord
{

	/**
	 * Returns the static model of the specified AR class.
	 *
	 * @param string $className Active record class name.
	 *
	 * @return Comments the static model class
	 */
	public static function model($className=__CLASS__)
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
		return '{{comments}}';
	}

	/**
	 * Validation rules.
	 *
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('comment', 'required'),
			array('author_id', 'numerical', 'integerOnly' => true),
			array('page_id', 'numerical', 'integerOnly' => true),
			array('comment', 'length', 'max' => 255),
			array('id, author_id, page_id, comment', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * Relational rules.
	 *
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'author' => array(self::BELONGS_TO, 'User', 'author_id'),
			'page' => array(self::BELONGS_TO, 'Page', 'page_id'),
			'parent' => array(self::BELONGS_TO, 'Comments', 'parent_id'),
			'children' => array(self::HAS_MANY, 'Comments', 'parent_id', 'order' => 'children.create_time DESC'),
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
			'id' => 'ID',
			'comment' => Yii::t('front', 'Comment'),
		);
	}

	/**
	 * Search users from DB.
	 *
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('comment', $this->comment, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	/**
	 * Finds recent comments.
	 *
	 * @param integer $limit Maximum number of comments that should be returned.
	 *
	 * @return array the most recently added comments
	 */
	public function findRecentComments($limit=10)
	{
		return $this->findAll(array(
			'order' => 't.create_time DESC',
			'limit' => $limit,
		));
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
				$this->create_time = date('Y-m-d H:i:s');
			}
			return true;
		}
		else {
			return false;
		}
	}

}
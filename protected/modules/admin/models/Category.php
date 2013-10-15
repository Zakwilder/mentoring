<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * This is the model class for table "{{category}}".
 *
 * The followings are the available columns in table '{{category}}':
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $slug
 *
 * @package Yiitrn\modules\admin\models
 * @author  Eugene Zakursky <Eugene.Zakursky@sigmaukraine.com>
 */
class Category extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 *
	 * @param string $className Active record class name.
	 *
	 * @return Category the static model class
	 */

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * Returns table name.
	 *
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{category}}';
	}

	/**
	 * Table validation rules.
	 *
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		$columnsInfo = array();
		foreach (Yii::app()->params->languages as $alias => $lang) {
			$columnsInfo[] = array('title_' . $alias, 'length', 'max' => 100);
			$columnsInfo[] = array('title_' . $alias, 'required');
			$columnsInfo[] = array('title_' . $alias, 'unique', 'allowEmpty' => false);
			$columnsInfo[] = array('title_' . $alias, 'safe', 'on' => 'search');

			$columnsInfo[] = array('description_' . $alias, 'length', 'max' => 255);
			$columnsInfo[] = array('description_' . $alias, 'safe', 'on' => 'search');
		}

		$columnsOther = array(
			array('slug', 'length', 'max' => 100),
			array('slug', 'required'),
			array('slug', 'unique', 'allowEmpty' => false),
			array('id, slug', 'safe', 'on' => 'search'),
		);

		return array_merge($columnsInfo, $columnsOther);
	}

	/**
	 * Table relations.
	 *
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'pages' => array(self::HAS_MANY, 'Page', 'category_id'),
		);
	}

	/**
	 * Table attribute labels.
	 *
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		$columnsInfo = array();
		foreach (Yii::app()->params->languages as $alias => $lang) {
			$columnsInfo['title_' . $alias] = Yii::t('admin', 'Title') . '(' . $alias . ')';
			$columnsInfo['description_' . $alias] = Yii::t('admin', 'Description') . '(' . $alias . ')';
		}

		$columnsOther = array(
			'id' => Yii::t('admin', 'ID'),
			'slug' => Yii::t('admin', 'Slug'),
		);

		return array_merge($columnsInfo, $columnsOther);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria;

		foreach (Yii::app()->params->languages as $alias => $lang) {
			$criteria->compare('title_' . $alias, $this->{'title_' . $alias}, true);
			$criteria->compare('description_' . $alias, $this->{'description_' . $alias}, true);
		}

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	/**
	 * Model behaviors.
	 *
	 * @return array
	 */
	public function behaviors()
	{
		return array(
			'slugmaker' => array(
				'class' => 'PcSimpleSlugBehavior',
			)
		);
	}

}
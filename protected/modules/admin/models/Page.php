<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * This is the model class for table "{{page}}".
 *
 * The followings are the available columns in table '{{page}}':
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $title
 * @property string $slug
 * @property string $tags
 * @property string $content
 * @property integer $visibility
 * @property string $date_created
 * @property string $date_updated
 *
 * The followings are the available model relations:
 * @property Category $category
 * @package Yiitrn
 * @author  Eugene Zakursky <Eugene.Zakursky@sigmaukraine.com>
 */
class Page extends CActiveRecord
{

	/**
	 * Returns the static model of the specified AR class.
	 *
	 * @param string $className Active record class name.
	 *
	 * @return Page the static model class
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
		return '{{page}}';
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
		$columnsInfo = array();
		foreach (Yii::app()->params->languages as $alias => $lang) {
			$columnsInfo[] = array('title_' . $alias, 'length', 'max' => 100);
			$columnsInfo[] = array('title_' . $alias, 'required');
			$columnsInfo[] = array('title_' . $alias, 'safe', 'on' => 'search');

			$columnsInfo[] = array('content_' . $alias, 'safe');
			$columnsInfo[] = array('content_' . $alias, 'safe', 'on' => 'search');

			$columnsInfo[] = array('preview_' . $alias, 'length', 'max' => 500);
			$columnsInfo[] = array('preview_' . $alias, 'safe', 'on' => 'search');
		}

		$columnsOther = array(
			array('category_id, visibility, premium', 'numerical', 'integerOnly' => true),
			array('slug', 'length', 'max' => 255),
			array('tags', 'length', 'max' => 255),
			array('slug, category', 'required'),
			array('slug', 'unique', 'allowEmpty' => false),
			array('date_created, date_updated', 'safe'),
			array('category, slug, tags, visibility, date_created, date_updated', 'safe', 'on' => 'search'),
		);

		return array_merge($columnsInfo, $columnsOther);
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
			'category' => array(self::BELONGS_TO, 'Category', 'category_id'),
			'comments' => array(self::HAS_MANY, 'Comments', 'page_id', 'order' => 'comments.create_time DESC', 'condition' => 'comments.parent_id IS NULL'),
			'commentCount' => array(self::STAT, 'Comments', 'page_id'),
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
			$columnsInfo['content_' . $alias] = Yii::t('admin', 'Content') . '(' . $alias . ')';
			$columnsInfo['preview_' . $alias] = Yii::t('admin', 'Preview') . '(' . $alias . ')';
		}

		$columnsOther = array(
			'id' => Yii::t('admin', 'ID'),
			'category_id' => Yii::t('admin', 'Category'),
			'slug' => Yii::t('admin', 'Slug'),
			'tags' => Yii::t('admin', 'Tags'),
			'visibility' => Yii::t('admin', 'Visible?'),
			'date_created' => Yii::t('admin', 'Date Created'),
			'date_updated' => Yii::t('admin', 'Date Updated'),
			'premium' => Yii::t('admin', 'Premium'),
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

		$criteria->compare('id', $this->id);
		$criteria->compare('category_id', $this->category_id);
		$criteria->compare('slug', $this->slug, true);
		$criteria->compare('tags', $this->tags, true);
		$criteria->compare('visibility', $this->visibility);
		$criteria->compare('date_created', $this->date_created, true);
		$criteria->compare('date_updated', $this->date_updated, true);
		$criteria->compare('premium', $this->premium, true);

		foreach (Yii::app()->params->languages as $alias => $lang) {
			$criteria->compare('title_' . $alias, $this->{'title_' . $alias}, true);
			$criteria->compare('content_' . $alias, $this->{'content_' . $alias}, true);
			$criteria->compare('preview_' . $alias, $this->{'preview_' . $alias}, true);
		}

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
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
				$this->date_created = date('Y-m-d');
				$this->date_updated = date('Y-m-d');
			}
			else {
				$this->date_updated = date('Y-m-d');
			}
			return true;
		}
		else {
			return false;
		}
	}

	/**
	 *  This method is invoked when the instance is created.
	 *
	 * @return void
	 */
	public function init()
	{
		parent::init();
		$this->visibility = 0;
	}

	/**
	 * Return Page's url.
	 *
	 * @return string the URL that shows the detail of the post
	 */
	public function getUrl()
	{
		return Yii::app()->createUrl('page/view', array('slug' => $this->slug));
	}

	/**
	 * Return Page's absolute url.
	 *
	 * @return string the URL that shows the detail of the post
	 */
	public function getAbsoluteUrl()
	{
		return Yii::app()->createAbsoluteUrl('page/view', array('slug' => $this->slug));
	}

	/**
	 * Finds recent pages.
	 *
	 * @param integer $limit Maximum number of pages that should be returned.
	 *
	 * @return array the most recently added pages
	 */
	public function findRecentPages($limit=10)
	{
		return $this->findAll(array(
			'order' => 't.date_created DESC',
			'limit' => $limit,
		));
	}

}
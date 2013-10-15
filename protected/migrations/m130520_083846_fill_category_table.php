<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * This migration fills table "Category".
 *
 * @package Yiitrn\migrations
 * @author  Eugene Zakursky <Eugene.Zakursky@sigmaukraine.com>
 */
class m130520_083846_fill_category_table extends CDbMigration
{

	/**
	 * Commences migration.
	 *
	 * @return void
	 */
	public function safeUp()
	{
		$this->insert('tbl_category', array(
			'title_en'  => 'Yii framework documentation',
			'title_ru'  => 'Yii framework документация',
			'slug'      => 'yii-framework-documentation',
		));
		$this->insert('tbl_category', array(
			'title_en'  => 'Articles',
			'title_ru'  => 'Статьи',
			'slug'      => 'articles',
		));

	}

	/**
	 * Discards migration.
	 *
	 * @return void
	 */
	public function safeDown()
	{
		$this->truncateTable('tbl_category');

	}

}
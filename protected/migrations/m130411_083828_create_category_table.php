<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * This migration creates table "Category".
 *
 * @package Yiitrn\migrations
 * @author  Eugene Zakursky <Eugene.Zakursky@sigmaukraine.com>
 */
class m130411_083828_create_category_table extends CDbMigration
{

	/**
	 * Commences migration.
	 *
	 * @return void
	 */
	public function up()
	{
		$this->createTable(
			'tbl_category',
			array(
				'id'            => 'pk',
				'title'         => 'VARCHAR(100)',
				'description'   => 'VARCHAR(255)',
				'slug'          => 'VARCHAR(100)',
				'UNIQUE KEY `slug`(`slug`) ',
				'UNIQUE KEY `title`(`title`) '
			),
			'ENGINE=InnoDB DEFAULT CHARSET=utf8'
		);
	}

	/**
	 * Discards migration.
	 *
	 * @return void
	 */
	public function safeDown()
	{
		$this->dropTable('tbl_category');
	}

}
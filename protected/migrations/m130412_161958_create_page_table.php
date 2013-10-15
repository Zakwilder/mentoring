<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * This migration creates table "Page".
 *
 * @package Yiitrn\migrations
 * @author  Eugene Zakursky <Eugene.Zakursky@sigmaukraine.com>
 */
class m130412_161958_create_page_table extends CDbMigration
{

	/**
	 * Commences migration.
	 *
	 * @return void
	 */
	public function up()
	{
		$this->createTable(
			'tbl_page',
			array(
				'id'            => 'pk',
				'category_id'   => 'int',
				'title'         => 'VARCHAR(100)',
				'slug'          => 'VARCHAR(100)',
				'tags'          => 'VARCHAR(255)',
				'content'       => 'TEXT',
				'visibility'    => 'boolean',
				'date_created'  => 'date',
				'date_updated'  => 'date',
				'UNIQUE KEY `slug`(`slug`) ',
				'UNIQUE KEY `title`(`title`) '
			),
			'ENGINE=InnoDB DEFAULT CHARSET=utf8'
		);
		$this->addForeignKey('category_id', 'tbl_page', 'category_id', 'tbl_category', 'id', 'CASCADE', 'CASCADE');
	}

	/**
	 * Discards migration.
	 *
	 * @return void
	 */
	public function safeDown()
	{
		$this->dropTable('tbl_page');
	}

}
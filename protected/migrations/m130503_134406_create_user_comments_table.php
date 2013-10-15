<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * This migration creates table "Comments".
 *
 * @package Yiitrn\migrations
 * @author  Eugene Zakursky <Eugene.Zakursky@sigmaukraine.com>
 */
class m130503_134406_create_user_comments_table extends CDbMigration
{

	/**
	 * Commences migration.
	 *
	 * @return void
	 */
	public function safeUp()
	{
		$this->createTable(
			'tbl_comments',
			array(
				'id'            => 'pk',
				'author_id'        => 'int',
				'page_id'   => 'int',
				'comment'   => 'VARCHAR(255) NOT NULL',
				'create_time' => 'datetime',
				'parent_id' => 'int',
			),
			'ENGINE=InnoDB DEFAULT CHARSET=utf8'
		);
		$this->addForeignKey('author_id', 'tbl_comments', 'author_id', 'tbl_user', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('page_id', 'tbl_comments', 'page_id', 'tbl_page', 'id', 'CASCADE', 'CASCADE');
	}

	/**
	 * Discards migration.
	 *
	 * @return void
	 */
	public function safeDown()
	{
		$this->dropTable('tbl_comments');
	}

}
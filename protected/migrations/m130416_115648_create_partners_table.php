<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * This migration creates table "Partners".
 *
 * @package Yiitrn\migrations
 * @author  Eugene Zakursky <Eugene.Zakursky@sigmaukraine.com>
 */
class m130416_115648_create_partners_table extends CDbMigration
{

	/**
	 * Commences migration.
	 *
	 * @return void
	 */
	public function up()
	{
		$this->createTable(
			'tbl_partners',
			array(
				'id'            => 'pk',
				'name'          => 'VARCHAR(100)',
				'description'   => 'VARCHAR(100)',
				'active'        => 'boolean',
				'key'           => 'VARCHAR(100)',
				'salt'          => 'VARCHAR(100)',
				'UNIQUE KEY `name`(`name`) ',
				'UNIQUE KEY `key`(`key`) ',
				'UNIQUE KEY `salt`(`salt`) ',
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
		$this->dropTable('tbl_partners');
	}

}
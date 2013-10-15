<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * This migration creates table "Products".
 *
 * @package Yiitrn\migrations
 * @author  Eugene Zakursky <Eugene.Zakursky@sigmaukraine.com>
 */

class m130703_101314_create_products_table extends CDbMigration
{

	/**
	 * Commences migration.
	 *
	 * @return void
	 */
	public function safeUp()
	{
		$this->createTable(
			'tbl_products',
			array(
				'id'            => 'pk',
				'title'         => 'VARCHAR(100)',
				'price'         => 'int',
				'description'   => 'VARCHAR(255)',
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
		$this->dropTable('tbl_products');
	}

}
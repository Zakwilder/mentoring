<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * This migration adds social fields to table "User".
 *
 * @package Yiitrn\migrations
 * @author  Eugene Zakursky <Eugene.Zakursky@sigmaukraine.com>
 */

class m130523_135238_alter_user_add_social extends CDbMigration
{

	/**
	 * Commences migration.
	 *
	 * @return void
	 */
	public function safeUp()
	{
		$this->addColumn('tbl_user', 'service', 'VARCHAR(255)');
		$this->addColumn('tbl_user', 'identity', 'VARCHAR(255)');

	}

	/**
	 * Discards migration.
	 *
	 * @return void
	 */
	public function safeDown()
	{
		$this->dropColumn('tbl_user', 'identity');
		$this->dropColumn('tbl_user', 'service');

	}

}
<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * This migration adds "premium" field to table "Page".
 *
 * @package Yiitrn\migrations
 * @author  Eugene Zakursky <Eugene.Zakursky@sigmaukraine.com>
 */

class m130702_114118_alter_page_table_add_premium extends CDbMigration
{

	/**
	 * Commences migration.
	 *
	 * @return void
	 */
	public function safeUp()
	{
		$this->addColumn('tbl_page', 'premium', 'boolean');
		$this->dbConnection->createCommand('UPDATE tbl_page SET premium = 0')->execute();

	}

	/**
	 * Discards migration.
	 *
	 * @return void
	 */
	public function safeDown()
	{
		$this->dropColumn('tbl_page', 'premium');

	}

}
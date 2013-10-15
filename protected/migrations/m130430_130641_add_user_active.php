<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * This migration adds "active" filed in table "User".
 *
 * @package Yiitrn\migrations
 * @author  Eugene Zakursky <Eugene.Zakursky@sigmaukraine.com>
 */
class m130430_130641_add_user_active extends CDbMigration
{

	/**
	 * Commences migration.
	 *
	 * @return void
	 */
	public function safeUp()
	{
		/*
		 * User table changes
		 */
		$this->addColumn('tbl_user', 'active', 'boolean not null');
		$this->dbConnection->createCommand('UPDATE tbl_user SET active = 1')->execute();
	}

	/**
	 * Discards migration.
	 *
	 * @return boolean
	 */
	public function safeDown()
	{
		/*
		 * User table changes
		 */
		$this->dropColumn('tbl_user', 'active');

		return true;
	}

}
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
class m130517_141502_alter_page_table extends CDbMigration
{

	/**
	 * Commences migration.
	 *
	 * @return void
	 */
	public function up()
	{
		$this->alterColumn('tbl_page', 'content_ru', 'TEXT');
		$this->alterColumn('tbl_page', 'content_en', 'TEXT');
	}

	/**
	 * Discards migration.
	 *
	 * @return void
	 */
	public function safeDown()
	{
		
	}

}
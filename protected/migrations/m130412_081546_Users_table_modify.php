<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * Makes username field unique.
 *
 * @package Yiitrn\Protected\Migrations
 * @author  Alexander Bespalko <alexander.bespalko@sigmaukraine.com>
 */
class m130412_081546_Users_table_modify extends CDbMigration
{

	/**
	 * Migrate up.
	 *
	 * @return bool|void
	 */
	public function up()
	{
		$this->dropTable('i_am_test_table');

		$this->createIndex('username', 'tbl_user', 'username', true);
	}

	/**
	 * Migrate down.
	 *
	 * @return bool|void
	 */
	public function down()
	{
		$this->createTable('i_am_test_table',
			array(
				'id'		    => 'pk',
				'name'		    => 'varchar(100) null',
				'is_active'     => 'tinyint(1) null',
			),
			'ENGINE=InnoDB DEFAULT CHARSET=utf8');

		$this->dropIndex('username', 'tbl_user');
	}

}
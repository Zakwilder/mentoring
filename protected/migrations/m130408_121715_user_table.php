<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * User table migration.
 *
 * @package Yiitrn\Protected\Migrations
 * @author  Alexander Bespalko <alexander.bespalko@sigmaukraine.com>
 */
class m130408_121715_user_table extends CDbMigration
{

	/**
	 * Migration up.
	 *
	 * @return bool|void
	 */
	public function up()
	{
		$this->createTable(
			'tbl_user',
			array(
				'id'		=> 'pk',
				'username'	=> 'VARCHAR(128) not null',
				'password'	=> 'VARCHAR(128) not null',
				'email'		=> 'VARCHAR(128) not null',
				'profile'	=> 'text',
			),
			'ENGINE=InnoDB DEFAULT CHARSET=utf8'
		);
		$this->insert('tbl_user', array('id' => '1', 'username' => 'demo', 'password' => '$2a$10$lqYIkLOBQRNUBer8z6xOB.PCrCq3aiyrPtn6BSfhzjwR4jnGANKuu','email' => 'demo@demo.demo', 'profile' => ''));
	}

	/**
	 * Migration down.
	 *
	 * @return void
	 */
	public function down()
	{

		$this->dropTable('tbl_user');

	}

}
<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * Shell command that used to initialize RBAC DB tables.
 *
 * @package Yiitrn\Protected\Migrations
 * @author  Alexander Bespalko <alexander.bespalko@sigmaukraine.com>
 */
class m130409_121716_user_roles_schema extends CDbMigration
{

	/**
	 * Migration up.
	 *
	 * @return bool|void
	 */
	public function up()
	{
		$transaction = $this->getDbConnection()->beginTransaction();
		try {
			$this->createTable(
				'AuthItem',
				array(
					'name'		    => 'VARCHAR(64) not null',
					'type'		    => 'integer not null',
					'description'   => 'text',
					'bizrule'       => 'text',
					'data'          => 'text',
					'PRIMARY KEY (`name`)'
				),
				'ENGINE=InnoDB DEFAULT CHARSET=utf8'
			);

			$this->createTable(
				'AuthItemChild',
				array(
					'parent'		=> 'varchar(64) not null',
					'child'		    => 'varchar(64) not null',
					'primary key (`parent`,`child`)',
				),
				'ENGINE=InnoDB DEFAULT CHARSET=utf8'
			);

			$this->createTable(
				'AuthAssignment',
				array(
					'itemname'		    => 'varchar(64) not null',
					'userid'		    => 'varchar(64) not null',
					'bizrule'           => 'text',
					'data'              => 'text',
					'primary key (`itemname`,`userid`)',
				),
				'ENGINE=InnoDB DEFAULT CHARSET=utf8'
			);

			$this->addForeignKey('parent', 'AuthItemChild', 'parent', 'AuthItem', 'name', 'CASCADE', 'CASCADE');
			$this->addForeignKey('child', 'AuthItemChild', 'child', 'AuthItem', 'name', 'CASCADE', 'CASCADE');

			$this->addForeignKey('itemname', 'AuthAssignment', 'itemname', 'AuthItem', 'name', 'CASCADE', 'CASCADE');
			$transaction->commit();
			
		}
		catch(Exception $e)
		{
			echo 'Exception: ' . $e->getMessage() . '\n';
			$transaction->rollback();
			return false;
		}
	}

	/**
	 * Migration down.
	 *
	 * @return void
	 */
	public function down()
	{

		$this->dropTable('AuthAssignment');
		$this->dropTable('AuthItemChild');
		$this->dropTable('AuthItem');

	}

}
<?php

/**
 * This is the test migration that 
 * - creates the table "i_am_test_table"
 * - inserts some fake data ()
 */
class m120801_111906_test_migration extends CDbMigration
{

	public function up()
	{

		$this->createTable(
			'i_am_test_table', array(
				'id'		=> 'pk',
				'name'		=> 'VARCHAR(100)',
				'is_active'	=> 'boolean',
			),
			'ENGINE=InnoDB DEFAULT CHARSET=utf8'
		);

		$this->insert('i_am_test_table', array('id' => '1', 'name' => 'Say hello to the fake sting data.', 'is_active' => 1));

	}

	public function down()
	{
		$this->dropTable('i_am_test_table');
	}
	
}
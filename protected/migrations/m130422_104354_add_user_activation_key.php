<?php

class m130422_104354_add_user_activation_key extends CDbMigration
{
	public function up()
	{
		$this->addColumn('tbl_user', 'activationKey', 'VARCHAR(255) not null');
		$this->addColumn('tbl_user', 'activationExpTime', 'TIMESTAMP not null DEFAULT CURRENT_TIMESTAMP');
	}

	public function down()
	{
		$this->dropColumn('tbl_user', 'activationKey');
		$this->dropColumn('tbl_user', 'activationExpTime');
	}

}
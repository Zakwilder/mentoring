<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * Shell command that used to initialize RBAC DB tables.
 *
 * @package Yiitrn\Protected\Commands
 * @author  Alexander Bespalko <alexander.bespalko@sigmaukraine.com>
 */
class AuthInitCommand extends CConsoleCommand
{

	/**
	 * Displaying information about shell command.
	 *
	 * @return string
	 */
	public function getHelp()
	{
		return '
USAGE
    authinit
DESCRIPTION
    This command generates an initial RBAC authorization hierarchy.';

	}

	/**
	 * Initialization DB with access rules. YIIC initial command that defines roles, tasks and operations.
	 *
	 * @param array $args Params for CLI.
	 *
	 * @return void
	 */
	public function run($args)
	{

		$auth = Yii::app()->authManager;

		$auth->clearAll();

		$auth->createOperation('createPage', 'Создание записи');
		$auth->createOperation('deletePage', 'Удаление записи');
		$auth->createOperation('addUser', 'Создание записи');
		$auth->createOperation('deleteUser', 'Удаление записи');
		$auth->createOperation('changePassword');

		$bizRule = 'return Yii::app()->user->id == $params["user"]->id;';
		$task = $auth->createTask('changeOwnPassword', 'Изменение своего пароля', $bizRule);
		$task->addChild('changePassword');

		$role = $auth->createRole('admin', 'Admin');
		$role->addChild('changeOwnPassword');
		$role->addChild('createPage');
		$role->addChild('deletePage');

		$role = $auth->createRole('superadmin', 'SuperAdmin');
		$role->addChild('admin');
		$role->addChild('changePassword');
		$role->addChild('deleteUser');

		$auth->assign('superadmin', '1');
		$auth->save();

		echo 'AuthInit OK';

	}

}

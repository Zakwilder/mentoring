<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/*
 * Here is the list of available environment variables for this script.
 *
 * $_SERVER['CFG_ENVIRONMENT']
 * $_SERVER['YII_PATH']
 *
 */

// Define CFG_ENVIRONMENT constant.
$cfgEnvironment = 'stage';
if (isset($_SERVER['CFG_ENVIRONMENT'])) {
	$cfgEnvironment = $_SERVER['CFG_ENVIRONMENT'];
}
define('CFG_ENVIRONMENT', $cfgEnvironment);
unset($cfgEnvironment);


// Define YII_PATH constant.
$yiiPath = '/data/web/framework';
if (isset($_SERVER['YII_PATH'])) {
	$yiiPath = $_SERVER['YII_PATH'];
}
define('YII_PATH', rtrim($yiiPath, '/'));
unset($yiiPath);

// Set php settings
error_reporting(E_ALL & ~E_NOTICE);
mb_internal_encoding('UTF-8');


// Include yii bootstrap file
require_once(YII_PATH . '/yii.php');


// Define the config for yii app
switch (CFG_ENVIRONMENT) {
	case 'dev':
		$config = require_once(dirname(__FILE__) . '/../protected/config/main-dev.php');
		break;
	case 'stage':
	default:
		$config = require_once(dirname(__FILE__) . '/../protected/config/main.php');
		break;
}

// Go
Yii::createWebApplication($config)->run();
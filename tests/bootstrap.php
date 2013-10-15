<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

if (!defined('YII_PATH')) {
	die('Entry points for unit tests are bootstrap-dev.php or bootstrap-stage.php.');
}

require_once(YII_PATH . '/yiit.php');

$config = require_once(dirname(__FILE__) . '/../protected/config/console.php');

Yii::createWebApplication($config);

require_once('tools/ApiHelper.php');
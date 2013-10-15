<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

define('YIIC_ENVIRONMENT', 'dev');
define('CFG_ENVIRONMENT', 'dev');
define('YII_PATH', dirname(__FILE__) . '/../../../framework');
define('YII_DEBUG', true);

require_once('bootstrap.php');
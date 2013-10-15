<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

switch (YIIC_ENVIRONMENT) {
	case 'dev':
		$mainConfigPath = dirname(__FILE__) . '/main-dev.php';
		break;
	case 'stage':
	default:
		$mainConfigPath = dirname(__FILE__) . '/main.php';
		break;
}

// Load configuration
$config = require_once($mainConfigPath);

/*** START REMOVING PARAMETERS FOR CLI COMMAND ***/

unset($config['theme']);
unset($config['controllerMap']);
unset($config['defaultController']);

/*** END REMOVING PARAMETERS FOR CLI COMMAND ***/


return $config;
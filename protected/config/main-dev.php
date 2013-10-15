<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

// Set path to main configuration
$mainConfigPath = dirname(__FILE__) . '/main.php';

// Load configuration
$config = require_once($mainConfigPath);

/*** START DEV ENVIRONMENT PARAMETERS ***/
$configDev = array(
	/*'components' => array(
		'db' => array(
			//'enableProfiling' => true,
			//'enableParamLogging' => true,
		),
		'log' => array(
			'class' => 'CLogRouter',
			'routes' => array(
				array(
					'class' => 'CProfileLogRoute',
					'levels' => 'profile',
					'enabled' => true,
				),
				array(
					'class' => 'CWebLogRoute',
					'levels' => 'error, warning, trace, profile, info',
				),
			),
		),
	)*/
);
/*** END DEV ENVIRONMENT PARAMETERS ***/

return CMap::mergeArray( $config, $configDev );

<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

// Get maintenance mode configurations from config file and store it to array
$configuraration = file_get_contents(dirname(__FILE__) . '/_maintenance.php');
$maintenanceModeConfig = explode("\n", str_replace("\r", '', $configuraration));

$settings = file_get_contents(dirname(__FILE__) . '/_settings.php');
$settingsConfig = explode("\n", str_replace("\r", '', $settings));

// This contains the application parameters that can be maintained via GUI
return array(
	// This is displayed in the header section
	'title' => 'My Yii Blog',
	// This is used in error pages
	'adminEmail' => 'webmaster@example.com',
	// Number of posts displayed per page
	'postsPerPage' => 10,
	// Maximum number of comments that can be displayed in recent comments portlet
	'recentCommentCount' => 10,
	// Maximum number of tags that can be displayed in tag cloud portlet
	'tagCloudCount' => 20,
	// Whether post comments need to be approved before published
	'commentNeedApproval' => true,
	// The copyright information displayed in the footer section
	'copyrightInfo' => 'Copyright &copy; 2009 by My Company.',

	// Maintenance mode settings
	'maintenanceMode' => array(
		'enabled' => $maintenanceModeConfig[0],
		'page'    => 'maintenance/index',
		'message' => $maintenanceModeConfig[1],
		'users'   => array('demo'),
		'roles'   => array('Administrator'),
		'ips'     => array(),
		'urls'    => array('site/login'),
	),

	// Other settings
	'settings' => array(
		'captcha' => $settingsConfig[0],
		'recentComments' => $settingsConfig[1],
		'recentPages' => $settingsConfig[2],
	),

	// List of global website languages.
	'languages' => array('en' => 'English', 'ru' => 'Русский'),
);
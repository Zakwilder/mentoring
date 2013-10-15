<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

// Uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
defined('LIVE') || define('LIVE', strpos($_SERVER['HTTP_HOST'], 'localhost') === false ? true : false);
if (LIVE) {
	define('PAYPAL_SANDBOX', false);
	define('PAYPAL_HOST', 'ipnpb.paypal.com');
	define('PAYPAL_URL', 'https://ipnpb.paypal.com/cgi-bin/webscr');
	// Live email of merchant.
	define('PAYPAL_EMAIL', 'merchantgreedy@gmail.com');
}
else {
	define('PAYPAL_HOST', 'www.sandbox.paypal.com');
	define('PAYPAL_URL', 'https://www.sandbox.paypal.com/uk/cgi-bin/webscr');
	// Dev email of merchant.
	define('PAYPAL_EMAIL', 'merchantgreedy@gmail.com');
	define('PAYPAL_SANDBOX', true);
}

return array(

	'basePath' => dirname(__FILE__) .
			DIRECTORY_SEPARATOR . '..' .
			DIRECTORY_SEPARATOR,

	'runtimePath' => dirname(__FILE__) .
			DIRECTORY_SEPARATOR . '..' .
			DIRECTORY_SEPARATOR . '..' .
			DIRECTORY_SEPARATOR . '..' .
			DIRECTORY_SEPARATOR . 'data' .
			DIRECTORY_SEPARATOR . 'runtime',

	'name' => 'Yii Blog Demo',
	'homeUrl' => array('/'),

	// Preloading 'log' component
	'preload' => array(
		'log',
		'bootstrap',
		'maintenanceMode',
	),

	// Autoloading model and component classes
	'import' => array(
		'application.models.*',
		'application.components.*',
		'application.vendors.*',
		'application.modules.admin.models.*',
		'application.components.widgets.*',
		'ext.eoauth.*',
		'ext.eoauth.lib.*',
		'ext.lightopenid.*',
		'ext.eauth.services.*',
		'ext.eauth.*',
	),

	'defaultController' => 'site',

	// Application components
	'components' => array(
		'assetManager' => array(
			// Change the path on disk
			'basePath' => dirname(__FILE__) . '/../../../data/assets/',
			// Change the url
			'baseUrl' => '/assets/'
		),
		'user' => array(
			// Enable cookie-based authentication
			'allowAutoLogin' => true,
		),
		'db' => array(
			'connectionString' => 'mysql:host=127.0.0.1;dbname=yiitrn',
			'emulatePrepare' => true,
			'username' => 'yiitrn',
			'password' => '284526485269478652',
			'charset' => 'utf8',
			'tablePrefix' => 'tbl_',
		),
		'errorHandler' => array(
			// Use 'site/error' action to display errors
			'errorAction' => 'site/error',
		),
		'urlManager' => array(
			'class' => 'application.components.UrlManager',
			'urlFormat' => 'path',
			'showScriptName' => false,
			'rules' => array(
				'<language:(ru|ua|en)>/<_a:(site|page)>/<_c:(pages|view)>/<slug>' => '<_a>/<_c>',
				'<language:(ru|ua|en)>/<module>/<controller:\w+>/<id:\d+>' => '<module>/<controller>/view',
				'<language:(ru|ua|en)>/<module>/<controller:\w+>/<action:\w+>/<id:\d+>' => '<module>/<controller>/<action>',
				'<language:(ru|ua|en)>/<module>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
				'<language:(ru|ua|en)>/<controller:\w+>/<id:\d+>' => '<controller>/view',
				'<language:(ru|ua|en)>/</controller><controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
				'<language:(ru|ua|en)>/<controller:\w+>/<action:\w+>' => '<controller>/<action>',
				'<language:(ru|ua|en)>/<module>' => '<module>',
				'<module:(api)>/<controller:\w+>/<id:\d+>' => '<module>/<controller>/single',
				'/' => '/',
			),
		),
		'log' => array(
			'class' => 'CLogRouter',
			'routes' => array(
				array(
					'class' => 'CFileLogRoute',
					'levels' => 'error, warning',
				),
			),
		),
		'bootstrap' => array(
			'class' => 'ext.bootstrap.components.Bootstrap',
			'responsiveCss' => true,
		),
		'authManager' => array(
			'class' => 'CDbAuthManager',
			'connectionID' => 'db',
			'showErrors' => YII_DEBUG
		),
		'maintenanceMode' => array(
			'class' => 'application.extensions.MaintenanceMode.MaintenanceMode',
		),
		'request' => array(
			'enableCookieValidation' => true,
			'enableCsrfValidation' => false,
		),
		'mailer' => array(
			'class' => 'application.extensions.mailer.EMailer',
			'pathViews' => 'application.views.email',
			'pathLayouts' => 'application.views.email.layouts',
			'Mailer' => 'smtp',
			'Host' => 'smtp.mail.ru',
			'Username' => 'yiitrn@mail.ru',
			'Password' => 'demodemo',
			'Port' => '587',
			'SMTPAuth' => true,
			'From' => 'yiitrn@mail.ru',
			'FromName' => 'YIITRN',
		),
		'loid' => array(
			'class' => 'ext.lightopenid.loid',
		),
		'eauth' => array(
			'class' => 'ext.eauth.EAuth',
			'popup' => true,
			'services' => array(
				'facebook' => array(
					'class' => 'FacebookOAuthService',
					'client_id' => '157603201079066',
					'client_secret' => 'd2c529fa4a503822b4c9efd20dcaf1e9',
				),
				'google_oauth' => array(
					'class' => 'GoogleOAuthService',
					'client_id' => '525219527259.apps.googleusercontent.com',
					'client_secret' => 'szMxyC444SUmeqZ4cpWZDa2e',
					'title' => 'Google',
				),
				'twitter' => array(
					'class' => 'TwitterOAuthService',
					'key' => 'DsEnECAD7rhBOQVMQaFUQ',
					'secret' => 'noQfCgqMAbBrvVjXi9f2fs3ZnDBDZMaHFvHgGct44',
				),
			),
		),
	),

	// Application-level parameters that can be accessed
	// Using Yii::app()->params['paramName']
	'params' => require(dirname(__FILE__) . '/params.php'),

	/*
	 * Including available modules
	 */
	'modules' => array(
		'admin',
		'api',
		'gii' => array(
			'class' => 'system.gii.GiiModule',
			'password' => '123456'
		),
	),

	// Global website language settings.
	'sourceLanguage' => 'en',
	'language'       => 'ru',
);
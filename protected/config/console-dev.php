<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

$consoleConfigPath = dirname(__FILE__) . '/console.php';

$config = require_once($consoleConfigPath);

/*** START REMOVING PARAMETERS FOR CLI COMMAND ***/

/*** END REMOVING PARAMETERS FOR CLI COMMAND ***/

return $config;
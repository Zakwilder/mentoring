<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * Maintenance mode for Yii framework.
 *
 * @package Yiitrn\extensions\MaintenanceMode\views
 * @author  Karagodin Evgeniy <ekaragodin@gmail.com>, aprogonniy <alexey.progonniy@sigmaukraine.com>
 * v 1.0
 */
class MaintenanceMode extends CComponent
{
	/**
	 * Is maintenance mode enabled.
	 *
	 * @var boolean
	 */
	public $enabledMode;

	/**
	 * Maintenance mode page address.
	 *
	 * @var string
	 */
	public $capUrl;

	/**
	 * Message for maintenance mode page.
	 *
	 * @var string
	 */
	public $message;

	/**
	 * User names who able to use website in maintenance mode.
	 *
	 * @var array
	 */
	public $users;

	/**
	 * User roles who able to use website in maintenance mode.
	 *
	 * @var array
	 */
	public $roles;

	/**
	 * User ip addresses who able to use website in maintenance mode.
	 *
	 * @var array
	 */
	public $ips;

	/**
	 * List of page addresses which are opened in maintenance mode for everybody.
	 *
	 * @var array
	 */
	public $urls;

	/**
	 * Maintenance mode page initialization.
	 *
	 * @return void
	 */
	public function init()
	{
		$configuration = Yii::app()->params['maintenanceMode'];

		$this->enabledMode = $configuration['enabled'];
		$this->message     = $configuration['message'];

		/*
		 * Default values
		 */
		$this->capUrl = 'maintenance/index';
		$this->users  = array('admin',);
		$this->roles  = array('Administrator',);
		$this->ips    = array();
		$this->urls   = array();

		/*
		 * Set user values if exists
		 */
		if (isset($configuration['page'])) {
			$this->capUrl = $configuration['page'];
		}
		if (isset($configuration['users'])) {
			$this->users = $configuration['users'];
		}
		if (isset($configuration['roles'])) {
			$this->roles = $configuration['roles'];
		}
		if (isset($configuration['ips'])) {
			$this->ips = $configuration['ips'];
		}
		if (isset($configuration['urls'])) {
			$this->urls = $configuration['urls'];
		}

		if ($this->enabledMode) {
			$disable = in_array(Yii::app()->user->name, $this->users);

			foreach ($this->roles as $role) {
				$disable = $disable || Yii::app()->user->checkAccess($role);
			}

			$disable = $disable || in_array(Yii::app()->request->getPathInfo(), $this->urls);

			/*
			 * Check "allowed IP" addresses
			 */
			$disable = $disable || in_array($this->getIp(), $this->ips);

			if (!$disable) {
				if ($this->capUrl === 'maintenance/index') {
					Yii::app()->controllerMap['maintenance'] = 'application.extensions.MaintenanceMode.MaintenanceController';
				}

				Yii::app()->catchAllRequest = array($this->capUrl);
			}
		}

	}

	/**
	 * Get user IP.
	 *
	 * @return string
	 */
	protected function getIp()
	{
		$strRemoteIP = $_SERVER['REMOTE_ADDR'];
		if (!$strRemoteIP) {
			$strRemoteIP = urldecode(getenv('HTTP_CLIENTIP'));
		}
		if (getenv('HTTP_X_FORWARDED_FOR')) {
			$strIP = getenv('HTTP_X_FORWARDED_FOR');
		}
		else if (getenv('HTTP_X_FORWARDED')) {
			$strIP = getenv('HTTP_X_FORWARDED');
		}
		else if (getenv('HTTP_FORWARDED_FOR')) {
			$strIP = getenv('HTTP_FORWARDED_FOR');
		}
		else if (getenv('HTTP_FORWARDED')) {
			$strIP = getenv('HTTP_FORWARDED');
		}
		else {
			$strIP = $_SERVER['REMOTE_ADDR'];
		}

		if ($strRemoteIP != $strIP) {
			$strIP = $strRemoteIP . ', ' . $strIP;
		}
		return $strIP;
	}

}

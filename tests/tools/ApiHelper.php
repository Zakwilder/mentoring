<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * This is the helper class for YIITRN API.
 *
 * @package Yiitrn\Tests\Tools
 * @author  Alexander Bespalko <alexander.bespalko@sigmaukraine.com>
 */
class ApiHelper
{

	const DEFAULT_API_URL_CATEGORY_ALL = 'http://localhost/api/category/all';

	/**
	 * Retrieves request params, sorting and returns the secret token which is created for security purposes.
	 *
	 * @param array $params Request params that consists of output type, partner key and timestamp.
	 *
	 * @return boolean|string
	 */
	public static function getApiToken(array $params)
	{
		ksort($params);
		$token = implode($params);

		return self::encrypt($token);
	}

	/**
	 * Generates bCrypt hashed string.
	 *
	 * @param string $value String to encrypt.
	 *
	 * @return bool|string
	 */
	public static function encrypt($value)
	{
		$enc = new bCrypt();
		return $enc->hash($value);
	}

}
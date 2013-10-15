<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * This is an example of the authorization test class.
 *
 * @package Yiitrn\Vendors
 * @author  Alexander Bespalko <alexander.bespalko@sigmaukraine.com>
 */
class bCrypt
{

	/**
	 * @var int
	 */
	private $rounds;

	/**
	 * @var string
	 */
	private $prefix;

	/**
	 * Constructor.
	 *
	 * @param string $prefix
	 * @param int $rounds
	 *
	 * @return void
	 */
	public function __construct($prefix = '', $rounds = 12)
	{
		if (CRYPT_BLOWFISH != 1) {
			throw new Exception("bcrypt not supported in this installation. See http://php.net/crypt");
		}

		$this->rounds = $rounds;
		$this->prefix = $prefix;
	}

	/**
	 * @param $input
	 *
	 * @return bool|string
	 */
	public function hash($input)
	{
		$hash = crypt($input, $this->getSalt());
		if (strlen($hash) > 13) {
			return $hash;
		}

		return false;
	}

	/**
	 * @param $input
	 * @param $existingHash
	 *
	 * @return bool
	 */
	public static function verify($input, $existingHash)
	{
		$hash = crypt($input, $existingHash);

		return $hash === $existingHash;
	}

	/**
	 * @return string
	 */
	private function getSalt()
	{
		// the base64 function uses +'s and ending ='s; translate the first, and cut out the latter
		return sprintf('$2a$%02d$%s', $this->rounds, substr(strtr(base64_encode($this->getBytes()), '+', '.'), 0, 22));
	}

	/**
	 * @return string
	 */
	private function getBytes()
	{
		$bytes = '';

		if (function_exists('openssl_random_pseudo_bytes') &&
			(strtoupper(substr(PHP_OS, 0, 3)) !== 'WIN')
		) {
			// OpenSSL slow on Win
			$bytes = openssl_random_pseudo_bytes(18);
		}

		if ($bytes === '' && is_readable('/dev/urandom') &&
			($hRand = @fopen('/dev/urandom', 'rb')) !== false) {

			$bytes = fread($hRand, 18);
			fclose($hRand);
		}

		if ($bytes === '') {
			$key = uniqid($this->prefix, true);

			// 12 Rounds of HMAC must be reproduced / Created verbatim, no known shortcuts.
			// Salsa20 returns more than enough bytes.
			for ($i = 0; $i < 12; $i++) {
				$bytes = hash_hmac('sha512', microtime() . $bytes, $key, true);
				usleep(10);
			}
		}
		return $bytes;
	}

}

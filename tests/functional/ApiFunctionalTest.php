<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * This is an API tests class.
 *
 * @package Yiitrn\Tests\Functional
 * @author  Alexander Bespalko <alexander.bespalko@sigmaukraine.com>
 */
class ApiFunctionalTest extends PHPUnit_Framework_TestCase
{

	/**
	 * Set up functional test.
	 *
	 * @return void
	 */
	protected function setUp()
	{
		parent::setUp();
	}

	/**
	 * Sends GET request.
	 *
	 * @return void
	 */
	public function testApiRequestJsonGet()
	{
		$params['output'] = 'json';
		$params['timestamp'] = time();
		$params['key'] = 'mtUUXDU45y38.';
		$params['token'] = ApiHelper::getApiToken($params);

		$options[CURLOPT_HTTPGET] = 1;
		$url = ApiHelper::DEFAULT_API_URL_CATEGORY_ALL . '?' . http_build_query($params);
		$response = $this->request($url, $options);
		$response = CJSON::decode($response);
		$this->assertArrayNotHasKey('error', $response);
		$this->assertArrayNotHasKey('message', $response);
		$this->assertArrayNotHasKey('code', $response);
	}

	/**
	 * Sends POST request.
	 *
	 * @return void
	 */
	public function testApiRequestJsonPost()
	{
		$params['output'] = 'json';
		$params['timestamp'] = time();
		$params['key'] = 'mtUUXDU45y38.';
		$params['token'] = ApiHelper::getApiToken($params);

		$options[CURLOPT_POST] = 1;
		$options[CURLOPT_POSTFIELDS] = $params;

		$response = $this->request(ApiHelper::DEFAULT_API_URL_CATEGORY_ALL, $options);
		$response = CJSON::decode($response);
		$this->assertArrayNotHasKey('error', $response);
		$this->assertArrayNotHasKey('message', $response);
		$this->assertArrayNotHasKey('code', $response);
	}

	/**
	 * Sends GET request.
	 *
	 * @return void
	 */
	public function testApiRequestXMLGet()
	{
		$params['output'] = 'xml';
		$params['timestamp'] = time();
		$params['key'] = 'mtUUXDU45y38.';
		$params['token'] = ApiHelper::getApiToken($params);

		$options[CURLOPT_HTTPGET] = 1;
		$url = ApiHelper::DEFAULT_API_URL_CATEGORY_ALL . '?' . http_build_query($params);
		$response = $this->request($url, $options);

		$actualDom = new DomDocument();
		$actualDom->loadXML($response);

		$this->assertNotTag(array('tag' => 'data', 'child' => array('tag' => 'error')), $response, false);
	}

	/**
	 * Sends POST request and receives XML output.
	 *
	 * @return void
	 */
	public function testApiRequestXMLPost()
	{
		$params['output'] = 'xml';
		$params['timestamp'] = time();
		$params['key'] = 'mtUUXDU45y38.';
		$params['token'] = ApiHelper::getApiToken($params);

		$options[CURLOPT_POST] = 1;
		$options[CURLOPT_POSTFIELDS] = $params;

		$response = $this->request(ApiHelper::DEFAULT_API_URL_CATEGORY_ALL, $options);

		$expectedDom = new DomDocument;
		$expectedDom->loadXML('<data><Category></Category></data>');

		$actualDom = new DomDocument();
		$actualDom->loadXML($response);

		$this->assertNotTag(array('tag' => 'data', 'child' => array('tag' => 'error')), $response, false);
	}

	/**
	 * Executes CURL request.
	 *
	 * @param string $url     CURL url.
	 * @param array  $options CURL options.
	 * @param array  $headers CURL headers.
	 *
	 * @return array
	 * @throws CException Error.
	 */
	protected function request($url, array $options, array $headers = array())
	{
		$ch = curl_init();

		$options[CURLOPT_RETURNTRANSFER] = true;
		$options[CURLOPT_URL] = $url;
		if ($headers !== null) {
			$options[CURLOPT_HTTPHEADER] = $headers;
		}

		curl_setopt_array($ch, $options);

		$response = curl_exec($ch);
		if ($response === false) {
			throw new CException(curl_error($ch), curl_errno($ch));
		}
		return $response;
	}

}
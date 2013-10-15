<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * Basic API controller.
 *
 * @package Yiitrn\modules\api\components
 * @author  Alexander Bespalko <Alexander.Bespalko@sigmaukraine.com>
 */
class ApiController extends CController
{

	/**
	 * Default output response format.
	 *
	 * @var string
	 */
	public $output = 'json';

	/**
	 * Timestamp.
	 *
	 * @var integer
	 */
	public $timestamp;

	/**
	 * Partner`s unique key.
	 *
	 * @var string
	 */
	public $key;

	/**
	 * Unique token.
	 *
	 * @var string
	 */
	public $token;

	/**
	 * Init API.
	 *
	 * @throws ApiException ApiException Custom exception.
	 * @return void
	 */
	public function init()
	{
		Yii::app()->attachEventHandler('onException', array($this, 'handleError'));

		$this->output = Yii::app()->request->getParam('output');
		if (!in_array($this->output, $this->supportedFormats())) {

			throw new ApiException($this->getErrorMessage(5), 5);

		}

		$this->timestamp = Yii::app()->request->getParam('timestamp');
		if (!isset($this->timestamp)
			|| $this->timestamp > time()
			|| $this->timestamp <= strtotime('-5 minutes')
		) {

			throw new ApiException($this->getErrorMessage(3), 3);

		}

		if (!$this->key = Yii::app()->request->getParam('key')) {

			throw new ApiException($this->getErrorMessage(2), 2);

		}

		$partner = $this->getPartnerByKey($this->key);
		if (!$partner) {

			throw new ApiException($this->getErrorMessage(6), 6);

		}

		$this->token = Yii::app()->request->getParam('token');
		$params = array(
			'key' => $this->key,
			'timestamp' => $this->timestamp,
			'output' => $this->output
		);

		if (!$this->_verifyToken($params, $this->token)) {

			throw new ApiException($this->getErrorMessage(4), 4);

		}
	}

	/**
	 * Sending response data in a valid format.
	 *
	 * @param mixed $data Data to send.
	 *
	 * @return void
	 */
	public function sendResponse($data)
	{
		if (!$this->output = Yii::app()->request->getParam('output')) {
			$this->output = 'json';
		}

		switch($this->output) {

			case 'xml':
				header('Content-Type: application/xml; charset=UTF-8');
				$writer = new XMLWriter();
				$writer->openUri('php://output');
				$writer->startDocument();
				$writer->setIndent(true);

				$writer->startElement('data');
				$writer->text(' ');
				foreach ($data as $name => $object) {
					if (is_object($object) || is_array($object)) {
						$name = get_class($object);
						$writer->startElement($name);
						foreach ($object as $k => $v) {
							$writer->startElement($k);
							$writer->writeRaw($v);
							$writer->endElement();
						}
						$writer->endElement();
					}
					else {
						$writer->startElement($name);
						$writer->writeRaw($object);
						$writer->endElement();
					}
				}
				$writer->endElement();
				$writer->flush();
			break;

			case 'json':
			default:
				echo $data = CJSON::encode($data);
			break;
		}
	}

	/**
	 * Getting partner object from DB.
	 *
	 * @param string $key Unique partner`s key.
	 *
	 * @return object Partner`s unique key.
	 */
	public function getPartnerByKey($key)
	{
		return Partners::model()->findByAttributes(array('key' => $key, 'active' => 1));
	}

	/**
	 * Handling error exception.
	 *
	 * @param CEvent $event Event object.
	 *
	 * @return void
	 */
	public function handleError(CEvent $event)
	{
		if ($event instanceof CExceptionEvent) {
			$this->sendResponseError($event->exception);
		}

		$event->handled = true;
	}

	/**
	 * Sends response error.
	 *
	 * @param CException $e Error exception.
	 *
	 * @return void
	 */
	public function sendResponseError(CException $e)
	{
		$data = array(
			'message' => $e->getMessage(),
			'code' => $e->getCode(),
			'error' => true,
		);
		$this->sendResponse($data);
	}

	/**
	 * Returns error message.
	 *
	 * @param integer $code Status error code.
	 *
	 * @return null|string
	 */
	public static function getErrorMessage($code)
	{

		$messages = array(
			'1' => 'No existing categories',
			'2' => 'Invalid partner key',
			'3' => 'Invalid timestamp',
			'4' => 'Invalid token',
			'5' => 'Unsupported format output format',
			'6' => 'Unregistered partner',
		);

		return isset($messages[$code]) ? $messages[$code] : null;
	}

	/**
	 * List of supported formats.
	 *
	 * @return array
	 */
	public function supportedFormats()
	{
		return array('xml', 'json');
	}

	/**
	 * Retrieves request params, sorting and returns the secret token which is created for security purposes.
	 *
	 * @param array  $params        Request params that consists of output type, partner key and timestamp.
	 * @param string $request_token Token to verify with.
	 *
	 * @return boolean
	 */
	private function _verifyToken(array $params, $request_token)
	{
		ksort($params);
		$token = implode($params);
		$result = bCrypt::verify($token, $request_token);

		return (bool) $result;
	}

}
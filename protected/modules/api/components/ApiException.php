<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * API exception.
 *
 * @package Yiitrn\modules\api\components
 * @author  Alexander Bespalko <Alexander.Bespalko@sigmaukraine.com>
 */
class ApiException extends CException
{

	/**
	 * Constructor. Assign data error to ApiException object.
	 *
	 * @param string    $message  The Exception message to throw.
	 * @param integer   $code     The Exception code.
	 * @param Exception $previous The previous exception used for the exception chaining. Since 5.3.0.
	 */
	public function __construct($message = null, $code = 0, Exception $previous = null)
	{
		parent::__construct($message, $code, $previous);
	}

}
<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * Controller is the customized base controller class.
 *
 * @package Yiitrn\components
 * @author  aprogonniy <alexey.progonniy@sigmaukraine.com>
 */
class Controller extends CController
{

	/**
	 * The default layout for the controller view.
	 *
	 * @var string
	 */
	public $layout = 'column1';

	/**
	 * Context menu items.
	 *
	 * @var array
	 */
	public $menu = array();

	/**
	 * The breadcrumbs of the current page.
	 *
	 * @var array
	 */
	public $breadcrumbs = array();

	/**
	 * Take parameters from request and set global website language params.
	 *
	 * @param string $id     Controller id.
	 * @param string $module Controller module.
	 */
	public function __construct($id, $module = null)
	{
		parent::__construct($id, $module);
		// If there is a post-request, redirect the application to the provided url of the selected language
		if (isset($_POST['language'])) {
			$lang = $_POST['language'];
			$MultilangReturnUrl = $_POST[$lang];
			$this->redirect($MultilangReturnUrl);
		}
		// Set the application language if provided by GET, session or cookie
		if (isset($_GET['language']) && strlen($_GET['language']) == 2 && is_string($_GET['language'])) {
			Yii::app()->language = $_GET['language'];
			Yii::app()->user->setState('language', $_GET['language']);
			$cookie = new CHttpCookie('language', $_GET['language']);
			$cookie->expire = time() + (60 * 60 * 24 * 365);
			Yii::app()->request->cookies['language'] = $cookie;
		}
		else if (Yii::app()->user->hasState('language')) {
			Yii::app()->language = Yii::app()->user->getState('language');
		}
		else if (isset(Yii::app()->request->cookies['language'])) {
			Yii::app()->language = Yii::app()->request->cookies['language']->value;
		}
	}

	/**
	 * Create url with language identifier.
	 *
	 * @param string $lang Global website language value.
	 *
	 * @return mixed
	 */
	public function createMultilanguageReturnUrl($lang = 'en')
	{
		if (count($_GET) > 0) {
			$arr = $_GET;
			$arr['language'] = $lang;
		}
		else {
			$arr = array('language' => $lang);
		}
		return $this->createUrl('', $arr);
	}

	/*protected function afterAction()
	{
		if($this->writeLog)
		{
			$sql = 'INSERT INTO tbl_logs VALUES (\''.Yii::app()->user->name.'\',\''.$_SERVER['REMOTE_ADDR'].'\',\''.date("Y-m-d H:i:s").'\',\''.$this->getId().'\',\''.$this->getAction()->getId().'\',\''.$this->logMessage.'\')';
			$command = Yii::app()->db->createCommand($sql);
			$command->execute();
		}
	}*/

	/**
	 * Sends mail.
	 *
	 * @param string $to      Email to.
	 * @param string $subject Email`s subject.
	 * @param string $message Email`s message.
	 *
	 * @return boolean
	 */
	public function sendMail($to, $subject, $message)
	{

		if (Yii::app()->mailer->Mailer == 'smtp') {
			
			Yii::app()->mailer->AddAddress($to);
			Yii::app()->mailer->Subject = $subject;
			Yii::app()->mailer->Body = $message;
			
			return Yii::app()->mailer->Send();
		}
		else {
			$message = wordwrap($message);
			return mail($to, $subject, $message);
		}

	}

}
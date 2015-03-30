<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class YmbutoController extends CController
{
	public $settings;
	public $authSettings;
	public $limitSettings;
	public $method;
	public $getData;
	public $postData;
	public $filesData;

	private $_identity;

	/**
	 * Initialize the whole system
	 */
	public function init ()
	{
		$this->settings = Yii::app()->params;
		$this->method   = strtolower($_SERVER['REQUEST_METHOD']);

		$this->defaultAction = $this->method;

		$this->checkRequirements();
		$this->login();
		$this->processRequest();
		parent::init();
	}

	public function processRequest() {
		$method = 'action'.ucfirst($this->method);
		if(method_exists($this, $method)) {
			$this->getData      = (!empty($_GET)) ? $_GET : Array();
			$this->postData     = (!empty($_POST)) ? $_POST : Array();
			$this->filesData    = (!empty($_FILES)) ? $_FILES : Array();
			//$this->$method();
			$this->redirect ( 'token/post');
		} else {
			$this->sendResponse(
				405,
				Array(
					'success'=>false,
					'message'=>'Method not allowed'
				)
			);
		}
	}

	public function sendResponse ($status = 200, $data)
	{
		header('HTTP/1.1 ' . $status . ' ' . $this->settings['httpStatusCode'][$status]);
		// set the content type
		header('Content-type: application/json');
		echo CJSON::encode($data);
		Yii::app()->user->logout();
		Yii::app()->end();
	}

	private function checkRequirements()
	{
		if (	mb_strlen($this->settings['authentication']['id']) < 6
			||  mb_strlen($this->settings['authentication']['key']) < 12)
			$this->sendResponse(
				412,
				Array(
					'success'=>false,
					'message'=>'Check default id and key length'
				)
			);
	}

	/**
	 * Logs in.
	 *
	 * @return boolean whether login is successful
	 */
	public function login() {
		if ($this->_identity === null) {
			$username  = (isset($_SERVER['HTTP_X_USERNAME']))
				? $_SERVER['HTTP_X_USERNAME']
				: $_SERVER['PHP_AUTH_USER'];
			$password = (isset($_SERVER['HTTP_X_PASSWORD']))
				? $_SERVER['HTTP_X_PASSWORD']
				: $_SERVER['PHP_AUTH_PW'];

			$this->_identity = new UserIdentity($username, $password);
			$this->_identity->authenticate();
		}
		if ($this->_identity->errorCode === UserIdentity::ERROR_NONE) {
			Yii::app()->user->login($this->_identity, 0);
			return true;
		} else
			$this->sendResponse(
				401,
				Array(
					'success' => false,
					'message' => 'Authentication error'
				)
			);
	}

}
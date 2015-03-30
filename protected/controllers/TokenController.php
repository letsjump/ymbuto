<?php

class TokenController extends YmbutoController
{
	public function actionPut()
	{
		$model = new Token();
		$model->attributes = $this->getData;
		if($model->save()) {
			$this->sendResponse(
				200,
				Array(
					'success'=>true,
					'token'=>$model->token
				)
			);
		} else {
			$this->sendResponse(
				400,
				Array(
					'success' => false,
					'errors'    => $model->getErrors()
				)
			);
		}
	}

	public function actionPost()
	{
		echo 23;
		exit;
	}

	public function actionDelete()
	{
		if(strlen($this->getData['token']) == $this->settings['tokenLength']) {
			if (Token::model()->deleteAllByAttributes(
				Array('token' => $this->getData['token'])
			) > 0)
				$this->sendResponse(
					200,
					Array(
						'success'=>true,
						'message'=>"Token {$this->getData['token']} deleted"
					)
				);
			else
				$this->sendResponse(
					400,
					Array(
						'success' => true,
						'message' => "Token not found"
					)
				);
		} else {
			$this->sendResponse(
				400,
				Array(
					'success' => false,
					'message' => "Bad request"
				)
			);
		}
	}
}
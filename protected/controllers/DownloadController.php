<?php

class DownloadController extends YmbutoController
{
	public function allowedActions() {
		return 'get';
	}

	public function actionGet()
	{
		$model = Token::model()->findByAttributes(
			Array ('token'=>$this->getData['token'])
		);
		if (
			$model != null
			&& file_exists($model->absoluteFile)
		) {
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename='
					. basename($model->absoluteFile)
			);
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: ' . filesize($model->absoluteFile));
			readfile($model->absoluteFile);
		} else {
			echo "Sorry, your file is not yet available. Try later.";
		}
	}

	public function actionError () {

	}
}
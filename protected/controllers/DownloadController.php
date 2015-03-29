<?php

class DownloadController extends YmbutoController
{
	public function actionGet()
	{
		echo 1;
		//$file = new File('prova');
		exit;
	}

	public function actionPost()
	{
		print_r($this->getData);
		exit;
	}

	public function actionError() {

	}
}
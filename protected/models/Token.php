<?php

/**
 * This is the model class for table "token".
 *
 * The followings are the available columns in table 'request':
 * @property string $filename
 * @property string $token
 * @property string $request_date
 * @property integer $request_ip
 * @property string $errors
 * @property string $absoluteFile
 * @property string $settings
 */
class Token extends CActiveRecord
{
	public $AbsoluteFile;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'token';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('filename, request_date, request_ip', 'required'),
			array('request_ip', 'numerical', 'integerOnly'=>true),
			array('token', 'length', 'is'=>Yii::app()->params['tokenLength']),
			array('hash, errors, settings', 'safe'),
			array('filename', 'fileExists'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			//array('id, filename, hash, request_date, request_ip, request_type, errors, settings', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	public function beforeValidate()
	{
		$this->request_date = date('Y-m-d H:i:s');
		$this->request_ip	= ip2long($_SERVER['REMOTE_ADDR']);
		$this->token			= $this->getToken();
		return parent::beforeSave();
	}

	public function getToken()
	{
		$token = Yii::app()	->getSecurityManager()
							->generateRandomString(
								Yii::app()->params['tokenLength'],
								false
							);
		if($this->countByAttributes(Array('token'=>$token)) > 0)
			$this->getToken();
		else
			return $token;
	}

	public function getAbsoluteFile() {
		return 	Yii::app()->params['storageFolder']
				. DIRECTORY_SEPARATOR
				. $this->filename;
	}

	public function fileExists($attribute) {
		if (
			!file_exists(
				Yii::app()->params['storageFolder'] .
				DIRECTORY_SEPARATOR .
				$this->$attribute
			)
		)
			$this->addError(
				$attribute,
				"File {$this->$attribute} not found in folder "
				. Yii::app()->params['storageFolder']
			);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Token the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

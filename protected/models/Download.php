<?php

/**
 * This is the model class for table "download".
 *
 * The followings are the available columns in table 'download':
 * @property integer $id
 * @property integer $request_id
 * @property string $download_date
 * @property integer $download_ip
 * @property string $client_agent
 * @property string $errors
 * @property integer $filesize
 */
class Download extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'download';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('request_id, download_date, download_ip, client_agent, errors', 'required'),
			array('request_id, download_ip, filesize', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, request_id, download_date, download_ip, client_agent, errors, filesize', 'safe', 'on'=>'search'),
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

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'request_id' => 'Request',
			'download_date' => 'Download Date',
			'download_ip' => 'Download Ip',
			'client_agent' => 'Client Agent',
			'errors' => 'Errors',
			'filesize' => 'Filesize',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('request_id',$this->request_id);
		$criteria->compare('download_date',$this->download_date,true);
		$criteria->compare('download_ip',$this->download_ip);
		$criteria->compare('client_agent',$this->client_agent,true);
		$criteria->compare('errors',$this->errors,true);
		$criteria->compare('filesize',$this->filesize);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Download the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

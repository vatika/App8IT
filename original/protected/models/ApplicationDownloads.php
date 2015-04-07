<?php

/**
 * This is the model class for table "application_downloads".
 *
 * The followings are the available columns in table 'application_downloads':
 * @property integer $id
 * @property integer $application_id
 * @property integer $user_id
 * @property integer $version_id
 * @property string $download_date
 *
 * The followings are the available model relations:
 * @property Applications $application
 * @property Users $user
 * @property Versions $version
 */
class ApplicationDownloads extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'application_downloads';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('application_id, user_id, version_id, download_date', 'required'),
			array('application_id, user_id, version_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, application_id, user_id, version_id, download_date', 'safe', 'on'=>'search'),
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
			'application' => array(self::BELONGS_TO, 'Applications', 'application_id'),
			'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
			'version' => array(self::BELONGS_TO, 'Versions', 'version_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'application_id' => 'Application',
			'user_id' => 'User',
			'version_id' => 'Version',
			'download_date' => 'Download Date',
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
		$criteria->compare('application_id',$this->application_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('version_id',$this->version_id);
		$criteria->compare('download_date',$this->download_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ApplicationDownloads the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

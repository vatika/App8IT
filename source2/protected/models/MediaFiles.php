<?php

/**
 * This is the model class for table "media_files".
 *
 * The followings are the available columns in table 'media_files':
 * @property integer $id
 * @property integer $application_id
 * @property string $type
 * @property string $filename
 * @property string $status
 * @property string $create_date
 *
 * The followings are the available model relations:
 * @property Applications $application
 */
class MediaFiles extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'media_files';
	}
	private $_applicationName = null;
	public function getApplicationName()
	{
		if ($this->_applicationName === null && $this->application !== null)
		{
			$this->_applicationName = $this->application->name;
		}
		return $this->_applicationName;
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('application_id, type, filename, create_date', 'required'),
			array('application_id', 'numerical', 'integerOnly'=>true),
			array('type', 'length', 'max'=>5),
			array('filename', 'length', 'max'=>128),
			array('status', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, application_id, type, filename, status, create_date', 'safe', 'on'=>'search'),
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
			'type' => 'Media file type :',
			'filename' => 'Media File :',
			'status' => 'Status',
			'create_date' => 'Create Date',
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
	public function search($id)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->with = array('application');

		$criteria->compare('id',$this->id);
		$criteria->compare('application.name',$this->applicationName,true);
		
		$criteria->compare('application_id',$id);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('filename',$this->filename,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('create_date',$this->create_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MediaFiles the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

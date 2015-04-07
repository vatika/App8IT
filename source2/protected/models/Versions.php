<?php

/**
 * This is the model class for table "versions".
 *
 * The followings are the available columns in table 'versions':
 * @property integer $id
 * @property integer $application_id
 * @property string $file_name
 * @property string $version
 * @property string $create_date
 * @property integer $status_id
 * @property integer $reviewer_id
 * @property string $activity
 * @property string $comment
 *
 * The followings are the available model relations:
 * @property ApplicationDownloads[] $applicationDownloads
 * @property Applications $application
 * @property Users $reviewer
 * @property ApplicationStatusRef $status
 */
class Versions extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	private $_appName = null;
	private $_versionStatus = null;
	private $_reviewerEmail = null;
	private $_appStatus = null;
	private $reviewer_search;
	private $_reviewerName = null;
	public function tableName()
	{
		return 'versions';
	}
	public function getAppStatus()
	{
		if ($this->_appStatus === null && $this->application !== null)
		{
			$this->_appStatus = $this->application->status;
		}
		return $this->_appStatus;
	}
	public function setAppStatus($value)
	{
		$this->_appStatus = $value;
	}
	public function getReviewerEmail()
	{
		if ($this->_reviewerEmail === null && $this->reviewer !== null)
		{
			$this->_reviewerEmail = $this->reviewer->email;
		}
		return $this->_reviewerEmail;
	}
	public function setReviewerEmail($value)
	{
		$this->_reviewerEmail = $value;
	}

	public function getReviewerName()
	{
		if ($this->_reviewerName === null && $this->reviewer !== null)
		{
			$this->_reviewerName = $this->reviewer->first_name;
		}
		return $this->_reviewerName;
	}
	public function setReviewerName($value)
	{
		$this->_reviewerName = $value;
	}

public function getVersionStatus()

	{
		if ($this->_versionStatus === null && $this->status !== null)
		{
			$this->_versionStatus = $this->status->status;
		}
		return $this->_versionStatus;
	}
	public function setVersionStatus($value)
	{
		$this->_versionStatus = $value;
	}
	public function getAppName()
	{
		if ($this->_appName === null && $this->application !== null)
		{
			$this->_appName = $this->application->name;
		}
		return $this->_appName;
	}
	public function setAppName($value)
	{
		$this->_appName = $value;
	}
	/**
	 * @return array validation rules for model attributes.
	 */
            public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array(' file_name, version ', 'required'),
			array('application_id, status_id, reviewer_id', 'numerical', 'integerOnly'=>true),
			array('file_name, version', 'length', 'max'=>128),
			array('activity', 'length', 'max'=>255),
                        array('version','match','pattern'=>'/^([0-9]\.)+?/','message'=>'version should be of the type d.d.d where d stands for digit'),
                        array('file_name','match','pattern'=>'/^\w+\.(apk|iso|txt|ipa)+?/','message'=>'file name can only be .apk .ipa .txt or .iso'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id,reviewer.email,versionStatus,reviewerEmail,reviewerName, reviewer.first_name,appName,appStatus, application_id, file_name, version, create_date, status_id, reviewer_id, activity, comment', 'safe', 'on'=>'search'),
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
			'applicationDownloads' => array(self::HAS_MANY, 'ApplicationDownloads', 'version_id'),
			'application' => array(self::BELONGS_TO, 'Applications', 'application_id'),
			'reviewer' => array(self::BELONGS_TO, 'Users', 'reviewer_id'),
			'status' => array(self::BELONGS_TO, 'ApplicationStatusRef', 'status_id'),
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
		
			'file_name' => 'File',
			'version' => 'Version',
			'create_date' => 'Upload Date',
			'status_id' => 'Status',
			'reviewer_id' => 'Reviewer',
			'activity' => 'Checked',
			'comment' => 'Comment',
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
		$criteria->with = array('application','status','reviewer');
		$criteria->addCondition("application.status <= 2");
		$user = Users::model()->findbyPk(Yii::app()->user->id);
		if( $user->role_id == 3 )
			$criteria->addInCondition('t.reviewer_id',array($user->id));
//		$criteria->addCondition(($this->appStatus =1 || $this->appStatus = 0 ) && ( $this->versionStatus !=6));
		$criteria->compare('reviewer.email',$this->reviewerEmail,true);
		$criteria->compare('application.status',$this->appStatus,true);
	
		$criteria->compare('status.status',$this->versionStatus,true);
		$criteria->compare('application.name',$this->appName,true);
		$criteria->compare('id',$this->id);
		$criteria->compare('reviewer.first_name',$this->reviewerName,true);
		$criteria->compare('reviewer_search',$this->reviewer_search,true);
   //		$criteria->compare('status.status',$this->appStatus,true);
		$criteria->compare('application_id',$this->application_id);
		$criteria->compare('file_name',$this->file_name,true);
		$criteria->compare('version',$this->version,true);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('status_id',$this->status_id);
		$criteria->compare('reviewer_id',$this->reviewer_id);
		$criteria->compare('activity',$this->activity,true);
		$criteria->compare('comment',$this->comment,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Versions the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

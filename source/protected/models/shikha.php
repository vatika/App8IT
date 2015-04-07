<?php

/**
 * This is the model class for table "applications".
 *
 * The followings are the available columns in table 'applications':
 * @property integer $id
 * @property string $name
 * @property integer $user_id
 * @property integer $category_id
 * @property string $description
 * @property string $status
 * @property string $logo
 * @property integer $platform_id
 * @property integer $device_id
 * @property integer $ndownloads
 * @property string $disabled_comments
 *
 * The followings are the available model relations:
 * @property ApplicationDownloads[] $applicationDownloads
 * @property Categories $category
 * @property Platforms $platform
 * @property Devices $device
 * @property Users $user
 * @property Comments[] $comments
 * @property MediaFiles[] $mediaFiles
 * @property Ratings[] $ratings
 * @property Versions[] $versions
 */
class Applications extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $logo;	
	public function tableName()
	{
		return 'applications';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, description, logo', 'required'),
			array('user_id, category_id, platform_id, device_id, ndownloads', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>128),
			array('status', 'length', 'max'=>1),
			array('logo', 'file', 'types'=>'jpeg,jpg,gif,png'),
			array('logo','safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, user_id, category_id, description, status, logo, platform_id, device_id, ndownloads, disabled_comments', 'safe', 'on'=>'search'),
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
			'applicationDownloads' => array(self::HAS_MANY, 'ApplicationDownloads', 'application_id'),
			'category' => array(self::BELONGS_TO, 'Categories', 'category_id'),
			'platform' => array(self::BELONGS_TO, 'Platforms', 'platform_id'),
			'device' => array(self::BELONGS_TO, 'Devices', 'device_id'),
			'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
			'comments' => array(self::HAS_MANY, 'Comments', 'application_id'),
			'mediaFiles' => array(self::HAS_MANY, 'MediaFiles', 'application_id'),
			'ratings' => array(self::HAS_MANY, 'Ratings', 'application_id'),
			'versions' => array(self::HAS_MANY, 'Versions', 'application_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'user_id' => 'User',
			'category_id' => 'Category',
			'description' => 'Description',
			'status' => 'Status',
			'logo' => 'Logo',
			'platform_id' => 'Platform',
			'device_id' => 'Device',
			'ndownloads' => 'Ndownloads',
			'disabled_comments' => 'Disabled Comments',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('logo',$this->logo,true);
		$criteria->compare('platform_id',$this->platform_id);
		$criteria->compare('device_id',$this->device_id);
		$criteria->compare('ndownloads',$this->ndownloads);
		$criteria->compare('disabled_comments',$this->disabled_comments,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Applications the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

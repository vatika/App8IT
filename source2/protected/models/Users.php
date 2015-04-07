<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $email
 * @property string $password
 * @property string $first_name
 * @property string $last_name
 * @property string $phone_number
 * @property integer $role_id
 * @property string $create_date
 * @property string $modified_date
 * @property string $activation_key
 * @property string $status
 * @property string $reset_password_key
 * @property string $reset_password_date
 *
 * The followings are the available model relations:
 * @property ApplicationDownloads[] $applicationDownloads
 * @property Applications[] $applications
 * @property CategoryReviewerMapping[] $categoryReviewerMappings
 * @property Comments[] $comments
 * @property Ratings[] $ratings
 * @property Roles $role
 * @property Versions[] $versions
 */
class Users extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $role_search;
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
//			array('role.role','length','max'=>64),
			array('email, password, first_name, last_name, phone_number, role_id, activation_key, status', 'required'),
			array('role_id', 'numerical', 'integerOnly'=>true),
                        array('role_id', 'compare', 'compareValue' => 4, 'operator' => '<=','message'=>'role should be selected'),
			array('email, password, first_name, last_name, reset_password_key', 'length', 'max'=>128),
			array('status', 'length', 'max'=>1),
			array('reset_password_date', 'safe'),
                        array('email','email'),
                        array('phone_number', 'match', 'pattern' => '/^\d{12}/',"message"=>"International Format required"),
                        array('first_name', 'match', 'pattern' => '/^\w+$/',"message"=>"First Name is invalid"),
                        array('last_name', 'match', 'pattern' => '/^\w+$/',"message"=>"Last Name is invalid"),
                        //array('role_id', 'in', 'range' => [1, 2, 3, 4],'message'=>'role should be selected'),
                        //array('phone_number','validatePhoneNumber','message'=>'International Format Required'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, role_search, email, password, first_name, last_name, phone_number, role_id, create_date, modified_date, activation_key, status, reset_password_key, reset_password_date', 'safe', 'on'=>'search'),
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
			'applicationDownloads' => array(self::HAS_MANY, 'ApplicationDownloads', 'user_id'),
			'applications' => array(self::HAS_MANY, 'Applications', 'user_id'),
			'categoryReviewerMappings' => array(self::HAS_MANY, 'CategoryReviewerMapping', 'user_id'),
			'comments' => array(self::HAS_MANY, 'Comments', 'user_id'),
			'ratings' => array(self::HAS_MANY, 'Ratings', 'user_id'),
			'role' => array(self::BELONGS_TO, 'Roles', 'role_id'),
			'versions' => array(self::HAS_MANY, 'Versions', 'reviewer_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'email' => 'Email',
			'password' => 'Password',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'phone_number' => 'Phone Number',
			'role_id' => 'Role',
			'create_date' => 'Create Date',
			'modified_date' => 'Modified Date',
			'activation_key' => 'Assign Categories :',
			'status' => 'Status',
			'reset_password_key' => 'Reset Password Key',
			'reset_password_date' => 'Reset Password Date',
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
		$criteria->with = array('role');
//		$criteria->addCondition($this->status = 1 || $this->status =0);
 		$criteria->addCondition("t.status <= 2");
	
		$criteria->compare('role.role',$this->role_search,true);	
		$criteria->compare('id',$this->id);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('phone_number',$this->phone_number,true);
		$criteria->compare('role_id',$this->role_id);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('modified_date',$this->modified_date,true);
		$criteria->compare('activation_key',$this->activation_key,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('reset_password_key',$this->reset_password_key,true);
		$criteria->compare('reset_password_date',$this->reset_password_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function validatePassword($password)
        {
                return CPasswordHelper::verifyPassword($password,$this->password);
        }
        public function hashPassword($password)
        {
                return CPasswordHelper::hashPassword($password);
        }

}

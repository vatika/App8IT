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
	public $platform_search;
	public $device_search;	
	public $category_search;
	public $shikha;
	public $t;
	private $_categoryTitle;
	public function tableName()
	{
		return 'applications';
	}


 	public function getcategoryTitle()
        {
                if ($this->_categoryTitle === null && $this->category !== null)
                {
                        $this->_categoryTitle = $this->category->title;
                }
                return $this->_categoryTitle;
        }
        public function setcategoryTitle($value)
        {
                $this->_categoryTitle = $value;
        }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				//			array('platform.name','length','max'=>64),
				//			array('category.title','length','max'=>64),
				//			array('device.type','length','max'=>64),
				array('name, description, logo,platform_id,device_id,category_id', 'required'),
				array('user_id, category_id, platform_id, device_id, ndownloads', 'numerical', 'integerOnly'=>true),
				array('name', 'length', 'max'=>128),
				array('status', 'length', 'max'=>1),
				array('logo', 'file', 'types'=>'jpeg,jpg,gif,png'),
				array('logo','safe'),
 		                array('name','match','pattern'=>'/^\w+?/','message'=>'file name is invalid'),
				// The following rule is used by search().
				// @todo Please remove those attributes that should not be searched.
				array('id,platform.name,platform_search,device.type,device_search,category_search,category.title, categoryTitle, name, user_id, category_id, description, status, logo, platform_id, device_id, ndownloads, disabled_comments', 'safe', 'on'=>'search'),
				array(	'platform_id', 'exist',
					'allowEmpty'=>false,
	//				'on'=>'create,update',
					'attributeName'=>'id',
					'className'=>'Platforms',
					'skipOnError'=>true,
					'message'=>'Platform compulsory!',
				),
				array(	'device_id', 'exist',
						'allowEmpty'=>false,
						//				'on'=>'create,update',
						'attributeName'=>'id',
						'className'=>'Devices',
						'skipOnError'=>true,
						'message'=>'Device compulsory!',
				     ),
				array(	'category_id', 'exist',
						'allowEmpty'=>false,
						//				'on'=>'create,update',
						'attributeName'=>'id',
						'className'=>'Categories',
						'skipOnError'=>true,
						'message'=>'Category compulsory!',
				     ),
			/*	array(	'version', 'exist',
						'allowEmpty'=>false,
						//				'on'=>'create,update',
						'attributeName'=>'id',
						'className'=>'Versions',
						'skipOnError'=>true,
						'message'=>'Version compulsory!',
				     ),
*/
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
				'device_id' => 'Device Type',
				'ndownloads' => 'Number of downloads',
				'disabled_comments' => 'Disabled Comments',
				'category.title' => 'Category',
				'platform.name' => 'Platform',
				'device.type' => 'Device Type',
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
		$criteria->together = true;
		$criteria->with=array('versions','device','platform','category');

		$temp = Users::model()->findbyPk(Yii::app()->user->id);
		$criteria->addCondition("t.status <= 2");	
		if( $temp->role_id == 2 )// developer should only see his own apps
		{
			$criteria->addInCondition('t.user_id',array(Yii::app()->user->id),'AND');
		}
		
		if ( $temp->role_id == 3 ){// reviewer
			$criteria->addInCondition('versions.reviewer_id',array(Yii::app()->user->id),'AND');
			$criteria->compare('versions.status_id',1);
		}
		$criteria->compare('device.type',$this->device_search,true);
		$criteria->compare('platform.name',$this->platform_search,true);
	//	$criteria->compare('category.title',$this->categoryTitle,true);

               $criteria->compare('category.title',$this->category_search,true);

		$criteria->compare('t.id',$this->id);
		$criteria->compare('t.status',$this->status,true);
		$criteria->compare('t.name',$this->name,true);
//		$criteria->compare('t.user_id',$this->user_id);
		$criteria->compare('t.category_id',$this->category_id);
		$criteria->compare('t.description',$this->description,true);
		$criteria->compare('t.status',$this->status,true);
		$criteria->compare('t.logo',$this->logo,true);
		$criteria->compare('t.platform_id',$this->platform_id);
		$criteria->compare('t.device_id',$this->device_id);
		$criteria->compare('t.ndownloads',$this->ndownloads);
		$criteria->compare('t.disabled_comments',$this->disabled_comments,true);
		return new CActiveDataProvider($this, array(
					'criteria'=>$criteria,
					));
	}
public function searchpendingdev()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->together = true;
		
		$criteria->with=array('versions','device','platform','category');

	//	$temp = Users::model()->findbyPk(Yii::app()->user->id);
/*		$temp = Versions::model()->findAllByAttributes(array('application_id' => $this->id));
		//echo $temp[0]->id;
		echo $this->id;
		$t = -1;
		foreach( $temp as $x ):
				echo $x->id;
				if( $x->id > $t){
					$t = $x->id;
				}
		endforeach;
	//	$temp = Versions::model()->findbyPk($t);
		//$t = $temp[0]->id;
*/		$criteria->compare('versions.status_id',1);
//		$criteria->compare('versions.id',$t);
		$criteria->compare('device.type',$this->device_search,true);
		$criteria->compare('platform.name',$this->platform_search,true);
		$criteria->compare('category.title',$this->category_search,true);
		$criteria->compare('t.id',$this->id);
		$criteria->compare('t.status',0);
		$criteria->compare('t.name',$this->name,true);
		$criteria->compare('t.user_id',$this->user_id);
		$criteria->compare('t.category_id',$this->category_id);
		$criteria->compare('t.description',$this->description,true);
		$criteria->compare('t.status',$this->status,true);
		$criteria->compare('t.logo',$this->logo,true);
		$criteria->compare('t.platform_id',$this->platform_id);
		$criteria->compare('t.device_id',$this->device_id);
		$criteria->compare('t.ndownloads',$this->ndownloads);
		$criteria->compare('t.dissabled_comments',$this->disabled_comments,true);
		return new CActiveDataProvider($this, array(
					'criteria'=>$criteria,
					));
	}
	public function searchpendingrev()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->together = true;
		
		$criteria->with=array('versions','device','platform','category');

	//	$temp = Users::model()->findbyPk(Yii::app()->user->id);
		
		$criteria->compare('versions.status_id',5);
		$criteria->compare('device.type',$this->device_search,true);
		$criteria->compare('platform.name',$this->platform_search,true);
		$criteria->compare('category.title',$this->category_search,true);
		$criteria->compare('t.id',$this->id);
		$criteria->compare('t.name',$this->name,true);
		$criteria->compare('t.user_id',$this->user_id);
		$criteria->compare('t.category_id',$this->category_id);
		$criteria->compare('t.description',$this->description,true);
		$criteria->compare('t.status',$this->status,true);
		$criteria->compare('t.logo',$this->logo,true);
		$criteria->compare('t.platform_id',$this->platform_id);
		$criteria->compare('t.device_id',$this->device_id);
		$criteria->compare('t.ndownloads',$this->ndownloads);
		$criteria->compare('t.dissabled_comments',$this->disabled_comments,true);
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

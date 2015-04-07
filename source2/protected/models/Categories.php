<?php

/**
 * This is the model class for table "categories".
 *
 * The followings are the available columns in table 'categories':
 * @property integer $id
 * @property string $title
 * @property integer $parent_id
 * @property string $status
 * @property string $description
 * @property string $create_date
 * @property string $modified_date
 *
 * The followings are the available model relations:
 * @property Applications[] $applications
 * @property Categories $parent
 * @property Categories[] $categories
 * @property CategoryReviewerMapping[] $categoryReviewerMappings
 * @property ChecklistCategoryMap[] $checklistCategoryMaps
 */
class Categories extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */


	public $parent_search;
			public function getConcatenated()
        {
                return $this->title.': '.$this->description;
        }

	public function tableName()
	{
		return 'categories';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	
        public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title','length','max'=>64),
			array('title, description', 'required'),
			array('parent_id', 'numerical', 'integerOnly'=>true),
			array('status', 'boolean','message'=>'Status should be selected'),
                        array('title', 'length', 'max'=>128),
                        array('parent_id','required'),
                        array('status','required'),
                        array('title','match','pattern'=>'/^\w+$/','message'=>'Title is invalid please choose another'),
			//array('status', 'length', 'max'=>1),   not required
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, parent_search, title, parent_id, status, description, create_date, modified_date', 'safe', 'on'=>'search'),
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
			'applications' => array(self::HAS_MANY, 'Applications', 'category_id'),
			'parent' => array(self::BELONGS_TO, 'Categories', 'parent_id'),
			'categories' => array(self::HAS_MANY, 'Categories', 'parent_id'),
			'categoryReviewerMappings' => array(self::HAS_MANY, 'CategoryReviewerMapping', 'category_id'),
			'checklistCategoryMaps' => array(self::HAS_MANY, 'ChecklistCategoryMap', 'category_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'parent_id' => 'Parent',
			'status' => 'Status',
			'description' => 'Description',
			'create_date' => 'Create Date',
			'modified_date' => 'Modified Date',
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

//		$str = $this->status."= 0 OR ".$this->status."= 0 ";
		$criteria=new CDbCriteria;
		$criteria->addCondition("t.status <= 2");
		$criteria->compare('title',$this->parent_search,true);
		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('create_date',$this->create_date,true);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Categories the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

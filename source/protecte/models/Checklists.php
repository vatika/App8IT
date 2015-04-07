<?php

/**
 * This is the model class for table "checklists".
 *
 * The followings are the available columns in table 'checklists':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $status
 * @property string $create_date
 * @property string $modified_date
 *
 * The followings are the available model relations:
 * @property ChecklistCategoryMap[] $checklistCategoryMaps
 */
class Checklists extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'checklists';
	}
	/**
	 * @return array validation rules for model attributes.
	 */
		public function getConcatenated()
        {
                $t = "   ".$this->title.":   ".$this->description;
             //   echo $t;
                return $t;
        }

	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, description, create_date, modified_date', 'required'),
			array('title', 'length', 'max'=>128),
			array('status', 'length', 'max'=>1),
                        array('title','match','pattern'=>'/^\w+$/','message'=>'Title is Invalid'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, description, status, create_date, modified_date', 'safe', 'on'=>'search'),
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
			'checklistCategoryMaps' => array(self::HAS_MANY, 'ChecklistCategoryMap', 'checklist_id'),
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
			'description' => 'Description',
			'status' => 'Status',
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

		$criteria=new CDbCriteria;
//  $criteria->addCondition($this->status = 1 || $this->status=0);
		$criteria->addCondition("t.status <= 2");

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('modified_date',$this->modified_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Checklists the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

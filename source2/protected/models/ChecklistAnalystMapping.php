<?php

/**
 * This is the model class for table "checklist_analyst_mapping".
 *
 * The followings are the available columns in table 'checklist_analyst_mapping':
 * @property integer $id
 * @property integer $analyst_id
 * @property integer $checklist_id
 * @property integer $version_id
 * @property integer $create_date
 *
 * The followings are the available model relations:
 * @property Users $analyst
 * @property Checklists $checklist
 * @property Versions $version
 */
class ChecklistAnalystMapping extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'checklist_analyst_mapping';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, analyst_id, checklist_id, version_id, create_date', 'required'),
			array('id, analyst_id, checklist_id, version_id, create_date', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, analyst_id, checklist_id, version_id, create_date', 'safe', 'on'=>'search'),
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
			'analyst' => array(self::BELONGS_TO, 'Users', 'analyst_id'),
			'checklist' => array(self::BELONGS_TO, 'Checklists', 'checklist_id'),
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
			'analyst_id' => 'Analyst',
			'checklist_id' => 'Checklist',
			'version_id' => 'Version',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('analyst_id',$this->analyst_id);
		$criteria->compare('checklist_id',$this->checklist_id);
		$criteria->compare('version_id',$this->version_id);
		$criteria->compare('create_date',$this->create_date);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ChecklistAnalystMapping the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

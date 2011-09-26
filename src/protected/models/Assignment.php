<?php

/**
 * This is the model class for table "tbl_assignments".
 *
 * The followings are the available columns in table 'tbl_assignments':
 * @property integer $id
 * @property string $assignment_date
 * @property integer $user_id
 * @property integer $offering_id
 *
 * The followings are the available model relations:
 * @property TblOfferings $offering
 * @property TblUser $user
 */
class Assignment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Assignment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_assignments';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, offering_id', 'numerical', 'integerOnly'=>true),
			array('assignment_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, assignment_date, user_id, offering_id', 'safe', 'on'=>'search'),
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
			'offering' => array(self::BELONGS_TO, 'TblOfferings', 'offering_id'),
			'user' => array(self::BELONGS_TO, 'TblUser', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'assignment_date' => 'Assignment Date',
			'user_id' => 'User',
			'offering_id' => 'Offering',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('assignment_date',$this->assignment_date,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('offering_id',$this->offering_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
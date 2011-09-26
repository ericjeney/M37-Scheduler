<?php

/**
 * This is the model class for table "tbl_offerings".
 *
 * The followings are the available columns in table 'tbl_offerings':
 * @property integer $id
 * @property string $title
 * @property string $room
 * @property boolean $hidden
 *
 * The followings are the available model relations:
 * @property TblAssignments[] $tblAssignments
 * @property TblAssist[] $tblAssists
 * @property TblPass[] $tblPasses
 */
class Offering extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Offering the static model class
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
		return 'tbl_offerings';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title', 'required'),
			array('title', 'length', 'max'=>30),
			array('room', 'length', 'max'=>3),
			array('hidden', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, room, hidden', 'safe', 'on'=>'search'),
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
			'tblAssignments' => array(self::HAS_MANY, 'Assignment', 'offering_id'),
			//'tblAssists' => array(self::HAS_MANY, 'TblAssist', 'offering_id'),
			//'tblPasses' => array(self::HAS_MANY, 'TblPass', 'offering_id'),
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
			'room' => 'Room',
			'hidden' => 'Hidden',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('room',$this->room,true);
		$criteria->compare('hidden',$this->hidden);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
<?php

/**
 * This is the model class for table "tbl_assist".
 *
 * The followings are the available columns in table 'tbl_assist':
 * @property integer $id
 * @property integer $user_id
 * @property integer $offering_id
 *
 * The followings are the available model relations:
 * @property TblOfferings $offering
 * @property TblUser $user
 * @property TblMatchup[] $tblMatchups
 */
class Assist extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Assist the static model class
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
		return 'tbl_assist';
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
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, offering_id', 'safe', 'on'=>'search'),
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
			'offering' => array(self::BELONGS_TO, 'Offering', 'offering_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			//'tblMatchups' => array(self::HAS_MANY, 'TblMatchup', 'assist_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('offering_id',$this->offering_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public static function findAssistForUser($id) {
		return Assist::model()->find("user_id=?", array($id));
	}
}
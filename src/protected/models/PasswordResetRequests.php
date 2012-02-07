<?php

/**
 * This is the model class for table "tbl_passwordResetRequests".
 *
 * The followings are the available columns in table 'tbl_passwordResetRequests':
 * @property integer $id
 * @property integer $user_id
 * @property string $new_password
 * @property integer $creation_time
 * @property string $reset_code
 */
class PasswordResetRequests extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return PasswordResetRequests the static model class
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
		return 'tbl_passwordResetRequests';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, user_id, creation_time, new_password, reset_code', 'required'),
			array('id, user_id, creation_time', 'numerical', 'integerOnly'=>true),
			array('new_password', 'length', 'max'=>128),
			array('reset_code', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, creation_time, reset_code', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
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
			'new_password' => 'New Password',
			'creation_time' => 'Creation Time',
			'reset_code' => 'Reset Code',
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
		$criteria->compare('creation_time',$this->creation_time);
		$criteria->compare('reset_code',$this->reset_code,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
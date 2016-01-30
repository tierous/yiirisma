<?php

/**
 * This is the model class for table "coupon".
 *
 * The followings are the available columns in table 'coupon':
 * @property integer $coupon_id
 * @property string $coupon_code
 * @property double $coupon_discount
 * @property integer $coupon_status
 * @property string $coupon_date_expire
 * @property string $date_added
 * @property string $date_modified
 * @property integer $coupon_used
 */
class Coupon extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'coupon';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('coupon_code, coupon_discount', 'required'),
			array('coupon_status, coupon_used', 'numerical', 'integerOnly'=>true),
			array('coupon_discount', 'numerical'),
			array('coupon_code', 'length', 'max'=>20),
			array('coupon_date_expire, date_added, date_modified', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('coupon_id, coupon_code, coupon_discount, coupon_status, coupon_date_expire, date_added, date_modified, coupon_used', 'safe', 'on'=>'search'),
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
		);
	}

        public function formatStatus() {
        if ($this->coupon_status == 1)
            return "On";
        else
            return "Off";
    }
        
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'coupon_id' => 'Coupon',
			'coupon_code' => 'Coupon Code',
			'coupon_discount' => 'Coupon Discount',
			'coupon_status' => 'Coupon Status',
			'coupon_date_expire' => 'Coupon Date Expire',
			'date_added' => 'Date Added',
			'date_modified' => 'Date Modified',
			'coupon_used' => 'Coupon Used',
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

		$criteria->compare('coupon_id',$this->coupon_id);
		$criteria->compare('coupon_code',$this->coupon_code,true);
		$criteria->compare('coupon_discount',$this->coupon_discount);
		$criteria->compare('coupon_status',$this->coupon_status);
		$criteria->compare('coupon_date_expire',$this->coupon_date_expire,true);
		$criteria->compare('date_added',$this->date_added,true);
		$criteria->compare('date_modified',$this->date_modified,true);
		$criteria->compare('coupon_used',$this->coupon_used);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Coupon the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

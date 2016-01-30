<?php

class ProductAttribute extends CActiveRecord
{
	
	public function tableName()
	{
		return 'product_attribute';
	}

	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_id, product_option_id, option_value_id, option_value_price', 'required'),
			array('product_id, product_option_id, option_value_id, option_value_price', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('product_attribute_id, product_id, product_option_id, option_value_id, option_value_price', 'safe', 'on'=>'search'),
		);
	}
	
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'product' => array(self::BELONGS_TO, 'Product', 'product_id'),
			'productOption' => array(self::BELONGS_TO, 'ProductOption', 'product_option_id'),
			'productOptionValue' => array(self::BELONGS_TO, 'ProductOptionValue','option_value_id')
		);
	}
	
	public function attributeLabels()
	{
		return array(
			'product_attribute_id' => 'Product Attribute',
			'product_id' => 'Product',
			'product_option_id' => 'Product Option',
			'option_value_id' => 'Option Value',
			'option_value_price' => 'Option Value Price',
		);
	}
	
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('product_attribute_id',$this->product_attribute_id);
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('product_option_id',$this->product_option_id);
		$criteria->compare('option_value_id',$this->option_value_id);
		$criteria->compare('option_value_price',$this->option_value_price);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

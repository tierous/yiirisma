<?php

class ProductOption extends CActiveRecord
{
	public function tableName()
	{
		return 'product_option';
	}

	public function rules()
	{
		return array(
			array('product_option_name', 'required'),
			array('product_option_name', 'length', 'max'=>32),
			
			array('product_option_id, product_option_name', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{		
		return array(
			'productAttributes' => array(self::HAS_MANY, 'ProductAttribute', 'product_option_id'),
			'productOptionValueToProductOptions' => array(self::HAS_MANY, 'ProductOptionValueToProductOption', 'product_option_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'product_option_id' => 'Product Option',
			'product_option_name' => 'Product Option Name',
		);
	}

	public function search()
	{

		$criteria=new CDbCriteria;

		$criteria->compare('product_option_id',$this->product_option_id);
		$criteria->compare('product_option_name',$this->product_option_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

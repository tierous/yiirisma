<?php

class ProductOptionValue extends CActiveRecord
{

	public function tableName()
	{
		return 'product_option_value';
	}

	public function rules()
	{
		return array(
			array('product_option_value_name', 'required'),
			array('product_option_value_name', 'length', 'max'=>64),
			
			array('product_option_value_id, product_option_value_name', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'productOptionValueToProductOptions' => array(self::HAS_MANY, 'ProductOptionValueToProductOption', 'product_option_value_id'),
			'productOptionValues' => array(self::HAS_MANY, 'ProductAttribute', 'option_value_id')
		);
	}

	public function attributeLabels()
	{
		return array(
			'product_option_value_id' => 'Product Option Value',
			'product_option_value_name' => 'Product Option Value Name',
		);
	}

	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('product_option_value_id',$this->product_option_value_id);
		$criteria->compare('product_option_value_name',$this->product_option_value_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

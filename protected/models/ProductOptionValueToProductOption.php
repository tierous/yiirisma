<?php

class ProductOptionValueToProductOption extends CActiveRecord {

    public function tableName() {
        return 'product_option_value_to_product_option';
    }

    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('product_option_id, product_option_value_id', 'required'),
            array('product_option_id, product_option_value_id', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('product_option_value_to_product_option_id, product_option_id, product_option_value_id', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'productOption' => array(self::BELONGS_TO, 'ProductOption', 'product_option_id'),
            'productOptionValue' => array(self::BELONGS_TO, 'ProductOptionValue', 'product_option_value_id'),
        );
    }

    public function attributeLabels() {
        return array(
            'product_option_value_to_product_option_id' => 'ID',
            'product_option_id' => 'Product Option',
            'product_option_value_id' => 'Product Option Value',
        );
    }

    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('product_option_value_to_product_option_id', $this->product_option_value_to_product_option_id);
        $criteria->compare('product_option_id', $this->product_option_id);
        $criteria->compare('product_option_value_id', $this->product_option_value_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}

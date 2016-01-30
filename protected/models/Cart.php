<?php

class Cart extends CActiveRecord {

    public function tableName() {
        return 'cart';
    }

    public function rules() {
        return array(
            array('product_id, quantity, cart_code', 'required'),
            array('product_id, quantity', 'numerical', 'integerOnly' => true),
            array('cart_code', 'length', 'max' => 255),
            array('cart_id, product_id, quantity, cart_code', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {

        return array(
            'product' => array(self::BELONGS_TO, 'Product', 'product_id'),
        );
    }

    public function attributeLabels() {
        return array(
            'cart_id' => 'Cart',
            'product_id' => 'Product',
            'quantity' => 'Quantity',
            'cart_code' => 'Cart Code',
        );
    }

    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('cart_id', $this->cart_id);
        $criteria->compare('product_id', $this->product_id);
        $criteria->compare('quantity', $this->quantity);
        $criteria->compare('cart_code', $this->cart_code, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}

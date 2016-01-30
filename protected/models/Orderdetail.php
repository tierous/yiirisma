<?php

class Orderdetail extends CActiveRecord {

    protected function afterFind() {
        parent::afterFind();
        $this->subtotal = $this->subtotal;
        return TRUE;
    }

    public function tableName() {
        return 'orderdetail';
    }

    public function rules() {
        return array(
            array('order_code, order_id, product_id, quantity, subtotal', 'required'),
            array('order_id, product_id, quantity, subtotal', 'numerical', 'integerOnly' => true),
            array('order_code', 'length', 'max' => 13),
            array('id, order_code, order_id, product_id, quantity, subtotal', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
            'order' => array(self::BELONGS_TO, 'Order', 'order_id'),
            'product' => array(self::BELONGS_TO, 'Product', 'product_id'),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'order_code' => 'Order Code',
            'order_id' => 'Order',
            'product_id' => 'Product',
            'quantity' => 'Quantity',
            'subtotal' => 'Subtotal',
        );
    }

    public function search() {

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('order_code', $this->order_code, true);
        $criteria->compare('order_id', $this->order_id);
        $criteria->compare('product_id', $this->product_id);
        $criteria->compare('quantity', $this->quantity);
        $criteria->compare('subtotal', $this->subtotal);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}

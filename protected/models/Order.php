<?php

class Order extends CActiveRecord {

    public $payment;

    protected function afterFind() {
        parent::afterFind();
        $this->order_date = date('d F, Y', strtotime(str_replace("-", "", $this->order_date)));
        $this->payment = $this->payment_status == 0 ? 'Pending' : 'Paid';
    }

    protected function beforeSave() {
        if (parent::beforeSave()) {
            $this->order_date = date('Y-m-d', strtotime(str_replace(",", "", $this->order_date)));
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function tableName() {
        return 'order';
    }

    public function rules() {
        return array(
            array('order_code, order_date, address_book_id, customer_id, bank_transfer', 'required'),
            array('address_book_id, customer_id, payment_status', 'numerical', 'integerOnly' => true),
            array('order_code', 'length', 'max' => 17),
            array('bank_transfer', 'length', 'max' => 50),
            array('order_id, order_code, order_date, address_book_id, customer_id, bank_transfer, payment_status', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
            'customer' => array(self::BELONGS_TO, 'Customer', 'customer_id'),
            'addressBook' => array(self::BELONGS_TO, 'AddressBook', 'address_book_id'),
            'orderdetails' => array(self::HAS_MANY, 'Orderdetail', 'order_id'),
        );
    }

    public function attributeLabels() {
        return array(
            'order_id' => 'Order',
            'order_code' => 'Order Code',
            'order_date' => 'Order Date',
            'address_book_id' => 'Address Book',
            'customer_id' => 'Customer',
            'bank_transfer' => 'Bank Transfer',
            'payment_status' => 'Payment Status',
        );
    }

    public function search() {

        $criteria = new CDbCriteria;

        $criteria->compare('order_id', $this->order_id);
        $criteria->compare('order_code', $this->order_code, true);
        $criteria->compare('order_date', $this->order_date, true);
        $criteria->compare('address_book_id', $this->address_book_id);
        $criteria->compare('customer_id', $this->customer_id);
        $criteria->compare('bank_transfer', $this->bank_transfer, true);
        $criteria->compare('payment_status', $this->payment_status);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}

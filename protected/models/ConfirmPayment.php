<?php

class ConfirmPayment extends CActiveRecord {

    public $nomerPemesanan; //nomerpemesanan
    public $bankAsal; // nama bank asal
    public $pemilikRekAsal; // nama pemilik rek asal
    public $bankTujuan; //nama bank tujuan transfer
    public $nominalTransfer; // nominal transfer / jumlah uang yang di transfer
    public $dataPaymentText;

    public function afterFind() {
        parent::afterFind();
        $this->dataPaymentText = explode('#', $this->text_detail);
    }

    public function tableName() {
        return 'confirm_payment';
    }

    public function rules() {
        return array(
            array('order_code,text_detail', 'required'),
            array('nomerPemesanan,bankAsal,pemilikRekAsal,bankTujuan,nominalTransfer', 'required'),
            array('order_code, text_detail', 'required'),
            array('order_code', 'length', 'max' => 17),
            array('confirm_payment_id, order_code, text_detail', 'safe', 'on' => 'search'),
        );
    }

    public function attributeLabels() {
        return array(
            'confirm_payment_id' => 'Confirm Payment',
            'order_code' => 'Order Code',
            'text_detail' => 'Text Detail',
            'nomerPemesanan' => 'Nomer Pemesanan',
            'pemilikRekAsal' => 'Nama Pemilik Rekening Asal',
            'bankAsal' => 'Nama Bank Asal',
            'bankTujuan' => 'Bank Tujuan Transfer',
            'nominalTransfer' => 'Jumlah yang ditransfer',
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('confirm_payment_id', $this->confirm_payment_id);
        $criteria->compare('order_id', $this->order_id);
        $criteria->compare('order_code', $this->order_code, true);
        $criteria->compare('text_detail', $this->text_detail, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}

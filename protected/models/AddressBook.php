<?php

class AddressBook extends CActiveRecord {

    /**
     * @return memilih tabel yang digunakan
     */
    public function tableName() {
        return 'address_book';
    }

    /**
     * @return aturan validasi dari tiap aturan
     */
    public function rules() {
        return array(
            array('customer_id, entry_name, entry_address, entry_province_id, entry_city_id', 'required'),
            array('customer_id, entry_province_id, entry_city_id', 'numerical', 'integerOnly' => true),
            array('entry_name', 'length', 'max' => 64),
            array('address_book_id, customer_id, entry_name, entry_address, entry_province_id, entry_city_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return mendefinisikan relasi
     */
    public function relations() {
        return array(
            'entryCity' => array(self::BELONGS_TO, 'City', 'entry_city_id'),
            'customer' => array(self::BELONGS_TO, 'Customer', 'customer_id'),
            'entryProvince' => array(self::BELONGS_TO, 'Province', 'entry_province_id'),
            'orders' => array(self::HAS_MANY, 'Order', 'address_book_id'),
        );
    }

    /**
     * @return menentukan label dari tiap attribut
     */
    public function attributeLabels() {
        return array(
            'address_book_id' => 'Address Book',
            'customer_id' => 'Customer',
            'entry_name' => 'Entry Name',
            'entry_address' => 'Entry Address',
            'entry_province_id' => 'Entry Province',
            'entry_city_id' => 'Entry City',
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('address_book_id', $this->address_book_id);
        $criteria->compare('customer_id', $this->customer_id);
        $criteria->compare('entry_name', $this->entry_name, true);
        $criteria->compare('entry_address', $this->entry_address, true);
        $criteria->compare('entry_province_id', $this->entry_province_id);
        $criteria->compare('entry_city_id', $this->entry_city_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * pendefinisian class model
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}

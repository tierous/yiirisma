<?php

class City extends CActiveRecord {

    public function tableName() {
        return 'city';
    }

    public function rules() {
        return array(
            array('city_name, province_id', 'required'),
            array('province_id', 'numerical', 'integerOnly' => true),
            array('city_name', 'length', 'max' => 64),
            array('city_id, city_name, province_id', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
            'addressBooks' => array(self::HAS_MANY, 'AddressBook', 'entry_city_id'),
            'province' => array(self::BELONGS_TO, 'Province', 'province_id'),
        );
    }

    public function attributeLabels() {
        return array(
            'city_id' => 'City',
            'city_name' => 'City Name',
            'province_id' => 'Province',
        );
    }

    public function search() {

        $criteria = new CDbCriteria;

        $criteria->compare('city_id', $this->city_id);
        $criteria->compare('city_name', $this->city_name, true);
        $criteria->compare('province_id', $this->province_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}

<?php

class Province extends CActiveRecord {

    public function tableName() {
        return 'province';
    }

    public function rules() {
        return array(
            array('province_name', 'required'),
            array('province_name', 'length', 'max' => 64),
            array('province_id, province_name', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
            'addressBooks' => array(self::HAS_MANY, 'AddressBook', 'entry_province_id'),
            'cities' => array(self::HAS_MANY, 'City', 'province_id'),
        );
    }

    public function attributeLabels() {
        return array(
            'province_id' => 'Province',
            'province_name' => 'Province Name',
        );
    }

    public function search() {

        $criteria = new CDbCriteria;

        $criteria->compare('province_id', $this->province_id);
        $criteria->compare('province_name', $this->province_name, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}

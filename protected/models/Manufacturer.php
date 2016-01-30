<?php

class Manufacturer extends CActiveRecord {

    public function tableName() {
        return 'manufacturer';
    }

    public function rules() {
        return array(
            array('manufacturer_name', 'required'),
            array('manufacturer_name', 'length', 'max' => 64),
            array('date_added, date_modified', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('manufacturer_id, manufacturer_name, date_added, date_modified', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
            'products' => array(self::HAS_MANY, 'Product', 'manufacturer_id'),
        );
    }

    public function attributeLabels() {
        return array(
            'manufacturer_id' => 'Manufacturer',
            'manufacturer_name' => 'Manufacturer Name',
            'date_added' => 'Date Added',
            'date_modified' => 'Date Modified',
        );
    }

    public function search() {

        $criteria = new CDbCriteria;

        $criteria->compare('manufacturer_id', $this->manufacturer_id);
        $criteria->compare('manufacturer_name', $this->manufacturer_name, true);
        $criteria->compare('date_added', $this->date_added, true);
        $criteria->compare('date_modified', $this->date_modified, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}

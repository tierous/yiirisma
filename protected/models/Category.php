<?php

class Category extends CActiveRecord {

    public function tableName() {
        return 'category';
    }

    public function rules() {
        return array(
            array('category_name', 'required'),
            array('category_name', 'length', 'max' => 64),
            array('date_added, date_modified', 'safe'),
            array('category_id, category_name, date_added, date_modified', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
            'products' => array(self::HAS_MANY, 'Product', 'category_id'),
        );
    }

    public function attributeLabels() {
        return array(
            'category_id' => 'Category',
            'category_name' => 'Category Name',
            'date_added' => 'Date Added',
            'date_modified' => 'Date Modified',
        );
    }

    public function search() {
        $criteria = new CDbCriteria;
        $criteria->compare('category_id', $this->category_id);
        $criteria->compare('category_name', $this->category_name, true);
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

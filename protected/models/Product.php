<?php

class Product extends CActiveRecord {

    public function tableName() {
        return 'product';
    }

    public function rules() {
        return array(
            array('category_id, manufacturer_id, product_name, product_model, product_price', 'required'),
            array('category_id, manufacturer_id, product_price', 'numerical', 'integerOnly' => true),
            array('product_name', 'length', 'max' => 64),
            array('product_model', 'length', 'max' => 12),
            array('product_image', 'length', 'max' => 255),
            array('product_description, date_added, date_modified', 'safe'),
            array('product_id, category_id, manufacturer_id, product_name, product_model, product_price, product_description, product_image, date_added, date_modified', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
            'carts' => array(self::HAS_MANY, 'Cart', 'product_id'),
            'orderdetails' => array(self::HAS_MANY, 'Orderdetail', 'product_id'),
            'category' => array(self::BELONGS_TO, 'Category', 'category_id'),
            'manufacturer' => array(self::BELONGS_TO, 'Manufacturer', 'manufacturer_id'),
            'comments' => array(self::HAS_MANY, 'Comment', 'product_id'),
            'commentCount' => array(self::STAT, 'Comment', 'product_id'),
            'deals' => array(self::HAS_MANY, 'Deal', 'product_id')
        );
    }

    public function attributeLabels() {
        return array(
            'product_id' => 'Product',
            'category_id' => 'Category',
            'manufacturer_id' => 'Manufacturer',
            'product_name' => 'Product Name',
            'product_model' => 'Product Model',
            'product_price' => 'Product Price',
            'product_description' => 'Product Description',
            'product_image' => 'Product Image',
            'date_added' => 'Date Added',
            'date_modified' => 'Date Modified',
        );
    }

    public function search() {

        $criteria = new CDbCriteria;

        $criteria->compare('product_id', $this->product_id);
        $criteria->compare('category_id', $this->category_id);
        $criteria->compare('manufacturer_id', $this->manufacturer_id);
        $criteria->compare('product_name', $this->product_name, true);
        $criteria->compare('product_model', $this->product_model, true);
        $criteria->compare('product_price', $this->product_price);
        $criteria->compare('product_description', $this->product_description, true);
        $criteria->compare('product_image', $this->product_image, true);
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

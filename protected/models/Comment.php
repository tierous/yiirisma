<?php

class Comment extends CActiveRecord {

    public function tableName() {
        return 'comment';
    }

    public function rules() {
        return array(
            array('product_id, customer_id, comment_text', 'required'),
            array('product_id, customer_id', 'numerical', 'integerOnly' => true),
            array('date_added, date_modified', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('comment_id, product_id, customer_id, comment_text, date_added, date_modified', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
            'customer' => array(self::BELONGS_TO, 'Customer', 'customer_id'),
            'product' => array(self::BELONGS_TO, 'Product', 'product_id'),
        );
    }

    public function attributeLabels() {
        return array(
            'comment_id' => 'Comment',
            'product_id' => 'Product',
            'customer_id' => 'Customer',
            'comment_text' => 'Comment Text',
            'date_added' => 'Date Added',
            'date_modified' => 'Date Modified',
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('comment_id', $this->comment_id);
        $criteria->compare('product_id', $this->product_id);
        $criteria->compare('customer_id', $this->customer_id);
        $criteria->compare('comment_text', $this->comment_text, true);
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

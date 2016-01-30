<?php

class Deal extends CActiveRecord {

    public function tableName() {
        return 'deal';
    }

    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('product_id, deal_price, status', 'required'),
            array('product_id, deal_price, status', 'numerical', 'integerOnly' => true),
            array('date_added, date_modified, date_expire', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('deal_id, product_id, deal_price, date_added, date_modified, date_expire, status', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'product' => array(self::BELONGS_TO, 'Product', 'product_id'),
        );
    }

    public function formatStatus() {
        if ($this->status == 1)
            return "On";
        else
            return "Off";
    }

    public function attributeLabels() {
        return array(
            'deal_id' => 'Deal',
            'product_id' => 'Product',
            'deal_price' => 'Deal Price',
            'date_added' => 'Date Added',
            'date_modified' => 'Date Modified',
            'date_expire' => 'Date Expire',
            'status' => 'Status',
        );
    }

    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('deal_id', $this->deal_id);
        $criteria->compare('product_id', $this->product_id);
        $criteria->compare('deal_price', $this->deal_price);
        $criteria->compare('date_added', $this->date_added, true);
        $criteria->compare('date_modified', $this->date_modified, true);
        $criteria->compare('date_expire', $this->date_expire, true);
        $criteria->compare('status', $this->status);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}

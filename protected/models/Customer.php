<?php

class Customer extends CActiveRecord {

    //untuk membuat compare password
    public $comparePassword;

    /* digunakan untuk meng-engkrip password dengan md5 */

    protected function beforeSave() {
        if (parent::beforeSave()) {
            $this->customer_password = $this->encrypt($this->customer_password);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /* membuat fungsi untuk engkrip data */

    public function encrypt($value) {
        return md5($value);
    }

    public function formatGender() {
        if ($this->customer_gender == 1)
            return "Male";
        else if
            ($this->customer_gender == 2)
            return "Female";
        else
            return "Not Set";
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'customer';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('customer_name, customer_dob, customer_telephone, customer_email, customer_password', 'required'),
            array('customer_gender', 'numerical', 'integerOnly' => true),
            array('customer_name, customer_password', 'length', 'max' => 64),
            array('customer_telephone', 'length', 'max' => 20),
            array('customer_email', 'length', 'max' => 255),
            array('comparePassword', 'compare', 'compareAttribute' => 'customer_password'),
            array('customer_id, customer_name, customer_dob, customer_gender, customer_telephone, customer_email, customer_password', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
            'addressBooks' => array(self::HAS_MANY, 'AddressBook', 'customer_id'),
            'orders' => array(self::HAS_MANY, 'Order', 'customer_id'),
            'comments' => array(self::HAS_MANY, 'Comment', 'customer_id'),
            'supportTickets' => array(self::HAS_MANY, 'SupportTicket', 'customer_id'),
        );
    }

    public function attributeLabels() {
        return array(
            'customer_id' => 'Customer',
            'customer_name' => 'Customer Name',
            'customer_dob' => 'Customer Dob',
            'customer_gender' => 'Customer Gender',
            'customer_telephone' => 'Customer Telephone',
            'customer_email' => 'Customer Email',
            'customer_password' => 'Customer Password',
            'comparePassword' => 'Confirm Password',
        );
    }

    public function search() {

        $criteria = new CDbCriteria;

        $criteria->compare('customer_id', $this->customer_id);
        $criteria->compare('customer_name', $this->customer_name, true);
        $criteria->compare('customer_dob', $this->customer_dob, true);
        $criteria->compare('customer_gender', $this->customer_gender);
        $criteria->compare('customer_telephone', $this->customer_telephone, true);
        $criteria->compare('customer_email', $this->customer_email, true);
        $criteria->compare('customer_password', $this->customer_password, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}

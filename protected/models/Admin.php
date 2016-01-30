<?php

class Admin extends CActiveRecord {

    /**
     * Fungsi untuk mengenkripsi password sebelum disimpan
     */
    protected function beforeSave() {
        if (parent::beforeSave()) {
            $this->password = $this->encrypt($this->password);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * Fungsi untuk enkripsi password dengan enkripsi md5
     */
    public function encrypt($value) {
        return md5($value);
    }

    /**
     * Memilih tabel yang akan digunakan
     */
    public function tableName() {
        return 'admin';
    }

    /**
     * Menentukan rule dari tiap attribute
     */
    public function rules() {
        return array(
            array('admin_email, username, password, rule', 'required'),
            array('admin_email, username', 'length', 'max' => 255),
            array('password', 'length', 'max' => 64),
            array('rule', 'length', 'max' => 25),
            array('last_login_time', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('admin_id, admin_email, username, password, rule, last_login_time', 'safe', 'on' => 'search'),
        );
    }

    /**
     * Menentukan array untuk attribute
     * 
     */
    public function attributeLabels() {
        return array(
            'admin_id' => 'Admin',
            'admin_email' => 'Admin Email',
            'username' => 'Username',
            'password' => 'Password',
            'rule' => 'Rule',
            'last_login_time' => 'Last Login Time',
        );
    }

    public function search() {

        $criteria = new CDbCriteria;

        $criteria->compare('admin_id', $this->admin_id);
        $criteria->compare('admin_email', $this->admin_email, true);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('rule', $this->rule, true);
        $criteria->compare('last_login_time', $this->last_login_time, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}

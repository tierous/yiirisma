<?php

class SupportTicket extends CActiveRecord {

    public function supportCode() {
        /* buat karakter yang akan di random */
        $RANDCODE = "023456789";
        /* untuk mengacak kode */
        srand((double) microtime() * 1000000);
        $i = 0;
        $generateCode = '';
        /* lopping sebanyak 5kali */
        while ($i <= 7) {
            /* kode random */
            $num = rand() % 7;
            /* ambil karaktar dari $RANDCODE dengan posisi nya 
             * diacak oleh $num */
            $tmp = substr($RANDCODE, $num, 1);
            /* hasil generate kode ditampung ke $generateCode */
            $generateCode = $generateCode . $tmp;
            $i++;
        }
        /* kembalikan nilai function ke $generateCode */
        return strtoupper($generateCode);
    }
    
    public function tableName() {
        return 'support_ticket';
    }

    public function rules() {
        return array(
            array('support_ticket_code, customer_id, question', 'required'),
            array('customer_id', 'numerical', 'integerOnly' => true),
            array('support_ticket_code', 'length', 'max' => 17),
            array('issue', 'length', 'max' => 64),
            array('answer', 'length', 'max'=>255),
            array('date_added, date_modified', 'safe'),
            array('support_ticket_id, support_ticket_code, customer_id, issue, question, answer, date_added, date_modified', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
            'customer' => array(self::BELONGS_TO, 'Customer', 'customer_id'),
        );
    }

    public function attributeLabels() {
        return array(
            'support_ticket_id' => 'Support Ticket',
            'support_ticket_code' => 'Support Ticket Code',
            'customer_id' => 'Customer',
            'issue' => 'Issue',
            'question' => 'Question',
            'answer' => 'Answer',
            'date_added' => 'Date Added',
            'date_modified' => 'Date Modified',
        );
    }

    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('support_ticket_id', $this->support_ticket_id);
        $criteria->compare('support_ticket_code', $this->support_ticket_code, true);
        $criteria->compare('customer_id', $this->customer_id);
        $criteria->compare('issue', $this->issue, true);
        $criteria->compare('question', $this->question, true);
        $criteria->compare('answer', $this->answer, true);
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

<?php

class EcommController extends Controller {
    /* function untuk init atau sejenis constructor
     * yang berguna untuk membuat session yang berisi kode unit
     * yang digunakan untuk kode pada shopping cart */

    public function init() {
        /* jika session cart_code tidak didefinisikan maka
         * jalankan cart_code nya */
        if (!isset(Yii::app()->session['cart_code'])) {
            /* membuat session dengan nama 'cart_code' dan 
             * diberi nilai berupa unik kode */
            Yii::app()->session['cart_code'] = $this->getUniqueCode();
        }
    }

    /* function untuk generate random kode */

    public function randomCode() {
        /* buat karakter yang akan di random */
        $RANDCODE = "abcdefghijkmnopqrstuvwxyz023456789";

        /* untuk mengacak kode */
        srand((double) microtime() * 1000000);
        $i = 0;
        $generateCode = '';
        /* lopping sebanyak 7kali */
        while ($i <= 7) {
            /* kode random */
            $num = rand() % 34;
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

    /* function untuk generate random kode */

    public function rerandomCode() {
        /* buat karakter yang akan di random */
        $RANDCODE = "023456789abcdefghijkmnopqrstuvwxyz";
        /* untuk mengacak kode */
        srand((double) microtime() * 1000000);
        $i = 0;
        $generateCode = '';
        /* lopping sebanyak 7kali */
        while ($i <= 7) {
            /* kode random */
            $num = rand() % 34;
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

    /* untuk generate order code */

    public function orderCode() {
        /* buat karakter yang akan di random */
        $RANDCODE = "023456789";
        /* untuk mengacak kode */
        srand((double) microtime() * 1000000);
        $i = 0;
        $generateCode = '';
        /* lopping sebanyak 5kali */
        while ($i <= 5) {
            /* kode random */
            $num = rand() % 5;
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

    /* untuk menggabungkan kode unik yang telah kita buat */

    public function getUniqueCode() {
        /* kemalikan nilai $this -> randomCode() dan $this -> rerandomCode()
         * yang telah kita buat pada function diatas */
        return $this->randomCode() . '-' . $this->rerandomCode();
    }

}

<?php

class AdminController extends Controller {

    public $layout = '//layouts/column2';

    /* action Index admin */

    public function actionIndex() {
        if (isset(Yii::app()->user->adminLogin) == TRUE) {
            $this->redirect(Yii::app()->user->returnUrl);
        }
        /* panggil model AdminLoginForm
         * dan di tampung oleh $model */
        $this->layout = 'login';
        $model = new AdminLoginForm;

        // jika ajax maka divalidasi dengan ajax
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            /* tampilkan hasil validasi form */
            echo CActiveForm::validate($model);
            /* end/exit/die */
            Yii::app()->end();
        }

        // ambil data yang diinput oleh user
        if (isset($_POST['AdminLoginForm'])) {
            $model->attributes = $_POST['AdminLoginForm'];
            /* validaasi data yang diinput oleh user dan
             * jika valid maka ...
             */
            if ($model->validate() && $model->login()) {
                /* redirect ke halaman yang diinginkan
                 * */
                $this->redirect(Yii::app()->user->returnUrl);
            }
        }
        // tampilkan login form
        $this->render('index', array('model' => $model));
    }

    /**
     * Log out, dan akan didirect ke halaman homepage.
     */
    public function actionLogout() {
        /* logout user */
        Yii::app()->user->logout();
        /* direct ke halaman yang diinginkan */
        $this->redirect(array('/admin'));
    }

}

?>
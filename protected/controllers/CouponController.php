<?php

class CouponController extends Controller {

    public $layout = '//layouts/column2';

    public function actionView($id) {
        IsAuth::Admin();
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function actionCreate() {
        IsAuth::Admin();
        $model = new Coupon;

        if (isset($_POST['Coupon'])) {
            $model->date_added = new CDbExpression('NOW()');
            $model->attributes = $_POST['Coupon'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->coupon_id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionUpdate($id) {
        IsAuth::Admin();
        $model = $this->loadModel($id);

        if (isset($_POST['Coupon'])) {
            $model->date_modified = new CDbExpression('NOW()');
            $model->attributes = $_POST['Coupon'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->coupon_id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionDelete($id) {
        IsAuth::Admin();
        $this->loadModel($id)->delete();

        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    public function actionIndex() {
        IsAuth::Admin();
        $dataProvider = new CActiveDataProvider('Coupon');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionAdmin() {
        IsAuth::Admin();
        $model = new Coupon('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Coupon']))
            $model->attributes = $_GET['Coupon'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function loadModel($id) {
        $model = Coupon::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'coupon-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}

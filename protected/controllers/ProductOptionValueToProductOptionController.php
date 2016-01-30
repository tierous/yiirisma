<?php

class ProductOptionValueToProductOptionController extends Controller {

    public $layout = '//layouts/column2';

    public function actionView($id) {
        IsAuth::Admin();
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function actionCreate() {
        IsAuth::Admin();
        $model = new ProductOptionValueToProductOption;

        if (isset($_POST['ProductOptionValueToProductOption'])) {
            $model->attributes = $_POST['ProductOptionValueToProductOption'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->product_option_value_to_product_option_id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionUpdate($id) {
        IsAuth::Admin();
        $model = $this->loadModel($id);

        if (isset($_POST['ProductOptionValueToProductOption'])) {
            $model->attributes = $_POST['ProductOptionValueToProductOption'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->product_option_value_to_product_option_id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionDelete($id) {
        IsAuth::Admin();
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    public function actionIndex() {
        IsAuth::Admin();
        $dataProvider = new CActiveDataProvider('ProductOptionValueToProductOption');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionAdmin() {
        IsAuth::Admin();
        $model = new ProductOptionValueToProductOption('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['ProductOptionValueToProductOption']))
            $model->attributes = $_GET['ProductOptionValueToProductOption'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function loadModel($id) {
        $model = ProductOptionValueToProductOption::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'product-option-value-to-product-option-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}

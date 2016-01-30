<?php

class ProductAttributeController extends Controller {

    public $layout = '//layouts/column2';

    public function actionView($id) {
        IsAuth::Admin();
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function actionCreate() {
        IsAuth::Admin();
        $model = new ProductAttribute;

        if (isset($_POST['ProductAttribute'])) {
            $model->attributes = $_POST['ProductAttribute'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->product_attribute_id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionUpdate($id) {
        IsAuth::Admin();
        $model = $this->loadModel($id);

        if (isset($_POST['ProductAttribute'])) {
            $model->attributes = $_POST['ProductAttribute'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->product_attribute_id));
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
        $dataProvider = new CActiveDataProvider('ProductAttribute');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionAdmin() {
        IsAuth::Admin();
        $model = new ProductAttribute('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['ProductAttribute']))
            $model->attributes = $_GET['ProductAttribute'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function loadModel($id) {
        $model = ProductAttribute::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'product-attribute-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}

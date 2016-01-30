<?php

class CategoryController extends Controller {

    public $layout = '//layouts/column2';

    public function actionView($id) {
        IsAuth::Admin();
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function actionCreate() {
        IsAuth::Admin();
        $model = new Category;

        if (isset($_POST['Category'])) {
            $model->attributes = $_POST['Category'];
            $model->date_added = new CDbExpression('NOW()');
            $model->date_modified = new CDbExpression('NULL');
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->category_id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionUpdate($id) {
        IsAuth::Admin();
        $model = $this->loadModel($id);

        if (isset($_POST['Category'])) {
            $model->attributes = $_POST['Category'];
            $model->date_modified = new CDbExpression('NOW()');
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->category_id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionDelete($id) {
        IsAuth::Admin();
        if (Yii::app()->request->isPostRequest) {
            $this->loadModel($id)->delete();
            if (!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            }
        } else {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
    }

    public function actionIndex() {
        IsAuth::Admin();
        $dataProvider = new CActiveDataProvider('Category');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionAdmin() {
        IsAuth::Admin();
        $model = new Category('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Category']))
            $model->attributes = $_GET['Category'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function loadModel($id) {
        $model = Category::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'category-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}

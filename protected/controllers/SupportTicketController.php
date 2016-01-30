<?php

class SupportTicketController extends Controller {

    public $layout = '//layouts/column2';

    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function actionCreate() {
        $model = new SupportTicket;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['SupportTicket'])) {
            $model->attributes = $_POST['SupportTicket'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->support_ticket_id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionUpdate($id) {
        IsAuth::Admin();
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        $model->date_modified=new CDbExpression('NOW()');
        if (isset($_POST['SupportTicket'])) {
            $model->attributes = $_POST['SupportTicket'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->support_ticket_id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('SupportTicket');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionAdmin() {
        $model = new SupportTicket('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['SupportTicket']))
            $model->attributes = $_GET['SupportTicket'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function loadModel($id) {
        $model = SupportTicket::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'support-ticket-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}

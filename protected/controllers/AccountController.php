<?php

class AccountController extends Controller {

    public $layout = '//layouts/store';

    public function filters() {
        return array('accessControl', // perform access control for CRUD operations
        );
    }

    public function actionIndex() {
        if (!isset(Yii::app()->user->customerLogin)) {
            $model = new CustomerLoginForm;
            // jika ajax maka divalidasi dengan ajax
            if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
                /* tampilkan hasil validasi form */
                echo CActiveForm::validate($model);
                /* end/exit/die */
                Yii::app()->end();
            }

            // ambil data yang diinput oleh user
            if (isset($_POST['CustomerLoginForm'])) {
                $model->attributes = $_POST['CustomerLoginForm'];
                /* validaasi data yang diinput oleh user dan
                 * jika valid maka ...
                 */
                if ($model->validate() && $model->login()) {
                    /* redirect ke halaman yang diinginkan
                     * */
                    $this->redirect(array('/'));
                }
            }
            $this->render("login", array('model' => $model));
        }
        else {
            $this->render("index");
        }
    }

    /**
     * Log out, dan akan didirect ke halaman homepage.
     */
    public function actionLogout() {
        /* logout user */
        Yii::app()->user->clearStates();
        /* direct ke halaman yang diinginkan */
        $this->redirect(array('/'));
    }

    public function actionRegister() {
        $model = new Customer;
        if (isset($_POST['Customer'])) {
            $model->attributes = $_POST['Customer'];
            if ($model->save()) {
                $this->redirect(array('account/'));
            }
        }
        $this->render('register', array("model" => $model));
    }

    public function actionChangepassword() {
        /* untuk cek apakah user telah login atau belum */
        IsAuth::Customer();
        /* findbyPK data user yang login */
        $model = CustomerChangePassword::model()->findByPk(Yii::app()->user->customerId);
        /* jika POST maka
         * ubahpassword */
        if (isset($_POST['CustomerChangePassword'])) {
            $model->setAttributes($_POST['CustomerChangePassword']);
            $model->customer_password = $_POST['CustomerChangePassword']['newPassword'];
            /* jika changepassword maka direct ke halaman success */
            if ($model->save()) {
                $this->redirect(array('changepasswordsuccess'));
            }
        }
        /* render ke view ubah password */
        $this->render('changepassword', array('model' => $model));
    }

    public function actionChangepasswordsuccess() {
        /* untuk cek apakah user telah login atau belum */
        IsAuth::Customer();
        /* untuk setflash berhasil ubah password */
        Yii::app()->user->setFlash('success', 'Password has been changed with new password');
        /* render ke file view */
        $this->render('changePasswordSuccess');
    }

    public function actionInfo() {
        IsAuth::Customer();
        $this->render('info');
    }

    /* untuk address book pelanggan */

    public function actionAddressbook() {
        /* cek user login */
        IsAuth::Customer();
        /* jika add data address book */
        if (isset($_GET['add'])) {
            $model = new AddressBook;
            /* jika post addressbook */
            if (isset($_POST['AddressBook'])) {
                /* set attributes address book */
                $model->attributes = $_POST['AddressBook'];
                /* ambil customer id */
                $model->customer_id = Yii::app()->user->customerId;
                /* ambil address nama */
                $addressName = $_POST['AddressBook']['entry_name'];
                /* jika berhasil menyimpan data */
                if ($model->save()) {
                    /* buat setflash */
                    Yii::app()->user->setFlash('success', 'New Address with name <b>' . $addressName . '</b> successfully added');
                    /* direct ke halaman addressbook awal */
                    $this->redirect(array('account/addressbook'));
                }
            }
            /* render ke view form add addressbook dengan nama(add_addressbook.php) */
            $this->render('add_addressbook', array('model' => $model,));
            return;
        }
        /* jika edit address book */
        if (isset($_GET['edit'])) {
            /* ambil data addressbook berdasarkan pk */
            $model = AddressBook::model()->findByPk($_GET['edit']);
            /* jika post Address */
            if (isset($_POST['AddressBook'])) {
                /* ambil nilai attributes nya */
                $model->attributes = $_POST['AddressBook'];
                /* ambil customer id */
                $model->customer_id = Yii::app()->user->customerId;
                /* ambil address name */
                $addressName = $_POST['AddressBook']['entry_name'];
                /* jika berhasil menyimpan data */
                if ($model->save()) {
                    /* buat Setflash */
                    Yii::app()->user->setFlash('success', 'Address book with name <b>' . $addressName . '</b>  has been changed');
                    /* direct ke halaman address book awal */
                    $this->redirect(array('account/addressbook'));
                }
            }
            /* render ke view form edit address book dengan nama(add_addressbook.php) */
            $this->render('add_addressbook', array('model' => $model,));
            return;
        }

        /* untuk menampilkan list data address book */
        $model = AddressBook::model()->findAll('customer_id=:customer_id', array(':customer_id' => Yii::app()->user->customerId));
        /* render ke view addressbook */
        $this->render('addressbook', array('model' => $model,));
    }

    public function actionOrders($id = '') {
        IsAuth::Customer();
        /* untuk konfirmasi pembayaran */
        if (isset($_GET['confirm'])) {
            /* panggil model Confirmpayment */
            $model = new ConfirmPayment;
            /* jika data Confirmpayment dikirim dengan method POST */
            if (isset($_POST['ConfirmPayment'])) {
                /* set value field */
                $order_code = $_POST['ConfirmPayment']['nomerPemesanan'];
                $model->attributes = $_POST['ConfirmPayment'];
                $model->order_code = $_POST['ConfirmPayment']['nomerPemesanan'];
                $model->text_detail .= $_POST['ConfirmPayment']['bankAsal'] . '#';
                $model->text_detail .= $_POST['ConfirmPayment']['pemilikRekAsal'] . '#';
                $model->text_detail .= $_POST['ConfirmPayment']['bankTujuan'] . '#';
                $model->text_detail .=$_POST['ConfirmPayment']['nominalTransfer'];
                /* jika data confirmpayment disimpan */
                if ($model->save()) {
                    /* find data order by attributes berdasarkan order code */
                    $modelOrder = Order::model()->findByAttributes(array('order_code' => $order_code));
                    /* set field payment_status menjadi 1 
                     * yg artinya telah pembayaran telah dikonfirmasi */
                    $modelOrder->payment_status = 1;
                    /* simpan perubahan */
                    $modelOrder->save();
                    /* setFlash untuk informasi sukses konfirmasi pesanan */
                    Yii::app()->user->setFlash('success', "Your order with order code #" . $order_code . " has been confirmed...");
                    /* direct ke halaman orders */
                    $this->redirect(array('orders'));
                    return;
                }
            }
            /* render ke file account/confirmasi_payment */
            $this->render('confirm_payment', array('model' => $model));
            return;
        }

        /* untuk halaman list data pesanan */
        if (empty($id)) {
            /* panggil model Order dan function search */
            $model = new Order('search');
            // hapus default values pada attributes
            $model->unsetAttributes();
            $model->customer_id = Yii::app()->user->customerId;
            /* jika data order dikirim view get */
            if (isset($_GET['Order'])) {
                /* set attributes untuk pencarian */
                $model->attributes = $_GET['Order'];
            }
            /* render ke file account/list_orders */
            $this->render('list_orders', array('model' => $model,));
            return;
        }

        /* untuk detail order */
        if (!empty($id)) {
            /* join query untuk mendapatkan detail order */
            $dataOrderDetail = Yii::app()->db->createCommand()
                    ->select('order.*,orderdetail.*,product.*')
                    ->from('order')
                    ->join('orderdetail', 'orderdetail.order_id = order.order_id')
                    ->join('product', 'product.product_id = orderdetail.product_id')
                    ->where('order.order_id=:order_id', array(':order_id' => $id))
                    ->queryAll();
            /* join query untuk mendapatkan data order 
             * dan customer/pelanggan */
            $dataOrder = Yii::app()->db->createCommand()
                    ->select('order.*,customer.customer_name')
                    ->from('order')
                    ->join('customer', 'order.customer_id = customer.customer_id')
                    ->where('order.order_id=:order_id', array(':order_id' => $id))
                    ->queryRow();
            /* render ke file account/detail_order */
            $this->render('detail_order', array(
                'dataOrder' => $dataOrder,
                'orderDetail' => $dataOrderDetail,
                'subtotal' => '',
                'grandtotal' => '',
                    )
            );
            return;
        }
    }

    public function actionSupports() {
        $model = new SupportTicket('search');
        $model->unsetAttributes();  // clear any default values
        $model->customer_id = Yii::app()->user->customerId;
        if (isset($_GET['Support']))
            $model->attributes = $_GET['Support'];

        $this->render('list_supports', array(
            'model' => $model,
        ));
    }

    public function actionCreatesupport() {
        $model = new SupportTicket;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        $model->support_ticket_code = $model->supportCode();
        $model->customer_id = Yii::app()->user->customerId;
        $model->date_added = new CDbExpression('NOW()');
        if (isset($_POST['SupportTicket'])) {
            $model->attributes = $_POST['SupportTicket'];
            if ($model->save())
                $this->redirect(array('supports'));
        }

        $this->render('create_support', array(
            'model' => $model,
        ));
    }

    public function actionDetailsupport($id = '') {

        $dataSupport = Yii::app()->db->createCommand()
                ->select('support_ticket.*,customer.customer_name')
                ->from('support_ticket')
                ->join('customer', 'support_ticket.customer_id = customer.customer_id')
                ->where('support_ticket.support_ticket_id=:support_ticket_id', array(':support_ticket_id' => $id))
                ->queryRow();
        /* render ke file account/detail_order */
        $this->render('detail_support', array(
            'dataSupport' => $dataSupport,
                )
        );
    }

    public function actionAdmin() {
        IsAuth::Admin();
        $model = new Customer('search');
        $model->unsetAttributes();
        // clear any default values
        if (isset($_GET['Customer']))
            $model->attributes = $_GET['Customer'];

        $this->render('admin', array('model' => $model,));
    }

    public function loadModel($id) {
        $model = Customer::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'customer-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}

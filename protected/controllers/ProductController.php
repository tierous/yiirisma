<?php

class ProductController extends EcommController {

    public $layout = '//layouts/column2'; //set layout
    const URLUPLOAD = '/../img/products/'; //set path save gambar

    public function actionReview($id) { //aksi untuk detail product
        IsAuth::Admin();
        $this->render('review', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function actionCreate() { //fungsi untuk create product
        IsAuth::Admin();
        $model = new Product; //panggil model product
        /* jika data dikirim */
        if (isset($_POST['Product'])) {
            /* cek file gambar produk */
            $checkfile = $model->product_image = CUploadedFile::getInstance($model, 'product_image');
            /* set attributes product */
            $model->attributes = $_POST['Product'];
            /* ambil value nama gambar */
            $model->product_image = CUploadedFile::getInstance($model, 'product_image');
            /* set attributes dengan tanngal sekarang */
            $model->date_added = new CDbExpression('NOW()');
            /* set attributes dengan null */
            $model->date_modified = new CDbExpression('NULL');
            /* jika data product disimpan */
            if ($model->save()) {
                /* cek jika file ada */
                if (!empty($checkfile)) {
                    /* set value field product_image dengan nama gambar
                     * lalu diupload ke folder images/products */
                    $model->product_image->saveAs(Yii::app()->basePath . self::URLUPLOAD . $model->product_image . '');
                    /* copy file ke folder images/products/thumbs */
                    copy(Yii::app()->basePath . self::URLUPLOAD . $model->product_image, Yii::app()->basePath . self::URLUPLOAD . 'thumbs/' . $model->product_image);
                    /* ambil file yang akan dibuat thumbnail */
                    $name = getcwd() . '/images/products/thumbs/' . $model->product_image;
                    /* panggil component image */
                    $image = Yii::app()->image->load($name);
                    /* resize ukuran gambar */
                    $image->resize(93, 0);
                    /* simpan thumb image gambar ke images/products/thumbs */
                    $image->save();
                }
                /* direct ke halaman product/review dengan membawa data attribut id product */
                $this->redirect(array('review', 'id' => $model->product_id));
            }
        }
        /* tampilkan form create product */
        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionUpdate($id) { // fungsi untuk update product
        IsAuth::Admin();
        /* find product by pk */
        $model = $this->loadModel($id);
        /* ambil gambar */
        $image = $model->product_image;
        /* jika data perubahan dikirim */
        if (isset($_POST['Product'])) {
            /* cek file  gambar */
            $checkfile = $model->product_image = CUploadedFile::getInstance($model, 'product_image');
            /* jika file tidak ada */
            if (empty($checkfile)) {
                /* set value attributes */
                $model->attributes = $_POST['Product'];
                /* set image dari file yang sudah ada */
                $model->product_image = $image;
                /* simpan perubahan data */
                if ($model->save()) {
                    /* direct ke product/review */
                    $this->redirect(array('review', 'id' => $model->id));
                }
            } else { /* jika file ada */
                /* set value attributes */
                $model->attributes = $_POST['Product'];
                /* ambil value dari nama gambar */
                $model->product_image = CUploadedFile::getInstance($model, 'product_image');
                /* jika perubahan data disimpan */
                if ($model->save()) {
                    /* set value field product_image dengan nama gambar
                     * dan upload gambar ke folder images/products */
                    $model->product_image->saveAs(Yii::app()->basePath . '/../images/products/' . $model->product_image . '');
                    /* copy file yang barusan diupload ke path image/products/thumbs */
                    copy(Yii::app()->basePath . self::URLUPLOAD . $model->product_image, Yii::app()->basePath . self::URLUPLOAD . 'thumbs/' . $model->product_image);
                    /* ambil filenya */
                    $name = getcwd() . '/images/products/thumbs/' . $model->product_image;
                    /* panggil component image dengan param $image */
                    $image = Yii::app()->image->load($name);
                    /* resize gambar untuk dijadikan thumbnail */
                    $image->resize(93, 0);
                    /* simpan gambar hasil resize ke path images/products/thumbs */
                    $image->save();
                    /* redirect ke halaman product/review */
                    $this->redirect(array('review', 'id' => $model->product_id));
                }
            }
        }
        /* render form update product */
        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionDelete($id) { //fungsi untuk delete product
        IsAuth::Admin();
        if (Yii::app()->request->isPostRequest) {
            // delete product
            $this->loadModel($id)->delete();
            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    public function actionIndex() {
        /* gunakan layout store */
        $this->layout = 'shop';
        /* order by id desc */
        $criteria = new CDbCriteria(array('order' => 'product_id DESC',));
        /* count data product */
        $count = Product::model()->count($criteria);
        /* panggil class paging */
        $pages = new CPagination($count);
        /* elements per page */
        $pages->pageSize = 8;
        /* terapkan limit page */
        $pages->applyLimit($criteria);

        /* select data product
         * cache(1000) digunakan untuk cache data,
         * 1000=10menit */
        $models = Product::model()->cache(1000)->findAll($criteria);
        $dealModel = Deal::model()->findByAttributes(array('status'=>"1",));   
        
        /* render ke halaman index di views/product
         * dengan membawa data pada $models dan data pada $pages
         */
        $this->render('index', array('models' => $models, 'pages' => $pages, 'deal'=>$dealModel,));
    }

    /**
     * Manage all models.
     */
    public function actionAdmin() {

        IsAuth::Admin();

        $model = new Product('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Product']))
            $model->attributes = $_GET['Product'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionView($id) {
        /* gunakan layout store */
        $this->layout = 'store';
        /* select data berdasarkan primaryKey.
         * cache(1000) untuk men cache data, 1000 = 10 menit
         * */
        //$product = $this->loadModel($id);
        $model = Product::model()->cache(1000)->findByPk($id);
        $comment = $this->createComment($model);
        
        /* jika data tidak ada akan dilempar ke 404 */
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }

        /* render ke file view.php dengan membawa
         * data yang ditampung $model */
        $this->render('view', array('data' => $model, 'comment' => $comment,));
    }

    public function actionCategory($id) {
        /* gunakan layout store */
        $this->layout = "store";

        /* menyatakan criteria bahwa
         * select data akan difilter berdasarkan
         * categori_id dan diorder berdasarkan
         * id DESC */
        $criteria = new CDbCriteria(array('condition' => 'category_id=' . $id, 'order' => 'product_id DESC',));

        /* hitung jumlah data produk */
        $count = Product::model()->count($criteria);

        /* panggil class paging */
        $pages = new CPagination($count);

        /* tentukan jumlah nomer paging/page */
        $pages->pageSize = 8;

        /* terapkan limit page dan criteria */
        $pages->applyLimit($criteria);

        /* select data produk berdasarkan criteria tertentu
         * dan cache(1000) untuk men cache data
         * dan 1000=10 menit */
        $models = Product::model()->cache(1000)->findAll($criteria);
        //,'category_id=:category_id', array(':category_id'=>$id)

        /* render ke file view category.php
         * dengan membawa data dari $models, dan $pages */
        $this->render('category', array('models' => $models, 'pages' => $pages,));
    }

    /* untuk menambahkan product ke keranjang belanja */

    public function actionAddtocart($id) {
        /* gunakan layout store */
        $this->layout = 'store';
        /* panggil model Cart */
        $model = new Cart;
        /* set data ke masing masing field */
        /* product_id */
        $_POST['Cart']['product_id'] = $id;
        /* qty */
        $_POST['Cart']['quantity'] = 1;
        /* cart_code */
        $_POST['Cart']['cart_code'] = Yii::app()->session['cart_code'];
        /* set ke attribut2 */
        $model->attributes = $_POST['Cart'];

        /* update qty-nya jika produk sudah ada di dalam keranjang belanja
         * menjadi +1 */
        if ($this->addQuantity($id, Yii::app()->session['cart_code'], 1)) {
            /* direct ke halaman cart */
            $this->redirect(array('cart/'));
            /* add ke keranjang belanja jika produk belum ada di keranjang */
        } elseif ($model->save()) {
            /* direct ke halaman cart */
            $this->redirect(array('cart/'));
        } else {
            /* produk tidak ada di dalam data product kasih error 404 */
            throw new CHttpException(404, 'The requested id invalid.');
        }
    }

    /* function untuk update QTY produk di keranjang belanja */

    private function addQuantity($product_id, $cart_code = '', $quantity = '') {
        /* model Cart findBy attributes product_id dan cart_code */
        $modelCart = Cart::model()->findByAttributes(array('product_id' => $product_id, 'cart_code' => $cart_code));
        /* jika ada didalam keranjang belanja */
        if (count($modelCart) > 0) {
            /* maka update qty nya */
            $modelCart->quantity += $quantity;
            /* simpan dan return true */
            $modelCart->save();
            return TRUE;
        } else {
            /* lain dari itu return false */
            return FALSE;
        }
    }

    /**
     * Adds a comment to this Product
     */
    public function addComment($comment) {
        $comment->product_id = (int)$this->id;
        return $comment->save();
    }

    /**
     * Creates a new comment on a product
     */
    protected function createComment($model) {
        $comment = new Comment;        
        if (isset($_POST['Comment'])) {
            $comment->attributes = $_POST['Comment'];                       
            if ($this->addComment($comment)) {
                Yii::app()->user->setFlash('commentSubmitted', "Your comment has
been added.");
                $this->refresh();
            }
        }
        return $comment;       
    }

    /* untuk search produk */

    public function actionSearch() {
        /* gunakan layout store */
        $this->layout = 'store';
        if (isset($_POST['Search'])) {
            $keyword = $_POST['Search']['keyword'];
            $category = $_POST['Search']['category'];
            //$this->redirect(array('product/search','c'=>$category,'key'=>$key));
            //$criteria = new CDbCriteria( array('order' => 'id DESC', ));
            if ($category == 'all-categories' && empty($keyword)) {
                $this->redirect(array('product/'));
            }
            if ($category != 'all-categories' && empty($keyword)) {
                $criteria = new CDbCriteria(array('order' => 'id DESC', 'condition' => 'category_id=' . $category . ''));
            }
            if ($category == 'all-categories' && !empty($keyword)) {
                $criteria = new CDbCriteria(array('order' => 'id DESC', 'condition' => 'product_name like"%' . trim($keyword) . '%"',));
            }
            if ($category != 'all-categories' && !empty($keyword)) {
                $criteria = new CDbCriteria(array('order' => 'id DESC', 'condition' => 'category_id=' . $category . ' AND product_name like"%' . trim($keyword) . '%"',));
            }

            /* count data product */
            $count = Product::model()->count($criteria);
            /* panggil class paging */
            $pages = new CPagination($count);
            /* elements per page */
            $pages->pageSize = 8;
            /* terapkan limit page */
            $pages->applyLimit($criteria);

            /* select data product
             * cache(1000) digunakan untuk men cache data,
             * 1000 = 10menit */
            $models = Product::model()->cache(1000)->findAll($criteria);

            /* render ke file index yang ada di views/product
             * dengan membawa data pada $models dan
             * data pada $pages
             * */
            $this->render('index', array('models' => $models, 'pages' => $pages,));
        } else {
            $this->redirect(array('product/'));
        }
    }

    public function loadModel($id) {
        $model = Product::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'product-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}

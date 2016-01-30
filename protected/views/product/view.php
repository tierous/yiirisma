<?php
/* untuk membuat breadcrumbs */
$this->breadcrumbs = array('Products' => array('index'), $data->product_name,);
?>

<div style="padding-right: 10px ;margin-left:5px;margin-bottom:15px;border:1px solid #CCC; margin-right: 5px; margin-top: 5px; text-align: justify; padding-top: 15px;">
    <a href="<?php echo Yii::app()->request->baseUrl . '/images/products/' . $data->product_image; ?>">
        <?php
        /* menampilkan gambar */
        echo CHtml::image(Yii::app()->request->baseUrl . '/images/products/' . $data->product_image . '', '', array("style" => "width:200px;margin-left:10px;", "class" => "left", 'hspace' => 12));
        ?>
    </a>
    <h3 style="float: left;">
        <?php echo $data->product_name; ?>
    </h3>
    <br><br>
    <p>
        <b>Price:</b> 
        <b>IDR <?php echo $data->product_price; ?></b>
    <p><?php echo $data->product_description; ?></p>                              
    <p class="readmore" style="float: right; margin-right:11px; height:15px; width:100px; background:#dcebf1; text-align:center;  margin-top: 110px;  ">
        <b>
            <?php
            /* membuat link update bagi admin yang login
             * dan mengakses store */
            if (!Yii::app()->user->isGuest && !isset(Yii::app()->user->customerLogin)) {
                echo CHtml::link(CHtml::encode("Update"), array('update', 'id' => $data->product_id));
            }
            ?>
        </b>
        &nbsp;&nbsp;		
        <b>
            <!--link beli/add to cart-->
            <?php echo CHtml::link(CHtml::encode("BELI"), array('addtocart', 'id' => $data->product_id, 'p' => $data->product_name)); ?>
        </b>
        &nbsp;&nbsp;
    </p>
    <div class="clear"></div>
    <br>
    </p>
</div>

<div id="comments">
    <?php if ($data->commentCount >= 1): ?>
        <h3>
            <?php echo $data->commentCount > 1 ? $data->commentCount . '
comments' : 'One comment'; ?>
        </h3>
        <?php
        $this->renderPartial('_comments', array(
            'comments' => $data->comments,
        ));
        ?>
    <?php endif; ?>
    <h3>Leave a Comment</h3>
        <?php if (Yii::app()->user->hasFlash('commentSubmitted')): ?>
        <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('commentSubmitted'); ?>
        </div>
    <?php else: ?>
        <?php
        $this->renderPartial('/comment/_form', array(
            'model' => $comment,
        ));
        ?>
<?php endif; ?>
</div>
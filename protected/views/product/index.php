<?php
/*digunakan untuk membuat breadcrumbs*/
$this -> breadcrumbs = array('Products', );
?>
<?php
$i=1;
/*foreach data product yang di bawa $models*/
foreach($models as $data):
	/*membuat nama class css rightbox/leftbox
	 *jika hasil mod 2 dari i 0 maka $class = rightbox
	 *selain itu $class = leftbox*/
	 if($i%2==0){$class="rightbox";}else{$class="leftbox";}
?>

<div style="height:170px; text-align:justify; padding-right: 3px ;margin-left:5px;margin-bottom:5px;border:1px solid #CCC;" class="<?php echo $class; //tempilkan class css?>">
	<div style="height: 130px;">
		<h3 style="float: left; margin-right: 15px; padding-right:12px; ">
			<?php echo $data -> product_name; ?>
		</h3><!--width:93px;clear:left;-->
		<?php 
			/*untuk menampilkan gambar*/
			echo CHtml::image(Yii::app() -> request -> baseUrl . '/images/products/thumbs/' . $data -> product_image . '', '', array("style" => "margin-left:0px;padding:10px;clear:left;", "class" => "left", )); 
		?>
		<br><br>
		<p>
			<b>Price:</b> 
			<b>IDR <?php echo $data -> product_price; ?></b>                        
                        <p>
                            <b>Deal Price: IDR <?php echo $deal->deal_price;?></b>
                        </p>
			<p style="margin-left: 15px;"><?php echo substr($data -> product_description, 0, 100); ?></p>
			<div class="clear"></div>
			<div style="position:; margin-top: 50px;">
				&nbsp;
			</div>
			<br>   
	</div>
	<p class="readmore" style="float: right; position:; margin-right:11px; margin-bottom: 5px; margin-top: 0px;">
		<?php
		/*untuk membuat link update jika user login is admin*/
		if (!Yii::app() -> user -> isGuest && !isset(Yii::app()->user->customerLogin)) {
			echo CHtml::link(CHtml::encode("Update"), array('update', 'id' => $data -> product_id));
		}
		?>
		<!--membuat link add to cart-->
		&nbsp;&nbsp;
		<?php echo CHtml::link(CHtml::encode("Beli"), array('addtocart', 'id' => $data -> product_id, 'p'=>$data->product_name)); ?>
		<!--membuat link detail product-->
		&nbsp;&nbsp;
		<?php echo CHtml::link(CHtml::encode("Detail"), array('view', 'id' => $data -> product_id, 'p'=>$data->product_name)); ?>
	</p>
</div>

<?php $i++; endforeach;?>
<!--untuk paging-->
<div style="float: right; margin-top: 5px; margin-bottom: 7px; margin-right: 18px;clear: both;">
<?php $this->widget('CLinkPager', array(
   'pages' => $pages,
   //'cssFile'=>Yii::app()->request->baseUrl.'/css/pager2.css',
   'header'=> '',
   'firstPageLabel'=>'| <',
   'lastPageLabel'=>'> |',
   'nextPageLabel'=>'>',
   'prevPageLabel'=>'<',
   'maxButtonCount'=>5,
))?></div>
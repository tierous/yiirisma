<?php foreach($models as $data):?>

	<div class="col-md-3 col-sm-6">
	    <div class="single-shop-product">
	        <div class="product-upper">
	            <img src="<?php echo Yii::app() -> request -> baseUrl . '/img/products/thumbs/' . $data -> product_image . '', ''?>" alt="">
	        </div>
	        <h2><?php echo CHtml::link($data-> product_name, array('view', 'id' => $data -> product_id, 'p'=>$data->product_name)); ?></h2>
	        <div class="product-carousel-price">
	        	<del><b>IDR <?php echo $data -> product_price;?></b></del><br>
	            <ins><b>IDR <?php echo $deal -> deal_price; ?></b></ins>
	        </div>  
	        
	        <div class="product-option-shop">
	        	<?php echo CHtml::link(CHtml::encode("Add to Cart"), array('addtocart', 'id' => $data -> product_id, 'p'=>$data->product_name,)); ?>
	            <!-- <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/canvas/shop/?add-to-cart=70">Add to cart</a> -->
	        </div>                       
	    </div>
	</div>

<?php endforeach;?>
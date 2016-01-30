<style>
	/*css ini untuk mengcustom tampilan datagridview*/
	.grid-view{
		margin-left:5px !important;
	}
	.summary{display:none !important;}
	.grid-view table.items [id*="order-grid"]{
		background: #be0f0f !important;
	}
	.grid-view table.items tr.odd{background: #f7d0d0 !important;}
	.grid-view table.items tr.even{background: #faeaea !important;}
	.grid-view table.items tr > td > a{
		text-decoration: none;
		color:black;	 
	}
	.grid-view table.items tr > td > a:hover{
		text-decoration: underline;
		color:#745151;	 
	}
</style>
<?php
/*untuk membuat breadcrumbs*/
$this -> breadcrumbs = array('My account' => array('.'), Yii::app() -> user -> customerName, 'My Orders');
?>
<hr>
<div style="margin: 0 0 0 5px;;">
	<?php $this -> renderPartial('_myaccount_menu'); ?>
</div>
<?php
foreach (Yii::app()->user->getFlashes() as $key => $message) {
	echo "<div style='margin:5px 5px 0 5px;' class='flash-" . $key . "'>" . $message . "</div>";
}
?>
<div style="padding:5px 10px 0 0;margin:5px 5px 15px 5px; border:1px solid #CCC;text-align: justify;">
	<strong style="margin-left:4px;float:left;padding: 0 0 15px 0;">Your Order History</strong>
<div style="clear: left;"></div>
<?php
	/*buat code jquery untk search data order*/
	Yii::app() -> clientScript -> registerScript('search', "
		/*jika search form disumbit*/ 
		$('.search-form form').submit(function(){
			/*update order-grid*/	
			$.fn.yiiGridView.update('order-grid', {
			/*set data form menjadi serialize*/	
			data: $(this).serialize()
			});
		return false;
		});
	");
?>
	<!--form search--> 
	<div class="search-form" style="margin-left: 5px;">
		<?php $form = $this -> beginWidget('CActiveForm', 
		    array('action' => Yii::app() -> createUrl($this -> route), 'method' => 'get', )); ?>
			<?php echo $form -> textField($model, 'order_code',array('placeholder'=>'find by order code','size'=>30)); ?>
		<?php echo CHtml::submitButton('Search'); ?>
		<?php $this -> endWidget(); ?>
	</div>
	<!--/form search--> 
	<div style="clear: left;"></div>
	<?php $this -> widget('zii.widgets.grid.CGridView', array('id' => 'order-grid',
		'dataProvider' => $model -> search(),
		'summaryText'=>'',
		//'filter'=>$model,
		'columns' => array(
			'order_id', 
			array(
				'name'=>'order_code',
				'header'=>'Order Code',
				'type'=>'html',
				'value'=>'CHtml::link("$data->order_code", array("orders", "id"=>$data->order_id),array("title"=>"click to view order"))',
				 
			), 
			'order_date', 
			'bank_transfer',
			)
		)
	);
	?>
	<div style="clear: both;">
		&nbsp;
	</div>
</div>

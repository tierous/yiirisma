<style>
	.grid-view {
		margin-left: 5px !important;
	}
	.summary {
		display: none !important;
	}
	.grid-view table {
		width: 100%;
	}
	.grid-view table th {
		color: #ffffff;
		padding: 3px 3px
	}
	.grid-view table td {
		padding: 3px 3px
	}
	.grid-view table.items [id*="order-grid"] {
		background: #be0f0f !important;
	}
	.grid-view table.items tr.odd {
		background: #f7d0d0 !important;
	}
	.grid-view table.items tr.even {
		background: #faeaea !important;
	}
	.grid-view table.items tr > td > a {
		text-decoration: none;
		color: black;
	}
	.grid-view table.items tr > td > a:hover {
		text-decoration: underline;
		color: #745151;
	}
</style>
<?php
/*untuk membuat breadcrumbs*/
$this -> breadcrumbs = array('My account' => array('.'), Yii::app() -> user -> customerName, 'Pesanan saya');
?>
<hr>
<div style="margin: 0 0 0 5px;;">
	<?php $this -> renderPartial('_myaccount_menu'); ?>
</div>
<div style="padding:5px 10px 0 0;margin:5px 5px 15px 5px; border:1px solid #CCC;text-align: justify;">
	<strong style="margin-left:4px;float:left;padding: 0 0 15px 0;">
		Hallo 
		<font color="green" style="text-transform: uppercase;"><?php echo $dataOrder['customer_name']; ?>,</font>
		<br>berikut data order anda dengan 
		Nomor Pemesanan <font color="green"><?php echo $dataOrder['order_code']; ?></font></strong>
		<!--untuk informasi sudah dikonfirmasi atau belum-->
		<div style="float: right; margin:12px 0 0 0;">
			<?php
			if($dataOrder['payment_status']==0){
			?>
			<!--link untuk konfirmasi pembayaran-->
			<a title="click to confirm payment" href="<?php echo $this->createUrl('account/orders',array('confirm'=>$dataOrder['order_code']));?>" style="text-decoration: none;">Konfirmasi pembayaran</a>
			<?php }else{ ?>
			<span style="color:green;">Pembayaran telah dikonfirmasi</span>
			<?php } ?>	
		</div>
 		<!--/untuk informasi sudah dikonfirmasi atau belum-->
 <div style="clear: left;"></div>
	<!--data pemesan-->
	<table>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><?php echo $dataOrder['customer_name']; ?></td>
		</tr>
		<tr>
			<td>Nomor Pemesanan</td>
			<td>:</td>
			<td><?php echo $dataOrder['order_code']; ?></td>
		</tr>
		
		<tr>
			<td>Tanggal Order</td>
			<td>:</td>
			<td><?php echo date('d F Y', strtotime($dataOrder['order_date'])); ?></td>
		</tr>
		<tr>
			<td>Bank Transfer</td>
			<td>:</td>
			<td><?php echo $dataOrder['bank_transfer']; ?></td>
		</tr>
	</table>	 
	<!--/data pemesan-->

	<div style="clear: both;">
		&nbsp;
	</div>
	<!--data detail order-->
	<div id="order-grid" class="grid-view">
		<table class="items">
			<thead>
				<tr>
					<th id="order-grid">No.</th>
					<th id="order-grid">Nama Produk</th>
					<th id="order-grid">Harga</th>
					<th id="order-grid">Jumlah</th>
					<th id="order-grid">Sub Total</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach($orderDetail as $key=>$detail):
				$class = ($key+1)%(2) ==0 ? 'even' : 'odd';
				$subtotal = $detail['product_price']*$detail['quantity'];
				$grandtotal +=$subtotal; 
				?>
				<tr class="<?php echo $class; ?>">
					<td><?php echo $key + 1; ?></td>
					<td><?php echo $detail['product_name']; ?></td>					
                                        <td align="right"><?php echo $detail['product_price']; ?></td> 
					<td align="center"><?php echo $detail['quantity']; ?></td>					
                                        <td align="right"><?php echo $subtotal; ?></td>
				</tr>
				<?php endforeach; ?>
				<tr>
					<td colspan="4" align="right">Grand Total :</td>					
                                        <td align="right">IDR <?php echo $grandtotal ;?></td>
				</tr>
			</tbody>
		</table>
	</div>
	<!--/data detail order-->
</div>

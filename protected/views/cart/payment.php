<?php
/*untuk membuat breadcrumbs*/
$this -> breadcrumbs = array('Cart' => array('.'), Yii::app() -> user -> customerName => array('account/'), 'Payment');
?>
<div style="padding:5px 10px 0 0;margin:5px 5px 15px 5px; border:1px solid #CCC;text-align: justify;">
	<!--open form-->
	<form action="" method="post">
		<strong style="float: left;margin-left: 5px;">Silahkan gunakan bank transfer : </strong>
		<div style="clear: left;"></div>

		<!-- buat pilihan bank transfer-->
		<div style="padding:5px 0 15px 0;float: left;margin:5px 0 0 5px;border:solid 1px #CCC;width:100%;">
			<table width="100%" height="66">
				<tr>
					<td>
					<input type="radio" checked="checked" name="Transfer[bank]" value="BCA 0989-455-344 a.n Kuuga">
					BCA 0989-455-344 a.n Kuuga</td>
				</tr>
				<tr>
					<td>
					<input type="radio" name="Transfer[bank]" value="MANDIRI 9999-9877-009 a.n Kuuga">
					MANDIRI 9999-9877-009 a.n Kuuga</td>
				</tr>
				<tr>
					<td>
					<input type="radio" name="Transfer[bank]" value="BRI 77090-8898-989 a.n Kuuga">
					BRI 77090-8898-989 a.n Kuuga</td>
				</tr>
			</table>
		</div>
		<!-- /buat pilihan bank transfer-->

		 
		<p style="float: right;margin-right: 5px;clear: left;">
			<input type="submit" value="Konfirmasi Pemesanan" />
		</p>
	</form>
	<div style="clear: both;"></div>
</div>
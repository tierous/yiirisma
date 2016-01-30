<?php
/*untuk membuat breadcrumbs*/
$this -> breadcrumbs = array('My account' => array('.'), Yii::app()->user->customerName,'Account Information');
?>
<hr>
<div style="margin: 0 0 0 5px;;">
	<?php $this->renderPartial('_myaccount_menu');?>
</div>
<div style="padding:5px 10px 0 0;margin:5px 5px 15px 5px; border:1px solid #CCC;text-align: justify;">
	<strong style="margin-left:4px;">Your Account</strong>
	<table>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><?php echo Yii::app()->user->customerName;?></td>
		</tr>
		<tr>
			<td>Email</td>
			<td>:</td>
			<td><?php echo Yii::app()->user->customerEmail;?></td>
		</tr>
	</table>	

</div>	
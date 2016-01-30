<?php
/*untuk membuat breadcrumbs*/
$this -> breadcrumbs = array('My account' => array('.'), Yii::app()->user->customerName,'Address Book');
?>
<hr>
<div style="margin: 0 0 0 5px;;">
	<!--untuk merender file menu untuk my account-->
	<?php $this->renderPartial('_myaccount_menu');?>
</div>
<?php
	/*untuk menampilkan setflash*/
	foreach(Yii::app()->user->getFlashes() as $key=>$message){
		echo "<div style='margin:5px 5px 0 5px;' class='flash-".$key."'>".$message."</div>";
	}
?>
<div style="padding:5px 10px 0 0;margin:5px 5px 15px 5px; border:1px solid #CCC;text-align: justify;">
	<strong style="margin-left:4px;float:left;">Your Address Book</strong> 
	<div style="clear:left;margin:0 5px 0 5px;text-align: right">
		<a href="<?php echo $this->createUrl('account/addressbook',array('add'=>'addressbook'));?>">Add New Address</a>
	</div>
	<?php 
		/*foreach data alamat dan ditampilkan*/
		$i=1;foreach($model as $address):
		/*untuk membuat class css buat clear left*/
		($i%3===0) ? $div ='<div style="clear:left;"></div>':$div='';
	?>
	<div style="float: left;margin:5px 0 0 5px;border:solid 1px #CCC;">
		<table width="166" height="100">
			<tr>
				<td valign="top">Nama</td>
				<td valign="top">:</td>
				<td valign="top"><?php echo $address->entry_name;?></td>
			</tr>			
			<tr>
				<td valign="top">Alamat</td>
				<td valign="top">:</td>
				<td valign="top"><?php echo $address->entry_address;?></td>
			</tr>                        
			<tr>
				<td valign="top">Provinsi</td>
				<td valign="top">:</td>
				<td valign="top"><?php echo $address->entry_province_id;?></td>
			</tr>
			<tr>
				<td valign="top">Kota</td>
				<td valign="top">:</td>
				<td valign="top"><?php echo $address->entry_city_id;?></td>
			</tr>
			<tr>
				 
				<td colspan="3" align="right">
					<!--membuat link untuk update data alamat-->
					<a href="<?php echo $this->createUrl('account/addressbook',array('edit'=>$address->address_book_id));?>">Edit Alamat</a>
				</td>
			</tr>
		</table>
	</div>
	<?php 
	echo $div;
	$i++;
	endforeach;
	?>
	<div style="clear: both;">&nbsp;</div> 
</div>	
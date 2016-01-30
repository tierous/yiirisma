<?php
/*untuk membuat breadcrumbs*/
$this -> breadcrumbs = array('My account', );
?>
<div style="border-top:1px solid #CCC;margin: 5px 0 0 5px;"></div>
<div style="height:auto; text-align:justify; padding-right: 3px ;margin-left:5px;margin-bottom:5px;" class="leftbox">

	<h3 style="float: left; margin-right: 15px; padding-right:12px;margin-bottom:20px;"> Silahkan login, jika anda sudah memiliki account </h3>

	<div style="margin-left: 15px;clear: both;">
		<?php
		$this -> renderPartial('_formLogin', array('model' => $model));
		?>
	</div>

</div>
<div style="height:220px; text-align:justify; padding-right: 3px ;margin-left:5px;margin-bottom:5px;border-left:1px solid #CCC;" class="rightbox">

	<h3 style="float: left; margin-right: 15px; padding-right:12px;margin-bottom:50px; "> Create account, if you dont have one </h3>

	<div style="margin-left: 15px;text-align:center;clear: both;">
		<a href="<?php echo $this->createUrl('account/register');?>">
			<button style="cursor:pointer">
				Register
			</button>
		</a>
	</div>

</div>

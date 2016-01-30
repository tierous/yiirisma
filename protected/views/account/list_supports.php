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
/* untuk membuat breadcrumbs */
$this->breadcrumbs = array('My account' => array('.'), Yii::app()->user->customerName, 'Support Ticket');
?>
<hr>
<div style="margin: 0 0 0 5px;;">
    <?php $this->renderPartial('_myaccount_menu'); ?>
</div>
<?php
foreach (Yii::app()->user->getFlashes() as $key => $message) {
    echo "<div style='margin:5px 5px 0 5px;' class='flash-" . $key . "'>" . $message . "</div>";
}
?>
<div style="padding:5px 10px 0 0;margin:5px 5px 15px 5px; border:1px solid #CCC;text-align: justify;">
    <strong style="margin-left:4px;float:left;padding: 0 0 15px 0;">Your Support Ticket</strong>
    <div style="clear: left;"></div>
    <div style="clear: left;"></div>
    <div>
        <?php echo CHtml::link('Create Support Ticket', array('account/createsupport')); ?>
    </div>
    <?php
    $this->widget('zii.widgets.grid.CGridView', array('id' => 'order-grid',
        'dataProvider' => $model->search(),
        'summaryText' => '',
        //'filter'=>$model,
        'columns' => array(
            array(
                'name' => 'support_ticket_code',
                'header' => 'Support Code',
                'type' => 'html',
                'value' => 'CHtml::link("$data->support_ticket_code", array("detailsupport", "id"=>$data->support_ticket_id),array("title"=>"click to view support"))',
            ),
            'issue',
            'question',
            'date_added',
        )
            )
    );
    ?>
    <div style="clear: both;">
        &nbsp;
    </div>
</div>

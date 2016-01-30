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
/* untuk membuat breadcrumbs */
$this->breadcrumbs = array('My account' => array('.'), Yii::app()->user->customerName, 'Support Ticket');
?>
<hr>
<div style="margin: 0 0 0 5px;;">
    <?php $this->renderPartial('_myaccount_menu'); ?>
</div>
<div style="padding:5px 10px 0 0;margin:5px 5px 15px 5px; border:1px solid #CCC;text-align: justify;">
    <strong style="margin-left:4px;float:left;padding: 0 0 15px 0;">
        Hallo 
        <font color="green" style="text-transform: uppercase;"><?php echo $dataSupport['customer_name']; ?>,</font>
        <br>Berikut data support ticket anda dengan 
        Support Code <font color="green"><?php echo $dataSupport['support_ticket_code']; ?></font></strong>		
    <div style="clear: left;"></div>
    <!--data pemesan-->
    <table>
        <tr>
            <td>Issue</td>
            <td>:</td>
            <td><?php echo $dataSupport['issue']; ?></td>
        </tr>

        <tr>
            <td>Date Created</td>
            <td>:</td>
            <td><?php echo date('d F Y', strtotime($dataSupport['date_added'])); ?></td>
        </tr>
        <tr>
            <td>Question</td>
            <td>:</td>
            <td><?php echo $dataSupport['question']; ?></td>
        </tr>


        <tr>
            <td>Answer</td>
            <td>:</td>
            <td><?php echo $dataSupport['answer']; ?></td>
        </tr>
    </table>	 
    <!--/data pemesan-->

    <div style="clear: both;">
        &nbsp;
    </div>
</div>

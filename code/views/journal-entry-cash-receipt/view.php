<style type="text/css">
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        font-size: 90%;
    }
    td, th {
       border: 1px solid #dddddd;
       text-align: center;
       padding: 2px;
    }
</style>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\JournalEntryCashReceipt */

$this->title = $model->journal_receipts_id;
$this->params['breadcrumbs'][] = ['label' => 'Cash Receipts Journal', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="journal-entry-cash-receipt-view">
    <p>DATE: <?php echo $model->date; ?></p>
    <p>JEV No.: <?php echo $model->jev_number;?></p>
    <p>Name of Collecting Offices: <?php echo $model->collecting_offices; ?></p>
    <p></p>    

    <table>
        <tr>
            <td rowspan="4"><b>DATE</b></td>
            <td rowspan="4"><b>JEV No.</b></td>
            <td rowspan="4"><b>Name of Collecting Offices</b></td>
            <td></td>
            <?php
                $collectionSpan=0;
                $span1=0;
                $span2=0;
                $span1=sizeof($detailCollectionDebit);
                $span2=sizeof($detailCollectionCredit);
                $collectionSpan = $span2+$span1;
                echo "<td colspan = \"".$collectionSpan."\"><b>COLLECTIONS</b></td>";
            ?>
            <td></td>
            <?php
                $collectionSpan=0;
                $span1=0;
                $span2=0;
                $span1=sizeof($detailDepositDebit);
                $span2=sizeof($detailDepositCredit);
                $collectionSpan = $span2+$span1;
                echo "<td colspan = \"".$collectionSpan."\"><b>DEPOSITS</b></td>";
            ?>
        </tr>
        <tr>
            <td></td>
            <?php
                echo "<td colspan = \"".sizeof($detailCollectionDebit)."\"><b>DEBIT</b></td>";
            ?>
             <?php
                echo "<td colspan = \"".sizeof($detailCollectionCredit)."\"><b>CREDIT</b></td>";
            ?>
            <td></td>
            <?php
                echo "<td colspan = \"".sizeof($detailDepositDebit)."\"><b>DEBIT</b></td>";
            ?>
             <?php
                echo "<td colspan = \"".sizeof($detailDepositCredit)."\"><b>CREDIT</b></td>";
            ?>
        </tr>
        <tr>
            <td></td>
            <?php
                for($i=0; $i<sizeof($detailCollectionDebit); $i++){
                   echo "<td>" . $detailCollectionDebit[$i]->account_code ."</td>";
                }
            ?>
            <?php
                for($i=0; $i<sizeof($detailCollectionCredit); $i++){
                   echo "<td>" . $detailCollectionCredit[$i]->account_code ."</td>";
                }
            ?>
            <td></td>
             <?php
                for($i=0; $i<sizeof($detailDepositDebit); $i++){
                   echo "<td>" . $detailDepositDebit[$i]->account_code ."</td>";
                }
            ?>
            <?php
                for($i=0; $i<sizeof($detailDepositCredit); $i++){
                   echo "<td>" . $detailDepositCredit[$i]->account_code ."</td>";
                }
            ?>
        </tr>
        <tr>
            <td></td>
            <?php
                for($i=0; $i<sizeof($detailCollectionDebit); $i++){
                   echo "<td>" . $detailCollectionDebit[$i]->account_name ."</td>";
                }
            ?>
            <?php
                for($i=0; $i<sizeof($detailCollectionCredit); $i++){
                   echo "<td>" . $detailCollectionCredit[$i]->account_name ."</td>";
                }
            ?>
            <td></td>
             <?php
                for($i=0; $i<sizeof($detailDepositDebit); $i++){
                   echo "<td>" . $detailDepositDebit[$i]->account_name ."</td>";
                }
            ?>
            <?php
                for($i=0; $i<sizeof($detailDepositCredit); $i++){
                   echo "<td>" . $detailDepositCredit[$i]->account_name ."</td>";
                }
            ?>
        </tr>
        <tr>
            <td><?php echo $model->date;?></td>
            <td><?php echo $model->jev_number;?></td>
            <td><?php echo $model->collecting_offices;?></td>
            <td></td>
            <?php
                for($i=0; $i<sizeof($detailCollectionDebit); $i++){
                   echo "<td>" . $detailCollectionDebit[$i]->amount ."</td>";
                }
            ?>
            <?php
                for($i=0; $i<sizeof($detailCollectionCredit); $i++){
                   echo "<td>" . $detailCollectionCredit[$i]->amount ."</td>";
                }
            ?>
            <td></td>
             <?php
                for($i=0; $i<sizeof($detailDepositDebit); $i++){
                   echo "<td>" . $detailDepositDebit[$i]->amount ."</td>";
                }
            ?>
            <?php
                for($i=0; $i<sizeof($detailDepositCredit); $i++){
                   echo "<td>" . $detailDepositCredit[$i]->amount ."</td>";
                }
            ?>
        </tr>   
    </table>
    

</div>

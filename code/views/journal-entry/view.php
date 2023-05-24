<style type="text/css">
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
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
/* @var $model app\models\JournalEntryCash */

$this->title = $model->journal_id;
//if($journal_type==1) {$title = 'Check Disbursements Journal';} 
//else {$title='Cash Disbursements Journal';}
$this->params['breadcrumbs'][] = ['label' => '', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="journal-entry-cash-view">



    <p>DATE: <?php echo $model->date; ?></p>
    <p>JEV No.: <?php echo $model->jev_number;?></p>
    <p>Payee: <?php echo $model->payee;?></p>
    <p>Particulars: <?php echo $model->particulars;?></p>
    <br>
    <br>

    <table>
        <tr>
            <?php
            echo "<td colspan = \"".sizeof($detailCredit)."\"><b>Credit</b></td>";
            echo "<td colspan = \"".sizeof($detailCredit)."\"><b>Debit</b></td>";
            ?>
        </tr>
        <tr>
            <?php
            for($i=0; $i<sizeof($detailCredit); $i++){
               echo "<td>" . $detailCredit[$i]->account_code ."</td>";
            }
            ?>
             <?php
            for($i=0; $i<sizeof($detailDebit); $i++){
               echo "<td>" . $detailDebit[$i]->account_code ."</td>";
            }
            ?>
        </tr>

        
        <tr>
            <?php
            for($i=0; $i<sizeof($detailCredit); $i++){
               echo "<td>" . $detailCredit[$i]->account_name ."</td>";
            }
            ?>
             <?php
            for($i=0; $i<sizeof($detailDebit); $i++){
               echo "<td>" . $detailDebit[$i]->account_name ."</td>";
            }
            ?>
        </tr>

        <tr>
            <?php
            $totalCredit = 0;
           
            for($i=0; $i<sizeof($detailCredit); $i++){
               echo "<td>" . $detailCredit[$i]->amount ."</td>";
               $totalCredit = $totalCredit + $detailCredit[$i]->amount;
            }
            ?>
             <?php
              $totalDebit = 0;
            for($i=0; $i<sizeof($detailDebit); $i++){
               echo "<td>" . $detailDebit[$i]->amount ."</td>";
               $totalDebit = $totalDebit + $detailDebit[$i]->amount;
            }
            ?>
        </tr>
    </table>
    <br>
    <br>

    <div class= "col-lg-offset-10 col-lg-11">
        <?php if($totalCredit==$totalDebit){?>   
        <?= Html::a('Post Entry', ['post-entry/index', 'id'=>$model->journal_id, 'posted'=>1], ['class' => 'btn btn-success'])?>
        <?php } ?>
    </div>
</div>

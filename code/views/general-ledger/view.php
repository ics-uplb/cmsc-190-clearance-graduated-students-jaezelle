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
use app\models\JournalEntry;

/* @var $this yii\web\View */
/* @var $model app\models\GeneralLedger */

$this->title = $model->ledger_id;
$this->params['breadcrumbs'][] = ['label' => 'General Ledgers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="general-ledger-view">
 
    <p>Account Code: <?php echo $model->account_code; ?> </p>
    <p>Account Name: <?php echo $model->account_name; ?> </p>
    <br>
    <br>

    <table>
        <tr>
            <td rowspan="2">DATE</td>
            <td rowspan="2">PARTICULARS</td>
            <td colspan="3">Amount</td>
        </tr>   
        <tr>
            <td>Debit</td>
            <td>Credit</td>
            <td>Balance</td>
        </tr>
      <!--  <tr>
            <td></td>
            <td>Beginning Balance</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>-->
        <tr>
            <td></td>
            <td>Check Disb. Journal</td>
            <td><?php echo $check_debit; ?> </td>
            <td><?php echo $check_credit; ?> </td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>Cash Disb. Journal</td>
            <td><?php echo $cash_debit; ?> </td>
            <td><?php echo $cash_credit; ?> </td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>Cash Receipt Journal</td>
            <td><?php echo $receipts_debit; ?> </td>
            <td><?php echo $receipts_credit; ?> </td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>General Journal</td>
            <td><?php echo $general_debit; ?> </td>
            <td><?php echo $general_credit; ?> </td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <?php
                $total_credit = 0;
                $total_debit = 0;
                $balance1 = 0;
                $balance2 = 0;
                $balance3 = 0;

                $total_debit = $check_debit+$cash_debit+$receipts_debit+$general_debit;
                $total_credit = $check_credit+$cash_credit+$receipts_credit+$general_credit;
                
                $balance1 = $total_debit-$total_credit;
                $balance2 = $total_credit-$total_debit;
                $balance3 = $total_debit-$total_credit;

                echo "<td>".$total_debit."</td>";
                echo "<td>".$total_credit."</td>";
               // echo "<td>".$model->account_code_type."</td>";
                if($model->account_code_type == 1){
                    echo "<td>".$balance1."</td>";
                }elseif ($model->account_code_type == 2) {
                    # code...
                    echo "<td>".$balance2."</td>";
                }else{
                    echo "<td>".$balance3."</td>";
                }
            ?>
            
            
           
        </tr>
    </table>

</div>

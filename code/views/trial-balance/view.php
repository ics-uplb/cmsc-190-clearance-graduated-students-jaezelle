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
use app\models\GeneralLedger;

/* @var $this yii\web\View */
/* @var $model app\models\TrialBalance */


$this->params['breadcrumbs'][] = ['label' => 'Trial Balance', 'url' => ['view']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trial-balance-view">
   
     <p>
        <?= Html::a('Print Trial Balance', ['print'], [
            'class' => 'btn btn-primary'
        ]) ?>
    </p>
    -
    <center>Republic of the Philippines</center>
    <center>MUNICIPALITY OF ORANI</center>
    <center>Orani, Bataan</center>
    <center><b>TRIAL BALANCE</b></center>
    <br>
    <br>
    <table>
        <tr>
            <td><b>Account Title</b></td>
            <td></td>
            <td><b>Account Code</b></td>
            <td></td>
            <td><b>Debit</b></td>
            <td></td>
            <td><b>Credit</b></td>
        </tr>

       
        <?php
            for($i=0; $i<sizeof($modelTrialBalance);$i++){
                echo "<tr>";
                    $modelAccount = GeneralLedger::find()->where(['ledger_id' => $modelTrialBalance[$i]->ledger_id])->one();
                    echo "<td>".$modelAccount->account_name."</td>";
                    echo "<td></td>";
                    echo "<td>".$modelAccount->account_code."</td>";
                    echo "<td></td>";
                    echo "<td>".$modelTrialBalance[$i]->amount_debit."</td>";
                    echo "<td></td>";
                    echo "<td>".$modelTrialBalance[$i]->amount_credit."</td>";
                echo "</tr>";
            }

        ?>
      
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><b><?php echo $total_debit_amount; ?></b></td>
            <td></td>
            <td><b><?php echo $total_credit_amount; ?></b></td>
        
        </tr>
        
    </table>
    <br>
    <br>
    

</div>

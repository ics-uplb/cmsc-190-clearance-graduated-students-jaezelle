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
/* @var $model app\models\TrialBalance */

$this->title = 'Create Trial Balance';
$this->params['breadcrumbs'][] = ['label' => 'Trial Balance', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trial-balance-create">
	
	<center>Republic of the Philippines</center>
    <center>MUNICIPALITY OF ORANI</center>
    <center>Orani, Bataan</center>
    <center><b>TRIAL BALANCE</b></center>
    <br>
    <br>

    <table>
    	<tr>
	    	<th>Account Titles</th>
	    	<th>Account Code</th>
	    	<th>Debit</th>
	    	<th>Credit</th>
	    </tr>
    </table>

</div>

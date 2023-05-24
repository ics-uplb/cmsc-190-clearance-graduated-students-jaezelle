<style type="text/css">
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        border: none;
    }
    td, th {
       border: 1px solid #dddddd;
       text-align: center;
       padding: 2px;
    }
</style>
<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\GeneralLedger;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FinancialPositionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Financial Position';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="financial-position-index">

    <p>
        <?= Html::a('Print Financial Position', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <center><p>Municipality of Orani</p></center>
    <center><p>Statement of Financial Position</p></center>
    <center><p>As of January 31, 2018</p></center>

    <table>
        <tr>
            <td style="text-align: left;padding-left:50px;"><b>ASSETS</b></td>
             <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="text-align: left;padding-left:80px;"><b>CURRENT ASSETS</b></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="text-align: left;padding-left:100px;">Cash and Cash Equivalents</td>
            <td></td>
            <td></td>
            <td></td>
            <td>AMount</td>
        </tr>
        <tr>
            <td style="text-align: left;padding-left:100px;">Receivables</td>
            <td></td>
            <td></td>
            <td></td>
            <td>AMount</td>
        </tr>
        <tr>
            <td style="text-align: left;padding-left:100px;">Prepayments and Deferred Charges</td>
            <td></td>
            <td></td>
            <td></td>
            <td>AMount</td>
        </tr>
        <tr>
            <td style="text-align: left;padding-left:80px;"><b>Total Current Assets</b></td>
            <td></td>
            <td>some</td>
            <td></td>
            <td>AMount</td>
        </tr>

        <tr>
            <td colspan="5"></td>
        </tr>

        <tr>
            <td style="text-align: left;padding-left:80px;"><b>NON - CURRENT ASSETS</b></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="text-align: left;padding-left:100px;">Receivables</td>
            <td></td>
            <td></td>
            <td></td>
            <td>AMount</td>
        </tr>
        <tr>
            <td style="text-align: left;padding-left:100px;">Property, Plant and Equipment</td>
            <td></td>
            <td></td>
            <td></td>
            <td>AMount</td>
        </tr>
        <tr>
            <td style="text-align: left;padding-left:80px;"><b>Total Non-Current Assets</b></td>
            <td></td>
            <td>some</td>
            <td></td>
            <td>AMount</td>
        </tr>
    </table>
    
</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GeneralLedgerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'General Ledgers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="general-ledger-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'ledger_id',
            'account_code',
            'account_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

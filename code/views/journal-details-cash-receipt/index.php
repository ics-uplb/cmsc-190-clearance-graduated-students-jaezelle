<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JournalDetailsCashReceiptSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Journal Details Cash Receipts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="journal-details-cash-receipt-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Journal Details Cash Receipt', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'details_id',
            'receipts_type',
            'type',
            'account_code',
            'account_name:ntext',
            //'amount',
            //'journal_receipts_id',
            //'ledger_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

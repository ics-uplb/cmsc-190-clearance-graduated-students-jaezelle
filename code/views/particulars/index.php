<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ParticularsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Particulars';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="particulars-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Particulars', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'particular_id',
            'journal_id',
            'date',
            'journal_page',
            'ledger_page',
            // 'account_title:ntext',
            // 'account_code',
            // 'pr:ntext',
            // 'debit',
            // 'credit',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

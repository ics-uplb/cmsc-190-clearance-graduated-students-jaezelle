<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JournalCashDetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Journal Cash Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="journal-cash-details-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Journal Cash Details', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'details_id',
            'type',
            'account_code',
            'account_name:ntext',
            'amount',
            // 'journal_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

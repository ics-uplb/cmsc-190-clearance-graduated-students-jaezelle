<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JournalDetailsGeneralSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Journal Details Generals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="journal-details-general-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Journal Details General', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'details_id',
            'account_name:ntext',
            'account_code',
            'type',
            'amount',
            //'general_journal_id',
            //'ledger_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

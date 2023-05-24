<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BalanceSheetTemplateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Balance Sheet Templates';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="balance-sheet-template-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Balance Sheet Template', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'parent_id',
            'position',
            'type',
            'amt_type',
            // 'is_added',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

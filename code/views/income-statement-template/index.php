<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\IncomeStatementTemplateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Income Statement Templates';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="income-statement-template-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Income Statement Template', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'position',
            'parent_id',
            'type',
            'amt_type',
            // 'is_added',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

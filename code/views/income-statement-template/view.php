<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\IncomeStatementTemplate */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Income Statement Templates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="income-statement-template-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'position',
            'parent_id',
            'type',
            'amt_type',
            'is_added',
        ],
    ]) ?>

</div>

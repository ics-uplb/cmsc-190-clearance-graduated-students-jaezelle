<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FinancialPosition */

$this->title = 'Update Financial Position: ' . $model->financial_position_id;
$this->params['breadcrumbs'][] = ['label' => 'Financial Positions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->financial_position_id, 'url' => ['view', 'id' => $model->financial_position_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="financial-position-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

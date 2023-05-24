<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TrialBalance */

$this->title = 'Update Trial Balance: ' . $model->tb_id;
$this->params['breadcrumbs'][] = ['label' => 'Trial Balances', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tb_id, 'url' => ['view', 'id' => $model->tb_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="trial-balance-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

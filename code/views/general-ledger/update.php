<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GeneralLedger */

$this->title = 'Update General Ledger: ' . $model->ledger_id;
$this->params['breadcrumbs'][] = ['label' => 'General Ledgers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ledger_id, 'url' => ['view', 'id' => $model->ledger_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="general-ledger-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

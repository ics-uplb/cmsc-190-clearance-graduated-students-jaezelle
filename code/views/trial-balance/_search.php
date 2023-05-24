<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TrialBalanceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trial-balance-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'tb_id') ?>

    <?= $form->field($model, 'amount_debit') ?>

    <?= $form->field($model, 'ledger_id') ?>

    <?= $form->field($model, 'amount_credit') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

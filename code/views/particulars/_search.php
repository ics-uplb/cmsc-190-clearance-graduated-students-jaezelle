<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ParticularsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="particulars-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'particular_id') ?>

    <?= $form->field($model, 'journal_id') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'journal_page') ?>

    <?= $form->field($model, 'ledger_page') ?>

    <?php // echo $form->field($model, 'account_title') ?>

    <?php // echo $form->field($model, 'account_code') ?>

    <?php // echo $form->field($model, 'pr') ?>

    <?php // echo $form->field($model, 'debit') ?>

    <?php // echo $form->field($model, 'credit') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

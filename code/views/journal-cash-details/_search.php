<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JournalCashDetailsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="journal-cash-details-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'details_id') ?>

    <?= $form->field($model, 'type') ?>

    <?= $form->field($model, 'account_code') ?>

    <?= $form->field($model, 'account_name') ?>

    <?= $form->field($model, 'amount') ?>

    <?php // echo $form->field($model, 'journal_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

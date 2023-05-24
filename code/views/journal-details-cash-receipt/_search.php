<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JournalDetailsCashReceiptSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="journal-details-cash-receipt-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'details_id') ?>

    <?= $form->field($model, 'receipts_type') ?>

    <?= $form->field($model, 'type') ?>

    <?= $form->field($model, 'account_code') ?>

    <?= $form->field($model, 'account_name') ?>

    <?php // echo $form->field($model, 'amount') ?>

    <?php // echo $form->field($model, 'journal_receipts_id') ?>

    <?php // echo $form->field($model, 'ledger_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

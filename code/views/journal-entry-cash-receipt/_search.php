<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JournalEntryCashReceiptSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="journal-entry-cash-receipt-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'journal_receipts_id') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'jev_number') ?>

    <?= $form->field($model, 'collecting_offices') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JournalDetailsCashReceipt */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="journal-details-cash-receipt-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'receipts_type')->inline(true)->radioList([
        1 => 'collection',
        2 => 'deposit'
    ]) ?>

    <?= $form->field($model, 'type')->inline(true)->radioList([
        1 => 'credit',
        2 => 'debit'
    ]) ?>

    <?= $form->field($model, 'account_code')->textInput() ?>

    <?= $form->field($model, 'account_name')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <div class="form-group">
          <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TrialBalance */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trial-balance-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'amount_debit')->textInput() ?>

    <?= $form->field($model, 'ledger_id')->textInput() ?>

    <?= $form->field($model, 'amount_credit')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

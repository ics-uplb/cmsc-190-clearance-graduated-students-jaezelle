<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JournalCashDetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="journal-cash-details-form">

    <?php $form = ActiveForm::begin('layout' => 'horizontal'); ?>

    <?= $form->field($model, 'details_id')->textInput() ?>

    <?= $form->field($model, 'type')->textInput() ?>

    <?= $form->field($model, 'account_code')->textInput() ?>

    <?= $form->field($model, 'account_name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <?= $form->field($model, 'jev_number')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

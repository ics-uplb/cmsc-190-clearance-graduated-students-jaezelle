<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FinancialPosition */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="financial-position-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ledger_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

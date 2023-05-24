<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Particulars */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="particulars-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'particular_id')->textInput() ?>

    <?= $form->field($model, 'journal_id')->textInput() ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'journal_page')->textInput() ?>

    <?= $form->field($model, 'ledger_page')->textInput() ?>

    <?= $form->field($model, 'account_title')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'account_code')->textInput() ?>

    <?= $form->field($model, 'pr')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'debit')->textInput() ?>

    <?= $form->field($model, 'credit')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

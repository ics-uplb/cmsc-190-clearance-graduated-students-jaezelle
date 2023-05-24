<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JournalEntryCash */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="journal-entry-form" style="margin: 5%; float: center;">

    <?php $form = ActiveForm::begin([
    'layout' => 'horizontal',
    'fieldConfig' => [
        'template' => "{label}\n<div class=\"col-lg-5\">{input}</div>\n<div class=\"col-lg-10\">{error}</div>",
        'labelOptions' => ['class' => 'col-lg-2 control-label'],
    ],

    ]); ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'jev_number')->textInput() ?>

    <?= $form->field($model, 'payee')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'particulars')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'check_number')->textInput() ?>

    <div class="form-group">
        <div class= "col-lg-offset-2 col-lg-11">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

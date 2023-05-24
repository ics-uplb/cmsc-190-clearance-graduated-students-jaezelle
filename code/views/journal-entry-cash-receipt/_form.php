<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JournalEntryCashReceipt */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="journal-entry-cash-receipt-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'jev_number')->textInput() ?>

    <?= $form->field($model, 'collecting_offices')->textarea(['rows' => 3]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

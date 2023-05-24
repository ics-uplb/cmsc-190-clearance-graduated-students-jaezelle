<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JournalEntryCashSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="journal-entry-cash-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'jev_number') ?>

    <?= $form->field($model, 'payee') ?>

    <?= $form->field($model, 'particulars') ?>

    <?= $form->field($model, 'check_number') ?>

    <?php // echo $form->field($model, 'journal_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

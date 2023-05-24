<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\JournalCashDetails */

$this->title = 'Create Journal Cash Details';
$this->params['breadcrumbs'][] = ['label' => 'Journal Cash Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="journal-entry-cash-add">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_add', [
        'model' => $model,
    ]) ?>

</div>

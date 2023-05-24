<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\JournalEntryCashReceipt */

$this->title = 'Create Journal Entry Cash Receipt';
$this->params['breadcrumbs'][] = ['label' => 'Journal Entry Cash Receipts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="journal-entry-cash-receipt-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

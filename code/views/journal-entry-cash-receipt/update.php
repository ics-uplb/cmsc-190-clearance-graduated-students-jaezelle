<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JournalEntryCashReceipt */

$this->title = 'Update Journal Entry Cash Receipt: ' . $model->journal_receipts_id;
$this->params['breadcrumbs'][] = ['label' => 'Journal Entry Cash Receipts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->journal_receipts_id, 'url' => ['view', 'id' => $model->journal_receipts_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="journal-entry-cash-receipt-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

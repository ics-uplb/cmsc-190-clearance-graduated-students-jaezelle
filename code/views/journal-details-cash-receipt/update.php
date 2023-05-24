<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JournalDetailsCashReceipt */

$this->title = 'Update Journal Details Cash Receipt: ' . $model->details_id;
$this->params['breadcrumbs'][] = ['label' => 'Journal Details Cash Receipts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->details_id, 'url' => ['view', 'details_id' => $model->details_id, 'receipts_type' => $model->receipts_type, 'type' => $model->type, 'account_code' => $model->account_code, 'account_name' => $model->account_name, 'amount' => $model->amount]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="journal-details-cash-receipt-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

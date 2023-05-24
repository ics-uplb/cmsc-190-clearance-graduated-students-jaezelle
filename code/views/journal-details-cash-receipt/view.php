<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\JournalDetailsCashReceipt */

$this->title = $model->details_id;
$this->params['breadcrumbs'][] = ['label' => 'Journal Details Cash Receipts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="journal-details-cash-receipt-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'details_id' => $model->details_id, 'receipts_type' => $model->receipts_type, 'type' => $model->type, 'account_code' => $model->account_code, 'account_name' => $model->account_name, 'amount' => $model->amount], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'details_id' => $model->details_id, 'receipts_type' => $model->receipts_type, 'type' => $model->type, 'account_code' => $model->account_code, 'account_name' => $model->account_name, 'amount' => $model->amount], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'details_id',
            'receipts_type',
            'type',
            'account_code',
            'account_name:ntext',
            'amount',
            'journal_receipts_id',
            'ledger_id',
        ],
    ]) ?>

</div>

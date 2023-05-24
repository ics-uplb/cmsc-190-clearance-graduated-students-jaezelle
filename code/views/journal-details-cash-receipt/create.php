<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\JournalDetailsCashReceipt */

$this->title = 'Add Cash Receipt Journal Details';
$this->params['breadcrumbs'][] = ['label' => 'Cash Receipts Journal Details ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="journal-details-cash-receipt-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

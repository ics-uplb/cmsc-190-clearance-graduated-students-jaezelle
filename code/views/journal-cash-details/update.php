<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JournalCashDetails */

$this->title = 'Update Journal Cash Details: ' . $model->details_id;
$this->params['breadcrumbs'][] = ['label' => 'Journal Cash Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->details_id, 'url' => ['view', 'id' => $model->details_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="journal-cash-details-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

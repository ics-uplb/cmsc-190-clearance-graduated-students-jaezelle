<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JournalEntryCash */

$this->title = 'Update Journal Entry Cash: ' . $model->journal_id;
$this->params['breadcrumbs'][] = ['label' => 'Journal Entry Cashes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->journal_id, 'url' => ['view', 'id' => $model->journal_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="journal-entry-cash-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

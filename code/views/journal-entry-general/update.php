<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JournalEntryGeneral */

$this->title = 'Update Journal Entry General: ' . $model->journal_general_id;
$this->params['breadcrumbs'][] = ['label' => 'Journal Entry Generals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->journal_general_id, 'url' => ['view', 'id' => $model->journal_general_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="journal-entry-general-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

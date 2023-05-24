<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\JournalEntryGeneral */

$this->title = 'Create Journal Entry General';
$this->params['breadcrumbs'][] = ['label' => 'Journal Entry Generals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="journal-entry-general-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

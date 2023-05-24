<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\JournalCashDetails */

$this->title = 'Add Journal Details';
$this->params['breadcrumbs'][] = ['label' => 'Journal Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="journal-cash-details-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_add', [
        'model' => $model,
    ]) ?>

</div>

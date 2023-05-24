<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JournalDetailsGeneral */

$this->title = 'Update Journal Details General: ' . $model->details_id;
$this->params['breadcrumbs'][] = ['label' => 'Journal Details Generals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->details_id, 'url' => ['view', 'id' => $model->details_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="journal-details-general-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

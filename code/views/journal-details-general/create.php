<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\JournalDetailsGeneral */

$this->title = 'Add General Journal Details';
$this->params['breadcrumbs'][] = ['label' => 'General Journal Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="journal-details-general-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

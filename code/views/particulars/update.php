<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Particulars */

$this->title = 'Update Particulars: ' . $model->particular_id;
$this->params['breadcrumbs'][] = ['label' => 'Particulars', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->particular_id, 'url' => ['view', 'id' => $model->particular_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="particulars-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Particulars */

$this->title = 'Create Particulars';
$this->params['breadcrumbs'][] = ['label' => 'Particulars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="particulars-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

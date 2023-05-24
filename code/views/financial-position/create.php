<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\FinancialPosition */

$this->title = 'Create Financial Position';
$this->params['breadcrumbs'][] = ['label' => 'Financial Positions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="financial-position-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

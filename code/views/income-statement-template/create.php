<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\IncomeStatementTemplate */

$this->title = 'Create Income Statement Template';
$this->params['breadcrumbs'][] = ['label' => 'Income Statement Templates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="income-statement-template-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

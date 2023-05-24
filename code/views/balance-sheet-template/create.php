<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BalanceSheetTemplate */

$this->title = 'Create Balance Sheet Template';
$this->params['breadcrumbs'][] = ['label' => 'Balance Sheet Templates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="balance-sheet-template-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

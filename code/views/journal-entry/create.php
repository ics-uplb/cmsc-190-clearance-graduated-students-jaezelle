	<?php

use yii\helpers\Html;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model app\models\JournalEntryCash */
//if($journal_type==1) {$label = 'Check Disbursements Journal';} 
//else {$label='Cash Disbursements Journal';}
$title = 'Create Journal';
//$this->title = 'Create Cash Disbursements Journal';
$this->title = $title;
//$this->label = $label;
//$this->params['breadcrumbs'][] = [$label, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
//$this->params['breadcrumbs'][] = $this->label;
?>
<div class="journal-entry-cash-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

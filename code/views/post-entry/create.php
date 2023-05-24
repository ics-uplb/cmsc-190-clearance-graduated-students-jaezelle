<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PostEntry */

$this->title = 'Create Post Entry';
$this->params['breadcrumbs'][] = ['label' => 'Post Entries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-entry-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

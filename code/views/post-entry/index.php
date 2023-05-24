<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PostEntrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Post Entries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-entry-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       'showOnEmpty' => false,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'post_id',
            'journal_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

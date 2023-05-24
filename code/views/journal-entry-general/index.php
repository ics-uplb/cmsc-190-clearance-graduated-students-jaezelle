<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\JournalEntryGeneralSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'General Journal';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="journal-entry-general-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Journal Entry', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'showOnEmpty' => false,
        'rowOptions' => function($model){
            $url = Url::to(['journal-entry-general/view', 'id' => $model['journal_general_id']]);
            return ['onclick' => "window.location.href='{$url}'"];
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'journal_general_id',
            'date',
            'jev_number',

            [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{addButton}',
            'buttons' => [  
                'addButton' => function($url, $model, $key){
                    return Html::a('Add Details', ['journal-details-general/create', 'id'=>$model->journal_general_id], ['class' => 'btn btn-primary']);
                }
            ],
            ],
        ],
    ]); ?>
</div>

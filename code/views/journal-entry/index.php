<style type="text/css">
    .btn{
        margin-bottom: 2%;
    }
</style>
<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\JournalEntrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

if($journal_type==1) {$title = 'Check Disbursements Journal';} 
else {$title='Cash Disbursements Journal';}
$this->title = $title;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="journal-entry-cash-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Journal Entry', ['create', 'journal_type'=>$journal_type], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'showOnEmpty' => false,
        'rowOptions' => function($model){
            $url = Url::to(['journal-entry/view', 'id' => $model['journal_id']]);
            return ['onclick' => "window.location.href='{$url}'"];
        },
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'date',
            'jev_number',
            'payee:ntext',
            'particulars:ntext',
            'check_number',
            
            [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{addButton}{postButton}',
            'buttons' => [  
                'addButton' => function($url, $model, $key){
                    return Html::a('Add Details', ['journal-cash-details/create', 'id'=>$model->journal_id], ['class' => 'btn btn-primary']);
                },
                //'postButton' => function($url, $model, $key){
                //    return Html::a('Post Entry', ['post-entry/index', 'id'=>$model->journal_id, 'posted'=>1], ['class' => 'btn btn-primary']);
                //}
            ],
            
            ],
        ],
    ]); ?>

</div>

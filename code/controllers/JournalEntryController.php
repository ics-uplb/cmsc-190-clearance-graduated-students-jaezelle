<?php

namespace app\controllers;

use Yii;
use app\models\JournalEntry;
use app\models\JournalEntrySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\JournalCashDetails;

/**
 * JournalEntryCashController implements the CRUD actions for JournalEntryCash model.
 */
class JournalEntryController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all JournalEntryCash models.
     * @return mixed
     */
    public function actionIndex($journal_type)
    {
        $this->layout = 'admin';
        
        $searchModel = new JournalEntrySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $journal_type);
        $dataProvider->query->andWhere(['posted'=> null]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'journal_type' => $journal_type,
        ]);
    }

    /**
     * Displays a single JournalEntryCash model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $this->layout = 'admin';
        $model=$this->findModel($id);
        $detailCredit= JournalCashDetails::find()->where(['journal_id' => $id, 'type'=>1])->all();
        $detailDebit= JournalCashDetails::find()->where(['journal_id' => $id, 'type'=>2])->all();

        return $this->render('view', [
            'model' => $model,
            'detailCredit' => $detailCredit,
            'detailDebit' => $detailDebit,
        ]);
    }

    /**
     * Creates a new JournalEntryCash model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($journal_type)
    {
        $this->layout = 'admin';
        $model = new JournalEntry();

        if ($model->load(Yii::$app->request->post())) {
            $model->journal_type = $journal_type;

            $model->save();
            return $this->redirect(['index', 'journal_type' => $journal_type]);
        } else {
            return $this->render('create', [
                'model' => $model,
                
            ]);
        }
    }

    /**
     * Updates an existing JournalEntryCash model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
         $this->layout = 'admin';
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->journal_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionPosts($id)
    {
        $this->layout = 'admin';
        $model = $this->findModel($id);
        $model->posted=1;
        $model->save();
       //$modelPostedJournal = JournalEntry::find()->where([])

        return $this->render('posts', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing JournalEntryCash model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the JournalEntryCash model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return JournalEntryCash the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = JournalEntry::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

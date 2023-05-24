<?php

namespace app\controllers;

use Yii;
use app\models\JournalCashDetails;
use app\models\JournalCashDetailsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\GeneralLedger;
use app\models\JournalEntry;

/**
 * JournalCashDetailsController implements the CRUD actions for JournalCashDetails model.
 */
class JournalCashDetailsController extends Controller
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
     * Lists all JournalCashDetails models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'admin';

        $searchModel = new JournalCashDetailsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single JournalCashDetails model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $this->layout = 'admin';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new JournalCashDetails model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $this->layout = 'admin';
        $model = new JournalCashDetails();
       // $modelJournal = new JournalEntry();
        if ($model->load(Yii::$app->request->post()) ) {
            $model->journal_id = $id;
            $ledger = GeneralLedger::find()->where(['account_code' => trim($model->account_code, " ")])->one();
            $journal = JournalEntry::find()->where(['journal_id' =>$model->journal_id])->one();
            $ledger->active=1;
            $ledger->save();
            $model->ledger_id = $ledger->ledger_id;
            $model->journal_type = $journal->journal_type;       
            $model->save();        
            return $this->redirect(['journal-entry/view', 'id' => $model->journal_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing JournalCashDetails model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $this->layout = 'admin';
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->details_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing JournalCashDetails model.
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
     * Finds the JournalCashDetails model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return JournalCashDetails the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = JournalCashDetails::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

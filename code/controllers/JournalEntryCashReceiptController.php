<?php

namespace app\controllers;

use Yii;
use app\models\JournalEntryCashReceipt;
use app\models\JournalEntryCashReceiptSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\JournalDetailsCashReceipt;

/**
 * JournalEntryCashReceiptController implements the CRUD actions for JournalEntryCashReceipt model.
 */
class JournalEntryCashReceiptController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all JournalEntryCashReceipt models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'admin';
        
        $searchModel = new JournalEntryCashReceiptSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single JournalEntryCashReceipt model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $this->layout = 'admin';
        $model = $this->findModel($id);
        
        //get collections
        $detailCollectionCredit = JournalDetailsCashReceipt::find()->where(['journal_receipts_id'=>$id,'receipts_type'=>1, 'type'=>1])->all();
        $detailCollectionDebit = JournalDetailsCashReceipt::find()->where(['journal_receipts_id'=>$id,'receipts_type'=>1, 'type'=>2])->all();
    
       //get deposits
        $detailDepositCredit = JournalDetailsCashReceipt::find()->where(['journal_receipts_id'=>$id,'receipts_type'=>2, 'type'=>1])->all();
        $detailDepositDebit = JournalDetailsCashReceipt::find()->where(['journal_receipts_id'=>$id,'receipts_type'=>2, 'type'=>2])->all();
        return $this->render('view', [
            'model' => $model,
            'detailDepositDebit' => $detailDepositDebit,
            'detailDepositCredit' => $detailDepositCredit,
            'detailCollectionDebit' => $detailCollectionDebit,
            'detailCollectionCredit' => $detailCollectionCredit,
        ]);
    }

    /**
     * Creates a new JournalEntryCashReceipt model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = 'admin';
        $model = new JournalEntryCashReceipt();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->journal_receipts_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing JournalEntryCashReceipt model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->journal_receipts_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing JournalEntryCashReceipt model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the JournalEntryCashReceipt model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return JournalEntryCashReceipt the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = JournalEntryCashReceipt::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

<?php

namespace app\controllers;

use Yii;
use app\models\GeneralLedger;
use app\models\GeneralLedgerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\JournalCashDetails;
use app\models\JournalEntry;
use app\models\JournalDetailsGeneral;
use app\models\JournalDetailsCashReceipt;

/**
 * GeneralLedgerController implements the CRUD actions for GeneralLedger model.
 */
class GeneralLedgerController extends Controller
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
     * Lists all GeneralLedger models.
     * @return mixed
     */
    public function actionIndex()
    {
         $this->layout = 'admin';

        $searchModel = new GeneralLedgerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GeneralLedger model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $this->layout = 'admin';
        $model = $this->findModel($id);
        $modelLedgerCheck = JournalCashDetails::find()->where(['ledger_id' => $id, 'journal_type'=>1])->all(); //check
        $modelLedgerCash = JournalCashDetails::find()->where(['ledger_id' => $id, 'journal_type'=>2])->all(); //cash
        $modelLedgerGeneral = JournalDetailsGeneral::find()->where(['ledger_id'=>$id])->all(); //general
        $modelLedgerReceipts = JournalDetailsCashReceipt::find()->where(['ledger_id'=>$id])->all(); //cash receipts
        $check_debit = 0;
        $check_credit = 0;
        $cash_credit = 0;
        $cash_debit = 0;
        $receipts_credit = 0;
        $receipts_debit = 0;
        $general_credit = 0;
        $general_debit = 0;

        
        $modelAssetAccount = GeneralLedger::find()->where(['ledger_id' => $id, 'account_code_type'=>1])->all();
        $modelLiabilityAccount = GeneralLedger::find()->where(['ledger_id' => $id, 'account_code_type'=>2])->all();
        $modelExpenseAccount = GeneralLedger::find()->where(['ledger_id' => $id, 'account_code_type'=>3])->all();

        for($i=0; $i<sizeof($modelLedgerCheck);$i++){
            if($modelLedgerCheck[$i]->type == 1){
                $check_credit = $check_credit + $modelLedgerCheck[$i]->amount;
                //$check_debit = $check_debit + $modelLedgerCheck[$i]->amount;
            }else{
                $check_debit = $check_debit + $modelLedgerCheck[$i]->amount;
            }
        }

        for($i=0; $i<sizeof($modelLedgerCash);$i++){
            
            if($modelLedgerCash[$i]->type == 1){
                $cash_credit = $cash_credit + $modelLedgerCash[$i]->amount;
                //$cash_debit = $check_debit + $modelLedgerCash[$i]->amount;
            }else{
                $cash_debit = $cash_debit + $modelLedgerCash[$i]->amount;  
            }
        }

        for($i=0; $i<sizeof($modelLedgerGeneral);$i++){
            
            if($modelLedgerGeneral[$i]->type == 1){
                $general_credit = $general_credit + $modelLedgerGeneral[$i]->amount;
                //$cash_debit = $check_debit + $modelLedgerCash[$i]->amount;
            }else{
                $general_debit = $general_debit + $modelLedgerGeneral[$i]->amount;  
            }
        }

        for($i=0; $i<sizeof($modelLedgerReceipts);$i++){
            
            if($modelLedgerReceipts[$i]->type == 1){
                $receipts_credit = $receipts_credit + $modelLedgerReceipts[$i]->amount;
                //$cash_debit = $check_debit + $modelLedgerCash[$i]->amount;
            }else{
                $receipts_debit = $receipts_debit + $modelLedgerReceipts[$i]->amount;  
            }
        }

        return $this->render('view', [
            'model' => $model,
            'check_credit' => $check_credit,
            'check_debit' => $check_debit,
            'cash_credit' => $cash_credit,
            'cash_debit' => $cash_debit,
            'modelAssetAccount' => $modelAssetAccount,
            'modelLiabilityAccount' => $modelLiabilityAccount,
            'modelExpenseAccount' => $modelExpenseAccount,
            'receipts_credit' => $receipts_credit,
            'receipts_debit' => $receipts_debit,
            'general_credit' => $general_credit,
            'general_debit' => $general_debit,
        ]);
    }

    /**
     * Creates a new GeneralLedger model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
         $this->layout = 'admin';
        $model = new GeneralLedger();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ledger_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing GeneralLedger model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
         $this->layout = 'admin';
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ledger_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing GeneralLedger model.
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
     * Finds the GeneralLedger model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GeneralLedger the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = GeneralLedger::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

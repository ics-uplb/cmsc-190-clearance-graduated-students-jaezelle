<?php

namespace app\controllers;

use Yii;
use app\models\TrialBalance;
use app\models\TrialBalanceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\JournalCashDetails;
use app\models\JournalEntry;
use app\models\GeneralLedger;
use app\models\JournalDetailsGeneral;
use app\models\JournalDetailsCashReceipt;
use kartik\mpdf\Pdf;
/**
 * TrialBalanceController implements the CRUD actions for TrialBalance model.
 */
class TrialBalanceController extends Controller
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
     * Lists all TrialBalance models.
     * @return mixed
     */
    public function actionIndex()
    {
         $this->layout = 'admin';
        $searchModel = new TrialBalanceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TrialBalance model.
     * @param integer $id
     * @return mixed
     */
    public function actionView()
    {
        $this->layout = 'admin';
        //$model = $this->findModel($id);
        $modelGenLedger = GeneralLedger::find()->all();
        for($i=0; $i<sizeof($modelGenLedger); $i++){
            $total_credit = 0;
            $total_debit = 0;
            
            $modelDetailsDebit = JournalCashDetails::find()->where(['ledger_id'=>$modelGenLedger[$i]->ledger_id, 'type' =>2])->all();
            $modelDetailsCredit = JournalCashDetails::find()->where(['ledger_id'=>$modelGenLedger[$i]->ledger_id, 'type'=>1])->all();
            $modelDetailsGeneralCredit = JournalDetailsGeneral::find()->where(['ledger_id'=>$modelGenLedger[$i]->ledger_id, 'type'=>1])->all();
            $modelDetailsGeneralDebit = JournalDetailsGeneral::find()->where(['ledger_id'=>$modelGenLedger[$i]->ledger_id, 'type'=>2])->all();
            $modelDetailsReceiptCredit = JournalDetailsCashReceipt::find()->where(['ledger_id'=>$modelGenLedger[$i]->ledger_id, 'type'=>1])->all();
            $modelDetailsReceiptDebit = JournalDetailsCashReceipt::find()->where(['ledger_id'=>$modelGenLedger[$i]->ledger_id, 'type'=>2])->all();
           
            //credit
            for($j=0; $j<sizeof($modelDetailsCredit); $j++){
                if($modelDetailsCredit[$j]->ledger_id == $modelGenLedger[$i]->ledger_id){
                    $total_credit = $total_credit + $modelDetailsCredit[$j]->amount;
                }
            }
            //debit
            for($k=0; $k<sizeof($modelDetailsDebit); $k++){
                if($modelDetailsDebit[$k]->ledger_id == $modelGenLedger[$i]->ledger_id){
                    $total_debit = $total_debit + $modelDetailsDebit[$k]->amount;
                }
            }
            //general
            //credit
             for($j=0; $j<sizeof($modelDetailsGeneralCredit); $j++){
                if($modelDetailsGeneralCredit[$j]->ledger_id == $modelGenLedger[$i]->ledger_id){
                    $total_credit = $total_credit + $modelDetailsGeneralCredit[$j]->amount;
                }
            }
            //debit
            for($k=0; $k<sizeof($modelDetailsGeneralDebit); $k++){
                if($modelDetailsGeneralDebit[$k]->ledger_id == $modelGenLedger[$i]->ledger_id){
                    $total_debit = $total_debit + $modelDetailsGeneralDebit[$k]->amount;
                }
            }
            //cash receipt
            //credit
            for($j=0; $j<sizeof($modelDetailsReceiptCredit); $j++){
                if($modelDetailsReceiptCredit[$j]->ledger_id == $modelGenLedger[$i]->ledger_id){
                    $total_credit = $total_credit + $modelDetailsReceiptCredit[$j]->amount;
                }
            }
            //debit
            for($k=0; $k<sizeof($modelDetailsReceiptDebit); $k++){
                if($modelDetailsReceiptDebit[$k]->ledger_id == $modelGenLedger[$i]->ledger_id){
                    $total_debit = $total_debit + $modelDetailsReceiptDebit[$k]->amount;
                }
            }

            $modelTrialBalance = TrialBalance::find()->where(['ledger_id' => $modelGenLedger[$i]->ledger_id])->one();
            
            if($modelTrialBalance != null){

                $modelTrialBalance->amount_credit = $total_credit;
                $modelTrialBalance->amount_debit = $total_debit;
                //$modelTrialBalance->active = $modelGenLedger[$i]->active;
                $modelTrialBalance->save();
            }

            $modelTrialBalanceAmount = TrialBalance::find()->all();
            $total_credit_amount=0;
            $total_debit_amount=0;

            for($j; $j<sizeof($modelTrialBalanceAmount);$j++){
                $total_credit_amount = $total_credit_amount + $modelTrialBalanceAmount[$j]->amount_credit;
                $total_debit_amount = $total_debit_amount + $modelTrialBalanceAmount[$j]->amount_debit;               
            }

            
            
           // $modelTrialBalanceAmount-save();
        }   

        $modelTrialBalance = TrialBalance::find()->where(['active'=>1])->all();

        return $this->render('view', [
            'modelTrialBalance' => $modelTrialBalance,
            //'modelTrialBalanceAmount' => TrialBalance::find()->all();
            'total_debit_amount' => $total_debit_amount,
            'total_credit_amount' => $total_credit_amount,
        ]);
    }

    /**
     * Creates a new TrialBalance model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = 'admin';
        $model = new TrialBalance();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->tb_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TrialBalance model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->tb_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionPrint($id){
        $model = $this->findModel($id);
        $pdf = Yii::$app->pdf;

        $pdf->content = $this->renderPartial('print', ['model'=>$model]);

        return $pdf->render();
        
    }
    /**
     * Deletes an existing TrialBalance model.
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
     * Finds the TrialBalance model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TrialBalance the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TrialBalance::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}

<?php

namespace app\controllers;

use Yii;
use app\models\JournalDetailsGeneral;
use app\models\JournalDetailsGeneralSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\GeneralLedger;

/**
 * JournalDetailsGeneralController implements the CRUD actions for JournalDetailsGeneral model.
 */
class JournalDetailsGeneralController extends Controller
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
     * Lists all JournalDetailsGeneral models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'admin';
        $searchModel = new JournalDetailsGeneralSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single JournalDetailsGeneral model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($details_id)
    {
        $this->layout = 'admin';
        return $this->render('view', [
            'model' => $this->findModel($details_id),
        ]);
    }

    /**
     * Creates a new JournalDetailsGeneral model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $this->layout = 'admin';
        $model = new JournalDetailsGeneral();

        if ($model->load(Yii::$app->request->post()) ) {
            $model->journal_general_id = $id;
            $ledger = GeneralLedger::find()->where(['account_code' => trim($model->account_code, " ")])->one();
            $ledger->active = 1;
            $ledger->save();
            $model->ledger_id = $ledger->ledger_id;
            $model->save();
            return $this->redirect(['journal-entry-general/view', 'id' => $model->journal_general_id]);
        }else{
            return $this->render('create', [
                'model' => $model,
            ]);
        }     
    }

    /**
     * Updates an existing JournalDetailsGeneral model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($details_id)
    {
        $this->layout = 'admin';
        $model = $this->findModel($details_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'details_id' => $model->details_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing JournalDetailsGeneral model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($details_id)
    {
        $this->findModel($details_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the JournalDetailsGeneral model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return JournalDetailsGeneral the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($details_id)
    {
        if (($model = JournalDetailsGeneral::findOne($details_id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

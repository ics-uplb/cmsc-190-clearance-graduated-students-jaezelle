<?php

namespace app\controllers;

use Yii;
use app\models\JournalEntryGeneral;
use app\models\JournalEntryGeneralSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\JournalDetailsGeneral;

/**
 * JournalEntryGeneralController implements the CRUD actions for JournalEntryGeneral model.
 */
class JournalEntryGeneralController extends Controller
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
     * Lists all JournalEntryGeneral models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'admin';

        $searchModel = new JournalEntryGeneralSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single JournalEntryGeneral model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $this->layout = 'admin';
        $model = $this->findModel($id);

        //
        $detailGeneralCredit = JournalDetailsGeneral::find()->where(['journal_general_id'=>$id, 'type'=>1])->all();
        $detailGeneralDebit = JournalDetailsGeneral::find()->where(['journal_general_id'=>$id, 'type'=>2])->all();
        $detailGeneral = JournalDetailsGeneral::find()->all();
        //$detailGeneralAccount = JournalEntryGeneral::find()->where(['journal_general_id'=>$id])->all();
        $detailGeneralJevNo = JournalEntryGeneral::find()->all();//get jev_no
        return $this->render('view', [
            'model' => $model,
            'detailGeneralDebit'=> $detailGeneralDebit,
            'detailGeneralCredit'=> $detailGeneralCredit,
            'detailGeneralJevNo'=> $detailGeneralJevNo,
            'detailGeneral'=> $detailGeneral,
        ]);
    }

    /**
     * Creates a new JournalEntryGeneral model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = 'admin';
        $model = new JournalEntryGeneral();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->journal_general_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing JournalEntryGeneral model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $this->layout = 'admin';
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->journal_general_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing JournalEntryGeneral model.
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
     * Finds the JournalEntryGeneral model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return JournalEntryGeneral the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = JournalEntryGeneral::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

<?php

namespace app\controllers;

use Yii;
use app\models\Bs;
use app\models\BsSearch;
use app\models\Device;
use app\models\Antenna;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BsController implements the CRUD actions for Bs model.
 */
class BsController extends Controller
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
     * Lists all Bs models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'deviceList' => $this->getDeviceList(), // массив (ключ=значение) всех девайсов (для фильтра)
            'antennaList'=> $this->getAntennaList() // аналогично для антенн
        ]);
    }

    /**
     * Displays a single Bs model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Bs model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Bs();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'deviceList' => $this->getDeviceList(), // массив (ключ=значение) всех девайсов (для фильтра)
                'antennaList'=> $this->getAntennaList() // аналогично для антенн
            ]);
        }
    }

    /**
     * Updates an existing Bs model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'deviceList' => $this->getDeviceList(),
                'antennaList'=> $this->getAntennaList()
            ]);
        }
    }

    /**
     * Deletes an existing Bs model.
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
     * Finds the Bs model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Bs the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Bs::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    private function getDeviceList() {
        // Получаю список всех девайсов в виде массива ключ = значение для отображения списком фильтра
        $query = Device::find()->all();
        foreach($query as $val) {
            $deviceList[$val->id] = $val->dev;
        }
        return $deviceList;
    }

    private function getAntennaList() {
        // Получаю список всех антенн в виде массива ключ = значение для отображения списком фильтра
        $query = Antenna::find()->all();
        foreach($query as $val) {
            $antennaList[$val->id] = $val->name;
        }
        return $antennaList;
    }
}

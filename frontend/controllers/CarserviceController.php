<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Carservice;
use frontend\models\CarserviceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ArrayDataProvider;

/**
 * CarserviceController implements the CRUD actions for Carservice model.
 */
class CarserviceController extends Controller
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
     * Lists all Carservice models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CarserviceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $sql = "SELECT carname.car_id,
                c.*

                FROM carname
                LEFT JOIN

                (

                SELECT
                carservice.car_id,
                IF(DATE_FORMAT(carservice.date_service_s,'%m-%d-%Y') = DATE_FORMAT(CURRENT_DATE(),'%m-%d-%Y'), GROUP_CONCAT(DATE_FORMAT(carservice.date_service_s,'%k:%i')),'') AS '1',
                IF(DATE_FORMAT(carservice.date_service_s,'%m-%d-%Y') = DATE_FORMAT(DATE_ADD(CURRENT_DATE() ,INTERVAL 1 DAY),'%m-%d-%Y'), GROUP_CONCAT(DATE_FORMAT(carservice.date_service_s,'%k:%i')),'') AS '2',
                IF(DATE_FORMAT(carservice.date_service_s,'%m-%d-%Y') = DATE_FORMAT(DATE_ADD(CURRENT_DATE() ,INTERVAL 2 DAY),'%m-%d-%Y'), GROUP_CONCAT(DATE_FORMAT(carservice.date_service_s,'%k:%i')),'') AS '3',
                IF(DATE_FORMAT(carservice.date_service_s,'%m-%d-%Y') = DATE_FORMAT(DATE_ADD(CURRENT_DATE(),INTERVAL 4 DAY),'%m-%d-%Y'), GROUP_CONCAT(DATE_FORMAT(carservice.date_service_s,'%k:%i')),'') AS '4',
                IF(DATE_FORMAT(carservice.date_service_s,'%m-%d-%Y') = DATE_FORMAT(DATE_ADD(CURRENT_DATE(),INTERVAL 5 DAY),'%m-%d-%Y'), GROUP_CONCAT(DATE_FORMAT(carservice.date_service_s,'%k:%i')),'') AS '5',
                IF(DATE_FORMAT(carservice.date_service_s,'%m-%d-%Y') = DATE_FORMAT(DATE_ADD(CURRENT_DATE(),INTERVAL 6 DAY),'%m-%d-%Y'), GROUP_CONCAT(DATE_FORMAT(carservice.date_service_s,'%k:%i')),'') AS '6',
                IF(DATE_FORMAT(carservice.date_service_s,'%m-%d-%Y') = DATE_FORMAT(DATE_ADD(CURRENT_DATE(),INTERVAL 7 DAY),'%m-%d-%Y'), GROUP_CONCAT(DATE_FORMAT(carservice.date_service_s,'%k:%i')),'') AS '7',
                IF(DATE_FORMAT(carservice.date_service_s,'%m-%d-%Y') = DATE_FORMAT(DATE_ADD(CURRENT_DATE(),INTERVAL 8 DAY),'%m-%d-%Y'), GROUP_CONCAT(DATE_FORMAT(carservice.date_service_s,'%k:%i')),'') AS '8',
                IF(DATE_FORMAT(carservice.date_service_s,'%m-%d-%Y') = DATE_FORMAT(DATE_ADD(CURRENT_DATE(),INTERVAL 9 DAY),'%m-%d-%Y'), GROUP_CONCAT(DATE_FORMAT(carservice.date_service_s,'%k:%i')),'') AS '9',
                IF(DATE_FORMAT(carservice.date_service_s,'%m-%d-%Y') = DATE_FORMAT(DATE_ADD(CURRENT_DATE(),INTERVAL 10 DAY),'%m-%d-%Y'), GROUP_CONCAT(DATE_FORMAT(carservice.date_service_s,'%k:%i')),'') AS '10',
                IF(DATE_FORMAT(carservice.date_service_s,'%m-%d-%Y') = DATE_FORMAT(DATE_ADD(CURRENT_DATE(),INTERVAL 11 DAY),'%m-%d-%Y'), GROUP_CONCAT(DATE_FORMAT(carservice.date_service_s,'%k:%i')),'') AS '11',
                IF(DATE_FORMAT(carservice.date_service_s,'%m-%d-%Y') = DATE_FORMAT(DATE_ADD(CURRENT_DATE(),INTERVAL 12 DAY),'%m-%d-%Y'), GROUP_CONCAT(DATE_FORMAT(carservice.date_service_s,'%k:%i')),'') AS '12',
                IF(DATE_FORMAT(carservice.date_service_s,'%m-%d-%Y') = DATE_FORMAT(DATE_ADD(CURRENT_DATE(),INTERVAL 13 DAY),'%m-%d-%Y'), GROUP_CONCAT(DATE_FORMAT(carservice.date_service_s,'%k:%i')),'') AS '13',
                IF(DATE_FORMAT(carservice.date_service_s,'%m-%d-%Y') = DATE_FORMAT(DATE_ADD(CURRENT_DATE(),INTERVAL 14 DAY),'%m-%d-%Y'), GROUP_CONCAT(DATE_FORMAT(carservice.date_service_s,'%k:%i')),'') AS '14',
                IF(DATE_FORMAT(carservice.date_service_s,'%m-%d-%Y') = DATE_FORMAT(DATE_ADD(CURRENT_DATE(),INTERVAL 15 DAY),'%m-%d-%Y'), GROUP_CONCAT(DATE_FORMAT(carservice.date_service_s,'%k:%i')),'') AS '15',
                IF(DATE_FORMAT(carservice.date_service_s,'%m-%d-%Y') = DATE_FORMAT(DATE_ADD(CURRENT_DATE(),INTERVAL 16 DAY),'%m-%d-%Y'), GROUP_CONCAT(DATE_FORMAT(carservice.date_service_s,'%k:%i')),'') AS '16',
                IF(DATE_FORMAT(carservice.date_service_s,'%m-%d-%Y') = DATE_FORMAT(DATE_ADD(CURRENT_DATE(),INTERVAL 17 DAY),'%m-%d-%Y'), GROUP_CONCAT(DATE_FORMAT(carservice.date_service_s,'%k:%i')),'') AS '17',
                IF(DATE_FORMAT(carservice.date_service_s,'%m-%d-%Y') = DATE_FORMAT(DATE_ADD(CURRENT_DATE(),INTERVAL 18 DAY),'%m-%d-%Y'), GROUP_CONCAT(DATE_FORMAT(carservice.date_service_s,'%k:%i')),'') AS '18',
                IF(DATE_FORMAT(carservice.date_service_s,'%m-%d-%Y') = DATE_FORMAT(DATE_ADD(CURRENT_DATE(),INTERVAL 19 DAY),'%m-%d-%Y'), GROUP_CONCAT(DATE_FORMAT(carservice.date_service_s,'%k:%i')),'') AS '19',
                IF(DATE_FORMAT(carservice.date_service_s,'%m-%d-%Y') = DATE_FORMAT(DATE_ADD(CURRENT_DATE(),INTERVAL 20 DAY),'%m-%d-%Y'), GROUP_CONCAT(DATE_FORMAT(carservice.date_service_s,'%k:%i')),'') AS '20',
                IF(DATE_FORMAT(carservice.date_service_s,'%m-%d-%Y') = DATE_FORMAT(DATE_ADD(CURRENT_DATE(),INTERVAL 21 DAY),'%m-%d-%Y'), GROUP_CONCAT(DATE_FORMAT(carservice.date_service_s,'%k:%i')),'') AS '21',
                IF(DATE_FORMAT(carservice.date_service_s,'%m-%d-%Y') = DATE_FORMAT(DATE_ADD(CURRENT_DATE(),INTERVAL 22 DAY),'%m-%d-%Y'), GROUP_CONCAT(DATE_FORMAT(carservice.date_service_s,'%k:%i')),'') AS '22',
                IF(DATE_FORMAT(carservice.date_service_s,'%m-%d-%Y') = DATE_FORMAT(DATE_ADD(CURRENT_DATE(),INTERVAL 23 DAY),'%m-%d-%Y'), GROUP_CONCAT(DATE_FORMAT(carservice.date_service_s,'%k:%i')),'') AS '23',
                IF(DATE_FORMAT(carservice.date_service_s,'%m-%d-%Y') = DATE_FORMAT(DATE_ADD(CURRENT_DATE(),INTERVAL 24 DAY),'%m-%d-%Y'), GROUP_CONCAT(DATE_FORMAT(carservice.date_service_s,'%k:%i')),'') AS '24',
                IF(DATE_FORMAT(carservice.date_service_s,'%m-%d-%Y') = DATE_FORMAT(DATE_ADD(CURRENT_DATE(),INTERVAL 25 DAY),'%m-%d-%Y'), GROUP_CONCAT(DATE_FORMAT(carservice.date_service_s,'%k:%i')),'') AS '25',
                IF(DATE_FORMAT(carservice.date_service_s,'%m-%d-%Y') = DATE_FORMAT(DATE_ADD(CURRENT_DATE(),INTERVAL 26 DAY),'%m-%d-%Y'), GROUP_CONCAT(DATE_FORMAT(carservice.date_service_s,'%k:%i')),'') AS '26',
                IF(DATE_FORMAT(carservice.date_service_s,'%m-%d-%Y') = DATE_FORMAT(DATE_ADD(CURRENT_DATE(),INTERVAL 27 DAY),'%m-%d-%Y'), GROUP_CONCAT(DATE_FORMAT(carservice.date_service_s,'%k:%i')),'') AS '27',
                IF(DATE_FORMAT(carservice.date_service_s,'%m-%d-%Y') = DATE_FORMAT(DATE_ADD(CURRENT_DATE(),INTERVAL 28 DAY),'%m-%d-%Y'), GROUP_CONCAT(DATE_FORMAT(carservice.date_service_s,'%k:%i')),'') AS '28',
                IF(DATE_FORMAT(carservice.date_service_s,'%m-%d-%Y') = DATE_FORMAT(DATE_ADD(CURRENT_DATE(),INTERVAL 29 DAY),'%m-%d-%Y'), GROUP_CONCAT(DATE_FORMAT(carservice.date_service_s,'%k:%i')),'') AS '29',
                IF(DATE_FORMAT(carservice.date_service_s,'%m-%d-%Y') = DATE_FORMAT(DATE_ADD(CURRENT_DATE(),INTERVAL 30 DAY),'%m-%d-%Y'), GROUP_CONCAT(DATE_FORMAT(carservice.date_service_s,'%k:%i')),'') AS '30'
                FROM
                carservice

                WHERE carservice.date_service_s BETWEEN CURRENT_DATE() AND DATE_ADD(CURRENT_DATE() ,INTERVAL 30 DAY)
                GROUP BY
                carservice.car_id,
                DATE_FORMAT(carservice.date_service_s,'%m-%d-%Y')

                ) c ON carname.car_id = c.car_id
                " ;
        $connection = Yii::$app->db;
        $data = $connection->createCommand($sql)->queryAll();
        $dataProvider2 = new ArrayDataProvider([
            'allModels' => $data,
        ]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'dataProvider2' => $dataProvider2,
        ]);
    }

    /**
     * Displays a single Carservice model.
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
     * Creates a new Carservice model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Carservice();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Carservice model.
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
            ]);
        }
    }

    /**
     * Deletes an existing Carservice model.
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
     * Finds the Carservice model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Carservice the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Carservice::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

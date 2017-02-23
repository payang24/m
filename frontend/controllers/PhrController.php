<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\base\Model;
use yii\data\ArrayDataProvider;
use yii\db\Query;

class PhrController extends Controller
{
public $enableCsrfValidation = false;

public function actionService($cid = null) {
  $connection = Yii::$app->db_analysis;

    $sql = "SELECT
    person.cid,
        CONCAT(person.NAME,' ',person.LNAME) fname,
        person.hospcode,
        person.pid,
        service.SEQ,
        service.INSTYPE,
        service.BTEMP,
        service.PR,
        service.RR,
        CONCAT(service.DBP,'/',service.SBP) BP,
        service.DATE_SERV
        FROM
        person
        left JOIN service
        ON person.HOSPCODE = service.HOSPCODE
        AND person.PID = service.PID
        WHERE
        person.cid = '".$cid."'
        ORDER BY service.DATE_SERV DESC
          ";

    $connection = Yii::$app->db_analysis;
    $data = [];

    if ($cid != null) {
      $data = $connection->createCommand($sql)->queryAll();
    }

$row = sizeof($data);
if ($row > 0){
  $fname = $data[0]['fname'];
}else {
  $fname ='';
}


    $dataProvider = new ArrayDataProvider([
        'allModels' => $data,
        'pagination' => FALSE,
        //'sort' => ['attributes' => ['diaggroup', 'total_NCAUSE']],
    ]);

    return $this->render('service', [
                'dataProvider' => $dataProvider,
                'sql' => $sql,
                'cid' => $cid,
                'fname' => $fname
    ]);
    }

    public function actionProfile()
    {
        return $this->render('profile');
    }


    public function actionLockscreen()
    {
        return $this->render('lockscreen');
    }





}

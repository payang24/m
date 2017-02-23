<?php
namespace frontend\controllers;
use yii;
use yii\web\controller;
use yii\data\ArrayDataProvider;
use yii\db\Query;


class ScreenController extends Controller
{
  public function actionSumhtscreen()
  {
    $connection = Yii::$app->db_analysis;

    $sumhtscreen = $connection->createCommand("
    SELECT
    t_person_ht_screen.hospcode,
    chospital.hosname,
    SUM(IF(t_person_ht_screen.sbp <> '0','1','')) AS HT_screen,
    SUM(IF(t_person_ht_screen.sbp = '0','1','')) AS HT_No_screen,
    SUM(IF(t_person_ht_screen.sbp <> '0','1','')) + SUM(IF(t_person_ht_screen.sbp = '0','1','')) AS total
    FROM
    t_person_ht_screen
    left JOIN chospital ON t_person_ht_screen.HOSPCODE = chospital.hoscode
    WHERE chospital.provcode = '27'
    GROUP BY t_person_ht_screen.hospcode
    " )->queryAll();

    $dataProvider = new ArrayDataProvider([
        'allModels' => $sumhtscreen
      ]);

    return $this->render('sumhtscreen',[
        'dataProvider'=>$dataProvider
      ]);
  }
  public function actionHtscreen()
  {
    $hospcode = Yii::$app->getRequest()->getQueryParam('hospcode');

    if (!\Yii::$app->getRequest()->getQueryParam('hospcode')) {
        Yii::$app->session->setFlash('error', 'There was an error provid cannot be null.');
        return $this->render('error');
    }

    $connection = Yii::$app->db_analysis;

    $htscreen = $connection->createCommand("
    SELECT
    t_person_ht_screen.hospcode,
    t_person_ht_screen.cid,
    t_person_ht_screen.pid,
    CONCAT(p.`NAME`,'  ',p.LNAME) fullname,
    t_person_ht_screen.age_y,
    h.HOUSE,
    h.VILLAGE,
    ctambon.tambonname,
    t_person_ht_screen.date_screen
    FROM
    t_person_ht_screen
    LEFT JOIN person AS p ON p.HOSPCODE = t_person_ht_screen.hospcode AND p.CID = t_person_ht_screen.cid
    LEFT JOIN home AS h ON p.HOSPCODE = h.HOSPCODE AND p.HID = h.HID
    LEFT JOIN ctambon ON  LEFT(t_person_ht_screen.areacode,6) = ctambon.tamboncodefull
    WHERE t_person_ht_screen.sbp <> 0
    AND h.CHANGWAT = 27
    AND t_person_ht_screen.hospcode = $hospcode
    ORDER BY t_person_ht_screen.age_y DESC
    " )->queryAll();

    $dataProvider = new ArrayDataProvider([
        'allModels' => $htscreen
      ]);
    return $this->render('htscreen',[
        'dataProvider'=>$dataProvider
      ]);
  }

  public function actionHtnoscreen()
  {
    $hospcode = Yii::$app->getRequest()->getQueryParam('hospcode');

    if (!\Yii::$app->getRequest()->getQueryParam('hospcode')) {
        Yii::$app->session->setFlash('error', 'There was an error provid cannot be null.');
        return $this->render('error');
    }
    $connection = Yii::$app->db_analysis;

    $htnoscreen = $connection->createCommand("
    SELECT
    t_person_ht_screen.hospcode,
    t_person_ht_screen.cid,
    t_person_ht_screen.pid,
    CONCAT(p.`NAME`,'  ',p.LNAME) fullname,
    t_person_ht_screen.age_y,
    h.HOUSE,
    h.VILLAGE,
    ctambon.tambonname,
    t_person_ht_screen.date_screen
    FROM
    t_person_ht_screen
    LEFT JOIN person AS p ON p.HOSPCODE = t_person_ht_screen.hospcode AND p.CID = t_person_ht_screen.cid
    LEFT JOIN home AS h ON p.HOSPCODE = h.HOSPCODE AND p.HID = h.HID
    LEFT JOIN ctambon ON  LEFT(t_person_ht_screen.areacode,6) = ctambon.tamboncodefull
    WHERE t_person_ht_screen.sbp = 0
    AND h.CHANGWAT = 27
    AND t_person_ht_screen.hospcode = $hospcode
    ORDER BY t_person_ht_screen.age_y DESC
    " )->queryAll();


    $dataProvider = new ArrayDataProvider([
        'allModels' => $htnoscreen
      ]);


    return $this->render('htnoscreen',[
        'dataProvider'=>$dataProvider
      ]);

  }

  public function actionSumdmscreen()
  {
    $connection = Yii::$app->db_analysis;

    $sumdmscreen = $connection->createCommand("
    SELECT
    t_person_dm_screen.hospcode,
    chospital.hosname,
    SUM(IF(t_person_dm_screen.bslevel <> '0','1','')) AS DM_screen,
    SUM(IF(t_person_dm_screen.bslevel = '0','1','')) AS DM_No_screen,
    SUM(IF(t_person_dm_screen.bslevel <> '0','1','')) + SUM(IF(t_person_dm_screen.bslevel = '0','1','')) as total
    FROM
    t_person_dm_screen
    left JOIN chospital ON t_person_dm_screen.HOSPCODE = chospital.hoscode
    WHERE chospital.provcode = '27'
    GROUP BY t_person_dm_screen.hospcode
    " )->queryAll();


    $dataProvider = new ArrayDataProvider([
        'allModels' => $sumdmscreen
      ]);


    return $this->render('sumdmscreen',[
        'dataProvider'=>$dataProvider
      ]);
  }
  public function actionDmscreen()
  {
    $hospcode = Yii::$app->getRequest()->getQueryParam('hospcode');

    if (!\Yii::$app->getRequest()->getQueryParam('hospcode')) {
        Yii::$app->session->setFlash('error', 'There was an error provid cannot be null.');
        return $this->render('error');
    }
    $connection = Yii::$app->db_analysis;

    $dmscreen = $connection->createCommand("
    SELECT
    t_person_dm_screen.hospcode,
    t_person_dm_screen.cid,
    t_person_dm_screen.pid,
    CONCAT(p.`NAME`,'  ',p.LNAME) fullname,
    t_person_dm_screen.age_y,
    h.HOUSE,
    h.VILLAGE,
    ctambon.tambonname,
    t_person_dm_screen.date_screen
    FROM
    t_person_dm_screen
    LEFT JOIN person AS p ON p.HOSPCODE = t_person_dm_screen.hospcode AND p.CID = t_person_dm_screen.cid
    LEFT JOIN home AS h ON p.HOSPCODE = h.HOSPCODE AND p.HID = h.HID
    LEFT JOIN ctambon ON  LEFT(t_person_dm_screen.areacode,6) = ctambon.tamboncodefull
    WHERE t_person_dm_screen.bslevel <> 0
    AND h.CHANGWAT = 27
    AND t_person_dm_screen.hospcode = $hospcode
    ORDER BY t_person_dm_screen.age_y DESC
    " )->queryAll();


    $dataProvider = new ArrayDataProvider([
        'allModels' => $dmscreen
      ]);


    return $this->render('dmscreen',[
        'dataProvider'=>$dataProvider
      ]);
  }
  public function actionDmnoscreen()
  {
    $hospcode = Yii::$app->getRequest()->getQueryParam('hospcode');

    if (!\Yii::$app->getRequest()->getQueryParam('hospcode')) {
        Yii::$app->session->setFlash('error', 'There was an error provid cannot be null.');
        return $this->render('error');
    }
    $connection = Yii::$app->db_analysis;

    $dmnoscreen = $connection->createCommand("
    SELECT
    t_person_dm_screen.hospcode,
    t_person_dm_screen.cid,
    t_person_dm_screen.pid,
    CONCAT(p.`NAME`,'  ',p.LNAME) fullname,
    t_person_dm_screen.age_y,
    h.HOUSE,
    h.VILLAGE,
    ctambon.tambonname,
    t_person_dm_screen.date_screen
    FROM
    t_person_dm_screen
    LEFT JOIN person AS p ON p.HOSPCODE = t_person_dm_screen.hospcode AND p.CID = t_person_dm_screen.cid
    LEFT JOIN home AS h ON p.HOSPCODE = h.HOSPCODE AND p.HID = h.HID
    LEFT JOIN ctambon ON  LEFT(t_person_dm_screen.areacode,6) = ctambon.tamboncodefull
    WHERE t_person_dm_screen.bslevel = 0
    AND h.CHANGWAT = 27
    AND t_person_dm_screen.hospcode = $hospcode
    ORDER BY t_person_dm_screen.age_y DESC
    " )->queryAll();


    $dataProvider = new ArrayDataProvider([
        'allModels' => $dmnoscreen
      ]);


    return $this->render('dmnoscreen',[
        'dataProvider'=>$dataProvider
      ]);
  }
}

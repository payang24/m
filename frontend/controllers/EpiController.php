<?php
namespace frontend\controllers;
use yii;
use yii\web\controller;
use yii\data\ArrayDataProvider;
use yii\db\Query;


class EpiController extends controller
{

  public function actionSumepi()
  {
    $connection = Yii::$app->db_analysis;

    $sumepi = $connection->createCommand("
    SELECT
    tepi.hospcode,
    ch.hosname,
    COUNT(tepi.cid) as total
    FROM
    t_person_epi tepi
    LEFT JOIN chospital ch ON tepi.hospcode = ch.hoscode
    GROUP BY tepi.hospcode
    " )->queryAll();

    $dataProvider = new ArrayDataProvider([
        'allModels' => $sumepi
      ]);

    return $this->render('sumepi',[
        'dataProvider'=>$dataProvider
      ]);
      }

      public function actionEpi()
      {
        $hospcode = Yii::$app->getRequest()->getQueryParam('hospcode');

        if (!\Yii::$app->getRequest()->getQueryParam('hospcode')) {
            Yii::$app->session->setFlash('error', 'There was an error provid cannot be null.');
            return $this->render('error');
        }

        $connection = Yii::$app->db_analysis;

        $epi = $connection->createCommand("
        SELECT
        t_person_epi.hospcode,
        t_person_epi.pid,
        #t_person_epi.typearea,
        t_person_epi.cid,
        CONCAT(person.`NAME`,'  ',person.LNAME) fullname,
        t_person_epi.birth,
        IF(timestampdiff(year,t_person_epi.birth,NOW())=0,CONCAT(timestampdiff(MONTH,t_person_epi.birth,NOW()) MOD 12,' เดือน'),CONCAT(timestampdiff(year,t_person_epi.birth,NOW()),' ปี ',timestampdiff(MONTH,t_person_epi.birth,NOW()) MOD 12,' เดือน')) AS age,
        #แรกเกิด
        t_person_epi.bcg_hospcode,
        t_person_epi.hbv1_hospcode,
        #2 เดือน
        t_person_epi.opv1_hospcode,
        t_person_epi.dtp1_hospcode,
        #4 เดือน
        t_person_epi.opv2_hospcode,
        t_person_epi.hbv2_hospcode,
        t_person_epi.dtp2_hospcode,
        t_person_epi.ipv2_hospcode,
        #6 เดือน
        t_person_epi.hbv3_hospcode,
        t_person_epi.opv3_hospcode,
        t_person_epi.dtp3_hospcode,
        #9 เดือน
        t_person_epi.mmr1_hospcode,
        #12 เดือน
        t_person_epi.je1_hospcode,
        #18 เดือน
        t_person_epi.dtp4_hospcode,
        t_person_epi.opv4_hospcode,
        #2 ปี 6 เดือน
        t_person_epi.je2_hospcode,
        t_person_epi.mmr2_hospcode,
        #4-6 ปี
        t_person_epi.dtp5_hospcode,
        t_person_epi.opv5_hospcode

        FROM
        t_person_epi
        INNER JOIN person ON t_person_epi.hospcode = person.HOSPCODE AND t_person_epi.cid = person.CID
        WHERE t_person_epi.hospcode = $hospcode
        AND t_person_epi.typearea in (1,3)
        ORDER BY timestampdiff(MONTH,t_person_epi.birth,NOW())
        " )->queryAll();

        $dataProvider = new ArrayDataProvider([
            'allModels' => $epi
          ]);
        return $this->render('epi',[
            'dataProvider'=>$dataProvider
          ]);
      }



}

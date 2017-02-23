<?php
namespace frontend\controllers;
use yii;
use yii\web\controller;
use yii\data\ArrayDataProvider;
use yii\db\Query;


class RegisterController extends controller
{

  public function actionRegistersum_dm()
  {
    $connection = Yii::$app->db_analysis;
    //
    $registersum_dm = $connection->createCommand("
    SELECT
    t_chronic.p_hospcode as hospcode,
    ch.hosname,
    COUNT(t_chronic.cid) as total
    FROM
    t_chronic
    LEFT JOIN chospital ch ON t_chronic.p_hospcode = ch.hoscode
    WHERE UPPER(t_chronic.diagcode) BETWEEN 'E10' AND 'E149'
    AND t_chronic.p_typearea in (1,3)
    GROUP BY t_chronic.p_hospcode
    " )->queryAll();
    $dataProvider = new ArrayDataProvider([
        'allModels' => $registersum_dm
      ]);
    return $this->render('registersum_dm',[
        'dataProvider'=>$dataProvider
      ]);
      }

      public function actionRegister_dm()
      {
        $hospcode = Yii::$app->getRequest()->getQueryParam('hospcode');
        if (!\Yii::$app->getRequest()->getQueryParam('hospcode')) {
            Yii::$app->session->setFlash('error', 'There was an error provid cannot be null.');
            return $this->render('error');
        }
        $connection = Yii::$app->db_analysis;
        $register_dm = $connection->createCommand("
        SELECT
        t_chronic.p_hospcode ,
        t_chronic.cid,
        t_person_cid.`NAME`,
        t_person_cid.LNAME,
        t_chronic.age_y,
        t_chronic.age_y_dx,
        t_chronic.sex,
        t_chronic.date_dx,
        t_chronic.hosp_dx,
        t_chronic.input_hosp
        #,t_chronic.p_typearea
        FROM
        t_chronic
        left JOIN t_person_cid ON  t_person_cid.CID = t_chronic.cid
        WHERE UPPER(t_chronic.diagcode) BETWEEN 'E10' AND 'E149'
        AND t_chronic.p_hospcode = $hospcode
        AND t_chronic.p_typearea in (1,3)
        AND t_chronic.nation = '099'
        GROUP BY t_chronic.cid
        ORDER BY t_chronic.age_y
        " )->queryAll();

        $dataProvider = new ArrayDataProvider([
            'allModels' => $register_dm
          ]);
        return $this->render('register_dm',[
            'dataProvider'=>$dataProvider
          ]);
      }

      public function actionRegistersum_ht()
      {
        $connection = Yii::$app->db_analysis;
        $registersum_ht = $connection->createCommand("
        SELECT
        t_chronic.p_hospcode as hospcode,
        ch.hosname,
        COUNT(t_chronic.cid) as total
        FROM
        t_chronic
        LEFT JOIN chospital ch ON t_chronic.p_hospcode = ch.hoscode
        WHERE UPPER(t_chronic.diagcode) BETWEEN 'I10' AND 'I159'
        AND t_chronic.p_typearea in (1,3)
        GROUP BY t_chronic.p_hospcode
        " )->queryAll();
        $dataProvider = new ArrayDataProvider([
            'allModels' => $registersum_ht
          ]);
        return $this->render('registersum_ht',[
            'dataProvider'=>$dataProvider
          ]);
          }

          public function actionRegister_ht()
          {
            $hospcode = Yii::$app->getRequest()->getQueryParam('hospcode');
            if (!\Yii::$app->getRequest()->getQueryParam('hospcode')) {
                Yii::$app->session->setFlash('error', 'There was an error provid cannot be null.');
                return $this->render('error');
            }
            $connection = Yii::$app->db_analysis;
            $register_ht = $connection->createCommand("
            SELECT
            t_chronic.p_hospcode ,
            t_chronic.cid,
            t_person_cid.`NAME`,
            t_person_cid.LNAME,
            t_chronic.age_y,
            t_chronic.age_y_dx,
            t_chronic.sex,
            t_chronic.nation,
            t_chronic.date_dx,
            t_chronic.hosp_dx,
            t_chronic.input_hosp
            #,t_chronic.p_typearea

            FROM
            t_chronic
            left JOIN t_person_cid ON  t_person_cid.CID = t_chronic.cid
            WHERE UPPER(t_chronic.diagcode) BETWEEN 'I10' AND 'I159'
            AND t_chronic.p_hospcode = $hospcode
            AND t_chronic.p_typearea in (1,3)
            AND t_chronic.nation = '099'
            GROUP BY t_chronic.cid
            ORDER BY t_chronic.age_y
            " )->queryAll();

            $dataProvider = new ArrayDataProvider([
                'allModels' => $register_ht
              ]);
            return $this->render('register_ht',[
                'dataProvider'=>$dataProvider
              ]);
          }

          public function actionRegister_disabled()
          {
            $result =Yii::$app->db_analysis->createCommand("
            SELECT
            t_person_cid.HOSPCODE,
            t_person_cid.CID,
            disability.DISABID,
            t_person_cid.PID,
            t_person_cid.`NAME`,
            t_person_cid.LNAME,
            t_person_cid.vhid,
            t_person_cid.SEX,
            t_person_cid.NATION,
            t_person_cid.TYPEAREA,
            t_person_cid.age_y,
            card.INSTYPE_OLD,
            disability.DIAGCODE
            FROM
            t_person_cid
            INNER JOIN disability ON t_person_cid.HOSPCODE = disability.HOSPCODE AND t_person_cid.PID = disability.PID
            INNER JOIN card ON t_person_cid.HOSPCODE = card.HOSPCODE AND t_person_cid.PID = card.PID
            WHERE card.INSTYPE_OLD = 74
            AND t_person_cid.TYPEAREA IN (1,3)
            AND t_person_cid.DISCHARGE = 9
            GROUP BY t_person_cid.CID
            ORDER BY t_person_cid.HOSPCODE ASC
            limit 20
            ")
            ->queryAll();

            return $this->render('register_disabled',[
                'result'=>$result
              ]);
          }

          public function actionRegister_chart()//จำนวนผู้ป่วยนอกแยก รพ.
          {
            $sql = "SELECT
            dio.HOSPCODE,
            c.hosname,
            COUNT(DISTINCT HOSPCODE,PID) diag_all
            FROM
            diagnosis_opd dio
            LEFT JOIN chospital c ON dio.HOSPCODE = c.hoscode
            WHERE  c.hostype IN(06,07)
            AND dio.DIAGTYPE = 1
            AND LEFT(dio.DIAGCODE,1) <> 'z'
            AND dio.DATE_SERV BETWEEN '2015-10-01' AND '2015-10-31'
            GROUP BY dio.HOSPCODE";

            $data =Yii::$app->db_analysis->createCommand($sql)->queryAll();
            //วน loop ทำกราฟ
            $hosname =[];
            $diag_all =[];
            foreach ($data as $key => $value) {
              $hosname[] = $value['hosname'];
              $diag_all[] = (int)$value['diag_all'];
            }

            $dataProvider = new ArrayDataProvider([
                'allModels' => $data,
                'sort' => [
                  'attributes' => ['HOSPCODE', 'hosname', 'diag_all'],
                  ],
                //   'pagination' => [
                //   'pageSize' => 2,
                // ],
              ]);

            return $this->render('register_chart',[
                'data'=>$data,
                'hosname'=>$hosname,
                'diag_all'=>$diag_all,
                'dataProvider' =>$dataProvider
              ]);
          }

          public function actionRegistersum_anc()
          {
            $connection = Yii::$app->db_analysis;
            $registersum_anc = $connection->createCommand("
            SELECT
            t_person_anc.hospcode,
            chospital.hosname,
            COUNT(DISTINCT t_person_anc.hospcode,t_person_anc.pid) total_anc
            FROM
            t_person_anc
            JOIN chospital
            ON t_person_anc.hospcode = chospital.hoscode
            GROUP BY t_person_anc.hospcode
            " )->queryAll();
            $dataProvider = new ArrayDataProvider([
                'allModels' => $registersum_anc
              ]);
            return $this->render('registersum_anc',[
                'dataProvider'=>$dataProvider
              ]);
              }

              public function actionRegistersum_elderly()
              {
                $connection = Yii::$app->db_analysis;
                $registersum_elderly = $connection->createCommand("
                SELECT
                t_person_cid.HOSPCODE AS HOSPCODE,
                chospital.hosname,
                SUM(IF(t_person_cid.SEX = 1,1,0)) male,
                SUM(IF(t_person_cid.SEX = 2,1,0)) female,
                COUNT(t_person_cid.CID) total
                FROM
                t_person_cid
                JOIN chospital
                ON t_person_cid.HOSPCODE = chospital.hoscode
                WHERE
                t_person_cid.age_y BETWEEN  60 and 120 and
                t_person_cid.DISCHARGE = 9
                GROUP BY t_person_cid.HOSPCODE;
                " )->queryAll();
                $dataProvider = new ArrayDataProvider([
                    'allModels' => $registersum_elderly
                  ]);
                return $this->render('registersum_elderly',[
                    'dataProvider'=>$dataProvider
                  ]);
                  }

                  public function actionRegister_elderly()
                  {
                    $hospcode = Yii::$app->getRequest()->getQueryParam('HOSPCODE');

                    if (!\Yii::$app->getRequest()->getQueryParam('HOSPCODE')) {
                        Yii::$app->session->setFlash('error', 'There was an error provid cannot be null.');
                        return $this->render('error');
                    }

                    $connection = Yii::$app->db_analysis;

                    $elderly= $connection->createCommand("
                    SELECT
                    t_person_cid.HOSPCODE AS HOSPCODE,
                    chospital.hosname,
                    CONCAT(cprename.prename,t_person_cid.NAME,' ',t_person_cid.LNAME) fname,
                    t_person_cid.age_y,
                    t_person_cid.BIRTH,
                    t_person_cid.NATION
                    FROM t_person_cid
                    JOIN chospital ON t_person_cid.HOSPCODE = chospital.hoscode
                    INNER JOIN cprename ON t_person_cid.PRENAME = cprename.id_prename
                    WHERE
                    t_person_cid.HOSPCODE = $hospcode and
                    t_person_cid.DISCHARGE = 9 and
                    t_person_cid.age_y BETWEEN  60 and 120
                    ORDER BY t_person_cid.age_y DESC
                    " )->queryAll();

                    $dataProvider = new ArrayDataProvider([
                        'allModels' => $elderly
                      ]);
                    return $this->render('register_elderly',[
                        'dataProvider'=>$dataProvider
                      ]);
                  }

                  public function actionRegistersum_birth()
                  {
                    // $hospcode = Yii::$app->getRequest()->getQueryParam('HOSPCODE');
                    //
                    // if (!\Yii::$app->getRequest()->getQueryParam('HOSPCODE')) {
                    //     Yii::$app->session->setFlash('error', 'There was an error provid cannot be null.');
                    //     return $this->render('error');
                    // }
                    if (isset($_POST['date_b'])){
                      $date_b = $_POST['date_b'];
                    }
                    else
                    {
                      $date_b = '';
                    };
                    if (isset($_POST['date_e'])){
                      $date_e = $_POST['date_e'];
                    }
                    else
                    {
                      $date_e = '';
                    }



                    $sql = "SELECT
                    newborn.HOSPCODE,
                    chospital.hosname,
                    COUNT(DISTINCT p.CID) total
                    FROM
                    newborn
                    INNER JOIN person p on newborn.HOSPCODE = p.HOSPCODE and newborn.pid = p.PID
                    INNER JOIN chospital ON newborn.HOSPCODE = chospital.hoscode
                    WHERE
                    newborn.BDATE BETWEEN '$date_b' AND '$date_e' AND
                    p.typearea in (1,3)
                    GROUP BY newborn.HOSPCODE
                    " ;
                    $connection = Yii::$app->db_analysis;
                    $data = $connection->createCommand($sql)->queryAll();

                    $dataProvider = new ArrayDataProvider([
                        'allModels' => $data,
                        'pagination' => FALSE,
                        #'sort' => ['attributes' => ['company', 'product', 'type']],
                    ]);
                    return $this->render('registersum_birth', [
                                'dataProvider' => $dataProvider,
                                'sql' => $sql,
                                'date_b' => $date_b,
                                'date_e' => $date_e
                    ]);
                  }

}

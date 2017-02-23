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

class ReportController extends Controller
{
    public $enableCsrfValidation = false;


public function actionFp() {
    $date1 = "";
    $date2 = "";
    if (Yii::$app->request->isPost) {
        $date1 = $_POST['date1'];
        $date2 = $_POST['date2'];
    }

    $sql = "SELECT
        d.distid,
        d.distname,
        #COUNT(DISTINCT fp.HOSPCODE,fp.PID,fp.FPTYPE) total,
        COUNT(DISTINCT IF(fp.FPTYPE = '3',CONCAT(fp.HOSPCODE,fp.PID),NULL)) fp3,
        COUNT(DISTINCT IF(fp.FPTYPE = '1',CONCAT(fp.HOSPCODE,fp.PID),NULL)) fp1,
        COUNT(DISTINCT IF(fp.FPTYPE = '7',CONCAT(fp.HOSPCODE,fp.PID),NULL)) fp7,
        COUNT(DISTINCT IF(fp.FPTYPE = '6',CONCAT(fp.HOSPCODE,fp.PID),NULL)) fp6,
        COUNT(DISTINCT IF(fp.FPTYPE = '2',CONCAT(fp.HOSPCODE,fp.PID),NULL)) fp2,
        COUNT(DISTINCT IF(fp.FPTYPE = '4',CONCAT(fp.HOSPCODE,fp.PID),NULL)) fp4,
        COUNT(DISTINCT IF(fp.FPTYPE = '5',CONCAT(fp.HOSPCODE,fp.PID),NULL)) fp5
        FROM
        fp
        Inner Join co_office ON fp.HOSPCODE = co_office.off_id
        Left Join co_district d ON co_office.distid = d.distid
        WHERE
        fp.DATE_SERV BETWEEN '$date1' AND '$date2'
        GROUP BY
        co_office.distid
        ORDER BY
        co_office.distid ";

    $connection = Yii::$app->db_analysis;
    $data = $connection->createCommand($sql)->queryAll();

    $dataProvider = new ArrayDataProvider([
        'allModels' => $data,
        'pagination' => FALSE,
        #'sort' => ['attributes' => ['company', 'product', 'type']],
    ]);

    return $this->render('fp', [
                'dataProvider' => $dataProvider,
                'sql' => $sql,
                'date1' => $date1,
                'date2' => $date2
    ]);
    }
    public function actionSumreport504() {
      $connection = Yii::$app->db_pexp;
      if (isset($_POST['year']))
      {
          $year = $_POST['year'];
      }
      else
      {
          $year = date('Y');
      }
        $sql = "SELECT
                tdiag_opd504.date_year,
                tdiag_opd504.group504name,
                tdiag_opd504.code504,
                COUNT(tdiag_opd504.SEQ) total_seq,
                COUNT(DISTINCT tdiag_opd504.HOSPCODE,tdiag_opd504.PID) total_pid

                FROM
                tdiag_opd504
                WHERE tdiag_opd504.date_year = '$year'
                GROUP BY tdiag_opd504.code504
                ORDER BY total_seq DESC
              ";

        $connection = Yii::$app->db_analysis;
        $data = $connection->createCommand($sql)->queryAll();

        $dataProvider = new ArrayDataProvider([
            'allModels' => $data,
            'pagination' => FALSE,
            #'sort' => ['attributes' => ['company', 'product', 'type']],
        ]);

        return $this->render('sumreport504', [
                    'dataProvider' => $dataProvider,
                    'sql' => $sql,
                    'year' => $year
        ]);
        }

        public function actionSeqcode504()
        {
          $code504 = Yii::$app->getRequest()->getQueryParam('code504');

          if (!\Yii::$app->getRequest()->getQueryParam('code504')) {
              Yii::$app->session->setFlash('error', 'There was an error provid cannot be null.');
              return $this->render('error');
          }

          $connection = Yii::$app->db_analysis;

          $code504 = $connection->createCommand("
          SELECT
            tdiag_opd504.DIAGCODE,
            tdiag_opd504.code504,
            tdiag_opd504.diseasethai,
            COUNT(tdiag_opd504.SEQ) AS total_seq
            FROM
            tdiag_opd504
            WHERE
            tdiag_opd504.code504 = '$code504'
            GROUP BY
            tdiag_opd504.DIAGCODE
            ORDER BY
            total_seq DESC
          " )->queryAll();

          $dataProvider = new ArrayDataProvider([
              'allModels' => $code504
            ]);
          return $this->render('seqcode504',[
              'dataProvider'=>$dataProvider
            ]);
        }

        public function actionPidcode504()
        {
          $code504 = Yii::$app->getRequest()->getQueryParam('code504');

          if (!\Yii::$app->getRequest()->getQueryParam('code504')) {
              Yii::$app->session->setFlash('error', 'There was an error provid cannot be null.');
              return $this->render('error');
          }

          $connection = Yii::$app->db_analysis;

          $code504 = $connection->createCommand("
          SELECT
            tdiag_opd504.DIAGCODE,
            tdiag_opd504.code504,
            tdiag_opd504.diseasethai,
            COUNT(DISTINCT tdiag_opd504.HOSPCODE,tdiag_opd504.PID) total_pid
            FROM
            tdiag_opd504
            WHERE
            tdiag_opd504.code504 = '$code504'
            GROUP BY
            tdiag_opd504.DIAGCODE
            ORDER BY
            total_pid DESC
          " )->queryAll();

          $dataProvider = new ArrayDataProvider([
              'allModels' => $code504
            ]);
          return $this->render('pidcode504',[
              'dataProvider'=>$dataProvider
            ]);
        }

  }

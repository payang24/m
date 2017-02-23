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

class DeathController extends Controller
{
public $enableCsrfValidation = false;

public function actionDeath() {
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
            death_data.DYEAR,
            co_diag21group.diaggroup,
            death_data.NCAUSE,
            co_diag21group.diagtname,
            COUNT(death_data.NCAUSE) AS total_NCAUSE,
            COUNT(death_data.NCAUSE)*100/(
                SELECT COUNT(death_data.NCAUSE) tn
                from
                death_data
            WHERE death_data.DYEAR = '$year') as percen
            FROM
            death_data
            JOIN co_diag21group ON death_data.NCAUSE = co_diag21group.diagcode
            JOIN co_disease504 ON co_diag21group.diaggroup = co_disease504.recordID
            WHERE
            death_data.DYEAR = '$year'
            GROUP BY
            death_data.NCAUSE
            ORDER BY
            total_NCAUSE DESC
          ";

    $connection = Yii::$app->db_pexp;
    $data = $connection->createCommand($sql)->queryAll();

    $dataProvider = new ArrayDataProvider([
        'allModels' => $data,
        'pagination' => FALSE,
        'sort' => ['attributes' => ['diaggroup', 'total_NCAUSE']],
    ]);

    return $this->render('death', [
                'dataProvider' => $dataProvider,
                'sql' => $sql,
                'year' => $year
    ]);
    }


public function actionSumdeath21() {
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
      death_data.DYEAR,
      co_diag21group.diaggroup,
      co_disease504.groupname,
      COUNT(death_data.NCAUSE) AS total_NCAUSE
      FROM
      death_data
      JOIN co_diag21group
      ON death_data.NCAUSE = co_diag21group.diagcode
      JOIN co_disease504
      ON co_diag21group.diaggroup = co_disease504.recordID
      WHERE
      death_data.DYEAR = '$year'
      GROUP BY
      co_diag21group.diaggroup
      ORDER BY
      total_NCAUSE DESC
          ";

    $connection = Yii::$app->db_pexp;
    $data = $connection->createCommand($sql)->queryAll();

    $dataProvider = new ArrayDataProvider([
        'allModels' => $data,
        'pagination' => FALSE,
        'sort' => ['attributes' => ['diaggroup', 'total_NCAUSE']],
    ]);

    return $this->render('sumdeath21', [
                'dataProvider' => $dataProvider,
                'sql' => $sql,
                'year' => $year
    ]);
    }

    public function actionDeath21()
    {
      $diaggroup = Yii::$app->getRequest()->getQueryParam('diaggroup');

      if (!\Yii::$app->getRequest()->getQueryParam('diaggroup')) {
          Yii::$app->session->setFlash('error', 'There was an error provid cannot be null.');
          return $this->render('error');
      }

      $DYEAR = Yii::$app->getRequest()->getQueryParam('DYEAR');

      if (!\Yii::$app->getRequest()->getQueryParam('DYEAR')) {
          Yii::$app->session->setFlash('error', 'There was an error provid cannot be null.');
          return $this->render('error');
      }

      $connection = Yii::$app->db_pexp;

      $diaggroup = $connection->createCommand(
      "SELECT
          death_data.DYEAR,
          co_diag21group.diaggroup,
          death_data.NCAUSE,
          co_diag21group.diagtname,
          COUNT(death_data.NCAUSE) AS total_NCAUSE
          FROM
          death_data
          JOIN co_diag21group
          ON death_data.NCAUSE = co_diag21group.diagcode
          JOIN co_disease504
          ON co_diag21group.diaggroup = co_disease504.recordID
          WHERE
          death_data.DYEAR = '$DYEAR' AND
          co_diag21group.diaggroup = '$diaggroup'
          GROUP BY
          death_data.NCAUSE
          ORDER BY
          total_NCAUSE DESC
            " )->queryAll();

      $dataProvider = new ArrayDataProvider([
          'allModels' => $diaggroup
        ]);
      return $this->render('death21',[
          'dataProvider'=>$dataProvider,'DYEAR' => $DYEAR
        ]);
    }

    public function actionSumdeath() {
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
                death_data.DYEAR,
                LEFT(death_data.LCCAATTMM,4) AS `aumper`,
                co_district.distname,
                COUNT(NCAUSE) total_death
                FROM
                `death_data`
                INNER JOIN `co_district` ON co_district.distid = LEFT(death_data.LCCAATTMM,4)
                WHERE
                death_data.DYEAR = '$year'
                GROUP BY
                aumper
              ";

        $connection = Yii::$app->db_pexp;
        $data = $connection->createCommand($sql)->queryAll();

        $dataProvider = new ArrayDataProvider([
            'allModels' => $data,
            'pagination' => FALSE,
            'sort' => ['attributes' => ['aumper', 'total_death']],
        ]);

        return $this->render('sumdeath', [
                    'dataProvider' => $dataProvider,
                    'sql' => $sql,
                    'year' => $year
        ]);
        }

}

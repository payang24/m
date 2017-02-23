<?php
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use app\models\Years;
use yii\widgets\Pjax;
use kartik\date\DatePicker;

$titles = ' รายงานข้อมูลการตาย 21 กลุ่มโรค';
$this->title = $titles;
$this->params['breadcrumbs'][] = $this->title;
?>

<div class='well'>
    <form method="POST">
      <div class="row">
          <div class="col-xs-1 col-sm-1 col-md-1" ><b>เลือกปี</b></div>
          <div class="col-xs-2 col-sm-2 col-md-3">
            <?= Html::dropDownList('year',$year,['2558'=>'2558','2557'=>'2557','2556'=>'2556'],['class'=>'form-control']);?>
          </div>

          <div class="col-xs-4 col-sm-4 col-md-2">
              <button class='btn btn-danger'>ประมวลผล</button>
          </div>

      </div>

    </form>
</div>
<div class="content body">
<div class="row">
    <div class="col-md-12">
        <?php Pjax::begin()?>
<?php
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'panel' => [
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> รายงานข้อมูลการตาย 21 กลุ่มโรค </h3>',
        // . '<i class="glyphicon glyphicon-list"></i> รายงานผู้ป่วยนอก 504 </b>',
        'type' => 'success',

        'footer' => false
    ],
    'responsive' => true,
    'hover' => true,
    'striped' => FALSE,
    'exportConfig' => [
        GridView::EXCEL => [],
    ],
    'toolbar' => [
        '{export}',
        '{toggleData}'=>false
    ],
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        [
            'label' => 'ปีงบประมาณ',
            'attribute' => 'DYEAR',
        ],
        [
            'label' => 'รหัสกลุ่ม',
            'attribute' => 'diaggroup',
        ],
        [
            'label' => 'กลุ่มโรค',
            'attribute' => 'groupname',
        ],
        [
            'label' => 'รวม/คน',
            'attribute' => 'total_NCAUSE',
            'format'=>'raw',
            'value'=>function($diaggroup){
           return Html::a($diaggroup['total_NCAUSE'], ['death/death21', 'diaggroup'=>$diaggroup['diaggroup'],'DYEAR'=>$diaggroup['DYEAR']]);
              //return '<a href="'.Yii::$app->urlManager->createUrl(['qry/province', 'provid'=>$d['provid']]).'">'.$d['provname'].'</a>';
            }
        ],


    ],
]);
?>
        <?php Pjax::end() ?>
    </div>
</div>
</div>

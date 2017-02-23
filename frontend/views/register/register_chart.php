<?php
use kartik\grid\GridView;
use miloschuman\highcharts\Highcharts;
use yii\helpers\Html;
//use yii\helpers\VarDumper;
//var_dump($sumscreen);
?>
<div>
<h3>chart จำนวนผู้ป่วยนอกแยก รพ. </h3>
<?php
  //vardumper::dump($data,10,true)
  echo Highcharts::widget([
   'options' => [
     'chart' =>[
       'type' => 'bar'],
      'title' => ['text' => 'chart จำนวนผู้ป่วยนอกแยก รพ.'],
      'xAxis' => [
         'categories' => $hosname
      ],
      'yAxis' => [
         'title' => ['text' => 'จำนวนคนป่วย']
      ],

      'series' => [
         ['hosname' => 'โรงพยาบาล', 'data' => $diag_all
         //['name' => 'John', 'data' => [5, 7, 3]]
      ]
   ],
]]);
 ?>

 <div>
   <h3>ตารางจำนวนผู้ป่วยนอกแยก รพ. </h3>
 <?php
 echo GridView::widget([
     'dataProvider' => $dataProvider
    //  'columns' =>
    //  [
    //    'attribute' => 'HOSPCODE',
    //    'label' => 'รหัสหน่วยบริการ'
    //  ],
    //  [
    //    'attribute' => 'hosname',
    //    'label' => 'หน่วยบริการ'
    //  ],
    //  [
    //    'attribute' => 'diag_all',
    //    'label' => 'จำนวน'
    //  ]
     ]);
     ?>
</div>


 </div>

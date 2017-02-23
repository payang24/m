<?php
use kartik\grid\GridView;
use miloschuman\highcharts\Highcharts;
use yii\helpers\Html;
//var_dump($sumscreen);
?>
<div class="content body">
<div class="row">

    <div class="col-md-12">
        <?php
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'panel' => [
                'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> รายงานการสร้างเสริมภูมิคุ้มกันโรคเด็ก</h3>'],
            'responsive'=>true,//ทำ responsive ตาราง

            'beforeHeader'=>[
        [
            'columns'=>[
                ['content'=>'ข้อมูลผู้มารับบริการ', 'options'=>['colspan'=>5,'class'=>'text-center' ]],
                ['content'=>'แรกเกิด', 'options'=>['colspan'=>2, 'class'=>'text-center']],
                ['content'=>' 2 เดือน', 'options'=>['colspan'=>2, 'class'=>'text-center']],
                ['content'=>' 4 เดือน', 'options'=>['colspan'=>4, 'class'=>'text-center']],
                ['content'=>' 6 เดือน', 'options'=>['colspan'=>3, 'class'=>'text-center']],
                ['content'=>' 9-12 เดือน', 'options'=>['colspan'=>2, 'class'=>'text-center']],
                ['content'=>' 18 เดือน', 'options'=>['colspan'=>2, 'class'=>'text-center']],
                ['content'=>' 2-2.5 ปี', 'options'=>['colspan'=>2, 'class'=>'text-center']],
                ['content'=>' 4-6 ปี', 'options'=>['colspan'=>2, 'class'=>'text-center']],
                // ['content'=>' 10-12 ปี', 'options'=>['colspan'=>1, 'class'=>'text-center']],
            ],
            'options'=>['class'=>'skip-export'] // remove this row from export
        ]
    ],
            'columns' => [
                //['class'=>'yii\grid\SerialColumn'],
                 [
                    'label' => 'รหัสหน่วยบริการ',
                    'attribute' => 'hospcode'
                ],
                 [
                    'label' => 'เลขบัตรประชาชน',
                    'attribute' => 'cid'
                ],
                [
                    'label' => 'รหัสบุคคล',
                    'attribute' => 'pid'
                ],
                [
                    'label' => 'ชื่อ - นามสกุล',
                    'attribute' => 'fullname'
                ],

                [
                   'label' => 'อายุ',
                   'attribute' => 'age'
               ],
               //แรกเกิด
               [
                  'label' => 'BCG',
                  'attribute' => 'bcg_hospcode',
                  'format'=>'raw',
                  'value'=>function($row){
                  if ($row['bcg_hospcode'] == null) {
                    return '<i class="glyphicon glyphicon-remove">';
                  } else {
                    return $row['bcg_hospcode'];
                  }
                  }
              ],
              [
                 'label' => 'HBV เข็ม 1',
                 'attribute' => 'hbv1_hospcode',
                 'format'=>'raw',
                 'value'=>function($row){
                 if ($row['hbv1_hospcode'] == null) {
                   return '<i class="glyphicon glyphicon-remove">';
                 } else {
                   return $row['hbv1_hospcode'];
                 }
                 }
              ],
              //2เดือน

              [
               'label' => 'OPV เข็ม 1',
               'attribute' => 'opv1_hospcode',
               'format'=>'raw',
               'value'=>function($row){
               if ($row['opv1_hospcode'] == null) {
                 return '<i class="glyphicon glyphicon-remove">';
               } else {
                 return $row['opv1_hospcode'];
               }
               }
              ],
              [
              'label' => 'DTP เข็ม 1',
              'attribute' => 'dtp1_hospcode',
              'format'=>'raw',
              'value'=>function($row){
              if ($row['dtp1_hospcode'] == null) {
                return '<i class="glyphicon glyphicon-remove">';
              } else {
                return $row['dtp1_hospcode'];
              }
              }
              ],
              //4เดือน
              [
                'label' => 'HBV เข็ม 2',
                'attribute' => 'hbv1_hospcode',
                'format'=>'raw',
                'value'=>function($row){
                if ($row['hbv1_hospcode'] == null) {
                  return '<i class="glyphicon glyphicon-remove">';
                } else {
                  return $row['hbv1_hospcode'];
                }
                }
              ],
              [
              'label' => 'OPV เข็ม 2',
              'attribute' => 'opv2_hospcode',
              'format'=>'raw',
              'value'=>function($row){
              if ($row['opv2_hospcode'] == null) {
                return '<i class="glyphicon glyphicon-remove">';
              } else {
                return $row['opv2_hospcode'];
              }
              }
              ],
              [
              'label' => 'DTP เข็ม 2',
              'attribute' => 'dtp2_hospcode',
              'format'=>'raw',
              'value'=>function($row){
              if ($row['dtp2_hospcode'] == null) {
                return '<i class="glyphicon glyphicon-remove">';
              } else {
                return $row['dtp2_hospcode'];
              }
              }
              ],
              [
              'label' => 'IPV',
              'attribute' => 'ipv2_hospcode',
              'format'=>'raw',
              'value'=>function($row){
              if ($row['ipv2_hospcode'] == null) {
                return '<i class="glyphicon glyphicon-remove">';
              } else {
                return $row['ipv2_hospcode'];
              }
              }
              ],
              //6เดือน
              [
              'label' => 'HBV เข็ม 3',
              'attribute' => 'hbv3_hospcode',
              'format'=>'raw',
              'value'=>function($row){
              if ($row['hbv3_hospcode'] == null) {
                return '<i class="glyphicon glyphicon-remove">';
              } else {
                return $row['hbv3_hospcode'];
              }
              }
              ],
              [
              'label' => 'OPV เข็ม 3',
              'attribute' => 'opv3_hospcode',
              'format'=>'raw',
              'value'=>function($row){
              if ($row['opv3_hospcode'] == null) {
                return '<i class="glyphicon glyphicon-remove">';
              } else {
                return $row['opv3_hospcode'];
              }
              }
              ],
              [
              'label' => 'DTP เข็ม 3',
              'attribute' => 'dtp3_hospcode',
              'format'=>'raw',
              'value'=>function($row){
              if ($row['dtp3_hospcode'] == null) {
                return '<i class="glyphicon glyphicon-remove">';
              } else {
                return $row['dtp3_hospcode'];
              }
              }
              ],
              //9เดือน
              [
              'label' => 'MMR เข็ม 1',
              'attribute' => 'mmr1_hospcode',
              'format'=>'raw',
              'value'=>function($row){
              if ($row['mmr1_hospcode'] == null) {
                return '<i class="glyphicon glyphicon-remove">';
              } else {
                return $row['mmr1_hospcode'];
              }
              }
              ],
              //12เดือน
              [
              'label' => 'LA-JE1',
              'attribute' => 'je1_hospcode',
              'format'=>'raw',
              'value'=>function($row){
              if ($row['je1_hospcode'] == null) {
                return '<i class="glyphicon glyphicon-remove">';
              } else {
                return $row['je1_hospcode'];
              }
              }
              ],
              //18เดือน
              [
              'label' => 'DTP เข็ม 4',
              'attribute' => 'dtp4_hospcode',
              'format'=>'raw',
              'value'=>function($row){
              if ($row['dtp4_hospcode'] == null) {
                return '<i class="glyphicon glyphicon-remove">';
              } else {
                return $row['dtp4_hospcode'];
              }
              }
              ],
              [
              'label' => 'OPV เข็ม 4',
              'attribute' => 'opv4_hospcode',
              'format'=>'raw',
              'value'=>function($row){
              if ($row['opv4_hospcode'] == null) {
                return '<i class="glyphicon glyphicon-remove">';
              } else {
                return $row['opv4_hospcode'];
              }
              }
              ],

              //2.5ปี
              [
              'label' => 'MMR เข็ม 2',
              'attribute' => 'mmr2_hospcode',
              'format'=>'raw',
              'value'=>function($row){
              if ($row['mmr2_hospcode'] == null) {
                return '<i class="glyphicon glyphicon-remove">';
              } else {
                return $row['mmr2_hospcode'];
              }
            }
              ],
              [
              'label' => 'LA-JE2',
              'attribute' => 'je2_hospcode',
              'format'=>'raw',
              'value'=>function($row){
              if ($row['je2_hospcode'] == null) {
                return '<i class="glyphicon glyphicon-remove">';
              } else {
                return $row['je2_hospcode'];
              }
              }
              ],
              //4-6 ปี
              [
              'label' => 'DTP เข็ม 5',
              'attribute' => 'dtp5_hospcode',
              'format'=>'raw',
              'value'=>function($row){
              if ($row['dtp5_hospcode'] == null) {
                return '<i class="glyphicon glyphicon-remove">';
              } else {
                return $row['dtp5_hospcode'];
              }
              }
              ],
              [
              'label' => 'OPV เข็ม 5',
              'attribute' => 'opv5_hospcode',
              'format'=>'raw',
              'value'=>function($row){
              if ($row['opv5_hospcode'] == null) {
                return '<i class="glyphicon glyphicon-remove">';
              } else {
                return $row['opv5_hospcode'];
              }
              }
              ],

            ]
        ]);
        ?>
        </div>

</div>
</div>

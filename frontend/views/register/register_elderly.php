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
                'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> ทะเบียนผู้สูงอายุ</h3>'],
            'responsive'=>true,//ทำ responsive ตาราง

            'columns' => [
                //['class'=>'yii\grid\SerialColumn'],
                 [
                    'label' => 'รหัสหน่วยบริการ',
                    'attribute' => 'HOSPCODE'
                ],
                [
                    'label' => 'ชื่อ - นามสกุล',
                    'attribute' => 'fname'
                ],
                [
                   'label' => 'อายุ',
                   'attribute' => 'age_y'
                ],
                [
                   'label' => 'วันเกิด',
                   'attribute' => 'BIRTH'
                ],

              ]
            ]);
            ?>
        </div>

</div>
</div>

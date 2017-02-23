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
                'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> รายงานผู้ป่วยนอก 504 (คน)</h3>'],
            'responsive'=>true,//ทำ responsive ตาราง
            'columns' => [
                //['class'=>'yii\grid\SerialColumn'],
                 [
                    'label' => 'รหัสวินิจฉัย',
                    'attribute' => 'DIAGCODE'
                ],
                //  [
                //     'label' => 'รหัสกลุ่มโรค 504',
                //     'attribute' => 'code504'
                // ],
                [
                    'label' => 'กลุ่มโรค 504',
                    'attribute' => 'diseasethai'
                ],
                [
                    'label' => 'จำนวน',
                    'attribute' => 'total_pid'
                ],

            ]
        ]);
        ?>
        </div>
<!-- หมายเหตุ : <br>
    MR นับข้อมูลจากรหัสวัคซีน 073 ให้บริการตั้งแต่วันที่ 1 พ.ค. 2558 ถึง 30 ก.ย. 2558 <br>
    dTC นับข้อมูลจากรหัสวัคซีน 901 ให้บริการตั้งแต่วันที่ 1 ม.ค. 2558 ถึง 31 ก.ค. 2558<br>
    FLU นับข้อมูลจากรหัสวัคซีน 815 ให้บริการตั้งแต่วันที่ 1 พ.ค. 2558 ถึง 31 ส.ค. 2558<br> -->
</div>
</div>

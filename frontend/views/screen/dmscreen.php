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
                'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> รายชื่อกลุ่มเป้าหมายเบาหวาน 15 ปีขึ้นไปที่ได้รับบริการการคัดกรอง</h3>'],
            'responsive'=>true,//ทำ responsive ตาราง
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
                   'attribute' => 'age_y'
               ],
               [
                   'label' => 'บ้านเลขที่',
                   'attribute' => 'HOUSE'
               ],
               [
                   'label' => 'หมู่ที่',
                   'attribute' => 'VILLAGE'
               ],
               [
                   'label' => 'ตำบล',
                   'attribute' => 'tambonname'
               ],
               [
                   'label' => 'วันที่คัดกรอง',
                   'attribute' => 'date_screen'
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

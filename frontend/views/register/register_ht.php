<?php
use kartik\grid\GridView;
use miloschuman\highcharts\Highcharts;
use yii\helpers\Html;

?>
<div class="content body">
<div class="row">

    <div class="col-md-12">
        <?php
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'panel' => [
                'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> ทะเบียนผู้ป่วยความดันโลหิตสูง</h3>'],
            'responsive'=>true,//ทำ responsive ตาราง

            'columns' => [
                //['class'=>'yii\grid\SerialColumn'],
                 [
                    'label' => 'รหัสหน่วยบริการ',
                    'attribute' => 'p_hospcode'
                ],
                 [
                    'label' => 'เลขบัตรประชาชน',
                    'attribute' => 'cid'
                ],
                [
                    'label' => 'รหัสบุคคล',
                    'attribute' => 'NAME'
                ],
                [
                    'label' => 'ชื่อ - นามสกุล',
                    'attribute' => 'LNAME'
                ],

                [
                   'label' => 'อายุ',
                   'attribute' => 'age_y'
                ],
                [
                   'label' => 'อายุที่ป่วย',
                   'attribute' => 'age_y_dx'
                ],
                [
                   'label' => 'เพศ',
                   'attribute' => 'sex'
                ],

                [
                   'label' => 'วันที่เริ่มป่วย',
                   'attribute' => 'date_dx'
                ],
                [
                   'label' => 'หน่วยบริการที่ระบุ',
                   'attribute' => 'hosp_dx'
                ],
                [
                   'label' => 'หน่วยบริการที่บันทึก',
                   'attribute' => 'input_hosp'
                ],
                // [
                //    'label' => 'typearea',
                //    'attribute' => 'p_typearea'
                // ],
              ]
            ]);
            ?>
        </div>

</div>
</div>

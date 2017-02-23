<?php
use kartik\grid\GridView;
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
                'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> รายงานผู้ป่วยนอก 504 (ครั้ง)</h3>'],
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
                    'attribute' => 'total_seq'
                ],

            ]
        ]);
        ?>
        </div>

</div>
</div>

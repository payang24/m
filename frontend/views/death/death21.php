<?php
use kartik\grid\GridView;
use yii\helpers\Html;
//var_dump($sumscreen);
$titles = ' รายงานข้อมูลการตาย 21 กลุ่มโรค';
$this->title = $titles;
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="content body">
<div class="row">

    <div class="col-md-12">
        <?php
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'panel' => [
                'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> รายงานข้อมูลการตาย 21 กลุ่มโรค </h3>',
                'type' => 'success',
                'footer' => false],

            'responsive'=>true,//ทำ responsive ตาราง

            'columns' => [
                //['class'=>'yii\grid\SerialColumn'],
                [
                    'label' => 'ปีงบประมาณ',
                    'attribute' => 'DYEAR',
                ],
                [
                    'label' => 'รหัสกลุ่ม',
                    'attribute' => 'diaggroup',
                ],
                [
                    'label' => 'รหัสโรค',
                    'attribute' => 'NCAUSE',
                ],
                [
                    'label' => 'โรค',
                    'attribute' => 'diagtname',
                ],
                [
                    'label' => 'จำนวน',
                    'attribute' => 'total_NCAUSE',
                ],
            ]
        ]);
        ?>
        </div>

</div>
</div>

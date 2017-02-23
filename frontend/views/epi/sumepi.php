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
                'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> รายงานการสร้างเสริมภูมิคุ้มกันโรคเด็ก </h3>'],
            'responsive'=>true,//ทำ responsive ตาราง
            'columns' => [
                //['class'=>'yii\grid\SerialColumn'],
                 [
                    'label' => 'รหัสหน่วยบริการ',
                    'attribute' => 'hospcode'
                ],
                 [
                    'label' => 'หน่วยบริการ',
                    'attribute' => 'hosname'
                ],
                [
                    'label' => 'รวมคน',
                    'attribute' => 'total',
                    'format'=>'raw',
                    'value'=>function($hospcode){
                    return Html::a($hospcode['total'], ['epi/epi', 'hospcode'=>$hospcode['hospcode']]);
                  }
                ],
              ],
            ]);
        ?>
        </div>
</div>
</div>

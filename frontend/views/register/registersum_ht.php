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
                'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> รายงานทะเบียนผู้ป่วยความดันโลหิตสูง </h3>'],
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
                   return Html::a($hospcode['total'], ['register/register_ht', 'hospcode'=>$hospcode['hospcode']]);
                  }
                ],
              ],
            ]);
        ?>
        </div>
</div>
</div>

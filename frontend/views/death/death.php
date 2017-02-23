<?php
use kartik\grid\GridView;
use yii\helpers\Html;
//var_dump($sumscreen);
$titles = ' รายงานข้อมูลการตาย';
$this->title = $titles;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class='well'>
    <form method="POST">
      <div class="row">
          <div class="col-xs-1 col-sm-1 col-md-1" ><b>เลือกปี</b></div>
          <div class="col-xs-2 col-sm-2 col-md-3">
            <?= Html::dropDownList('year',$year,['2558'=>'2558','2557'=>'2557','2556'=>'2556'],['class'=>'form-control']);?>
          </div>

          <div class="col-xs-4 col-sm-4 col-md-2">
              <button class='btn btn-danger'>ประมวลผล</button>
          </div>

      </div>

    </form>
</div>
<div class="content body">
<div class="row">

    <div class="col-md-12">
        <?php
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'panel' => [
                'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> รายงานข้อมูลการตาย</h3>',
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
                [
                    'label' => 'ร้อยละ',
                    'attribute' => 'percen',
                ],
            ]
        ]);
        ?>
        </div>

</div>
</div>

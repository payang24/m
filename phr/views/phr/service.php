<?php
use kartik\grid\GridView;
use yii\helpers\Html;
$titles = 'Personal Health Recode';
$this->title = $titles;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class='well'>
    <form method="POST">
      <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
    <label class="sr-only" for="exampleInputAmount">กรุณาใส่ข้อมูล</label>
    <div class="input-group">
      <div class="input-group-addon">เลขบัตรประจำตัวประชาชน</div>
      <input type="text" class="form-control" id="exampleInputAmount" placeholder="กรุณาใส่ข้อมูล">
    </div>
  </div>
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
                'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> ข้อมูลบริการสุขภาพ </h3>',
                'type' => 'success',
                'footer' => false],
            'responsive'=>true,//ทำ responsive ตาราง

            'columns' => [
                //['class'=>'yii\grid\SerialColumn'],
                [
                    'label' => 'หน่วยบริการ',
                    'attribute' => 'hospcode',
                ],
                // [
                //     'label' => 'รหัสกลุ่ม',
                //     'attribute' => 'pid',
                // ],
                // [
                //     'label' => 'รหัสโรค',
                //     'attribute' => 'SEQ',
                // ],
                [
                    'label' => 'สิทธิ',
                    'attribute' => 'INSTYPE',
                ],
                [
                    'label' => 'อุณภูมิ',
                    'attribute' => 'BTEMP',
                ],
                [
                    'label' => 'ชีพจรครั้ง/นาที',
                    'attribute' => 'PR',
                ],
                [
                    'label' => 'หายใจครั้ง/นาที',
                    'attribute' => 'RR',
                ],
                [
                    'label' => 'ความดัน',
                    'attribute' => 'BP',
                ],
                [
                    'label' => 'วันที่รับบริการ',
                    'attribute' => 'DATE_SERV',
                ],
            ]
        ]);
        ?>
        </div>

</div>
</div>

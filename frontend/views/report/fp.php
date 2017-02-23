<?php
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use app\models\Years;
use yii\widgets\Pjax;
use kartik\date\DatePicker;

$titles = 'รายงาน';
$this->title = $titles;
$this->params['breadcrumbs'][] = $this->title;
?>

<div class='well'>
    <form method="POST">
        <div class="row">
            <div class="col-xs-2 col-sm-2 col-md-3">
              <?php
                echo DatePicker::widget([
                  'language'=> 'th',
                    'name' => 'date1',
                    'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                    'value' => $date1,
                    'pluginOptions' => [
                      'autoclose'=>true,
                      'format' => 'yyyy-mm-dd'
                    ],
                    'options'=>['class'=>'form-control','placeholder'=>'ช่วงวันที่..']
                ]);
                ?>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-3">
              <?php
                echo DatePicker::widget([
                  'language'=> 'th',
                    'name' => 'date2',
                    'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                    'value' => $date2,
                    'pluginOptions' => [
                      'autoclose'=>true,
                      'format' => 'yyyy-mm-dd'
                    ],
                    'options'=>['class'=>'form-control','placeholder'=>'ถึงวันที่ ..']
                ]);
                ?>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-2">
                <button class='btn btn-danger'>ประมวลผล</button>
            </div>

        </div>

    </form>
</div>
<div class="row">
    <div class="col-md-12">
        <?php Pjax::begin()?>
<?php
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'panel' => [
        'heading' => '<b class="tsb f24p">'
        . '<i class="glyphicon glyphicon-list"></i> ' . $titles . '</b>',
        'type' => 'success',

        'footer' => false
    ],
    'responsive' => true,
    'hover' => true,
    'striped' => FALSE,
    'exportConfig' => [
        GridView::EXCEL => [],
    ],
    'toolbar' => [
        '{export}',
        '{toggleData}'=>false
    ],
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        [
            'label' => 'อำเภอ',
            'attribute' => 'distname',
        ],
        [
            'label' => 'ห่วงอนามัย',
            'attribute' => 'fp3',
        ],
        [
            'label' => 'ยาเม็ดคุมกำเนิด',
            'attribute' => 'fp1',
        ],
        [
            'label' => 'หมันชาย',
            'attribute' => 'fp7',
        ],
        [
            'label' => 'หมันหญิง',
            'attribute' => 'fp6',
        ],
        [
            'label' => 'ยาฉีดคุมกำเนิด',
            'attribute' => 'fp2',
        ],
        [
            'label' => 'ยาฝังคุมกำเนิด',
            'attribute' => 'fp4',
        ],
        [
            'label' => 'ถุงยางอนามัย',
            'attribute' => 'fp5',
        ],
    ],
]);
?>
        <?php Pjax::end() ?>
    </div>
</div>

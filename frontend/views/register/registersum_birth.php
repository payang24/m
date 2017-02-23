<?php
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use app\models\Years;
use yii\widgets\Pjax;
use kartik\date\DatePicker;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$titles = 'ทะเบียนการเกิด';
$this->title = $titles;
$this->params['breadcrumbs'][] = $this->title;

?>
 <!-- <?php var_dump($date_b,$date_e,$sql) ; ?> -->
<div class='well'>
    <div class="row">
          <?php $form = ActiveForm::begin([
            'id' => 'active-form', // ชื่อฟอร์ม
            'options' => [
              'class' => 'form-horizontal', // class bootstarap
              ]
            ]);
            ?>

              <div class="col-xs-2 col-sm-2 col-md-3">
                <?php
                echo DatePicker::widget([
                  'language'=> 'th',
                  'name' => 'date_b',
                  'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                  'value' => $date_b,
                  'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'yyyy-mm-dd'
                      ],
                  'options'=>['class'=>'form-control','placeholder'=>'ช่วงวันที่..']
                    ]
                  );
                ?>
              </div>

              <div class="col-xs-2 col-sm-2 col-md-3">
                <?php
                echo DatePicker::widget([
                  'language'=> 'th',
                  'name' => 'date_e',
                  'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                  'value' => $date_e,
                  'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'yyyy-mm-dd'
                      ],
                  'options'=>['class'=>'form-control','placeholder'=>'ถึงวันที่ ..']
                    ]
                  );
                ?>
              </div>

              <div class="col-xs-4 col-sm-4 col-md-2">
                <button class='btn btn-danger'>ประมวลผล</button>
              </div>


              <?php ActiveForm::end();?>
          </div>
        </div>



<div class="row">

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
            'label' => 'HOSPCODE',
            'attribute' => 'HOSPCODE',
        ],
        [
            'label' => 'หน่วยบริการ',
            'attribute' => 'hosname',
        ],
        [
            'label' => 'จำนวน',
            'attribute' => 'total',
        ],

    ],
]);
?>

    </div>
</div>

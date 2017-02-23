<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\jui\DatePicker ;

/* @var $this yii\web\View */
/* @var $model frontend\models\Carservice */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="carservice-form">

    <?php $form = ActiveForm::begin([
      'layout' => 'horizontal']); ?>

    <?= $form->field($model, 'car_id')->radioList([

      // <i class="fa fa-user"></i>
      'กข 2201 สระแก้ว'=>'รถตู้ กข 2201 สระแก้ว',
      'นข 2241 สระแก้ว'=>'รถตู้ นข 2241 สระแก้ว',
      'ฮธ 1782 กรุงเทพมหานคร'=>'รถตู้ ฮธ 1782 กรุงเทพมหานคร',
      'นข 2781 กรุงเทพมหานคร'=>'รถตู้ นข 2781 กรุงเทพมหานคร',
      'กง 4795 สระแก้ว'=>'รถตู้ กง 4795 สระแก้ว',
      'ดค 2201 สระแก้ว'=>'รถกระบะ 4 ประตู ดค 2201 สระแก้ว',
      'กง 9554 สระแก้ว'=>'รถกระบะ 4 ประตูกง 9554 สระแก้ว',
      'พท 9129 สระแก้ว'=>'รถกระบะ พท 9129 สระแก้ว',
      'บต 410 สระแก้ว'=>'รถกระบะ บต 410 สระแก้ว',
      'บต 411 สระแก้ว'=>'รถกระบะ บต 411 สระแก้ว',
      'กข 7375 สระแก้ว'=>'กข 7375 สระแก้ว',
      'กค 9484 สระแก้ว'=>'กค 9484 สระแก้ว']) ?>
      <?= $form->field($model, 'date_service_s')->widget(DatePicker::classname(), [
              'language' => 'th',
              'dateFormat' => 'yyyy-MM-dd',
              'clientOptions'=>[
                'changeMonth'=>true,
                'changeYear'=>true,
              ],
              'options'=>['class'=>'form-control']
            ])  ?>

      <?= $form->field($model, 'date_service_e')->widget(DatePicker::classname(), [
                'language' => 'th',
                'dateFormat' => 'yyyy-MM-dd',
                'clientOptions'=>[
                  'changeMonth'=>true,
                  'changeYear'=>true,
                ],
                'options'=>['class'=>'form-control']
              ])  ?>
    <?= $form->field($model, 'areatype')->radioList(['ในจังหวัด'=>'ในจังหวัด','ต่างจังหวัด'=>'ต่างจังหวัด']) ?>
    
    <?= $form->field($model, 'markers')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_request')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'provider')->dropDownList([
      'นายอำนาจ อำนรรฆ' => 'นายอำนาจ อำนรรฆ',
      'นายประเทือง จินดาทิพย์' => 'นายประเทือง จินดาทิพย์',
      'นายพงศกร ช่างต่อ' => 'นายพงศกร ช่างต่อ',
      'นายจิระพงศ์ ไสยเวช' => 'นายจิระพงศ์ ไสยเวช',
      'นายวรรณเศรษฐ์ นวนสระน้อย' => 'นายวรรณเศรษฐ์ นวนสระน้อย',
      'นายเอกชัย ปัทธิสม' => 'นายเอกชัย ปัทธิสม'
      ]) ?>

    <?= $form->field($model, 'orther')->textInput(['rows' => 6]) ?>

    <div class="form-group " >
      <div class="col-sm-offset-5 col-sm-10">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
      </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>

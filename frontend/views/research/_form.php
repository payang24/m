<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\jui\DatePicker ;
/* @var $this yii\web\View */
/* @var $model frontend\models\Research */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="research-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'researchname')->textInput(['maxlength' => true]) ?>
    <div class="col-sm-12 col-md-12">
    <?= $form->field($model, 'researchtype')->radioList([
      'การวิจัยทางวิทยาศาสตร์ธรรมชาติ'=>'การวิจัยทางวิทยาศาสตร์ธรรมชาติ (Natural Science)',
      'การวิจัยทางสังคมศาสตร์'=>'การวิจัยทางสังคมศาสตร์ (Social Science)',
      'การวิจัยพื้นฐาน'=>'การวิจัยพื้นฐาน (Basic or Pure Research)',
      'การวิจัยประยุกต์'=>'การวิจัยประยุกต์ (Applied Research)',
      'การวิจัยเชิงปฏิบัติ'=>'การวิจัยเชิงปฏิบัติ (Action Research)',
      'การวิจัยเอกสาร'=>'การวิจัยเอกสาร (Documentary research)',
      'การวิจัยสนาม'=>'การวิจัยสนาม (Field research)',
      'การวิจัยเชิงพรรณนา'=>'การวิจัยเชิงพรรณนา (Descriptive research)',
      'การวิจัยเชิงทดลอง'=>'การวิจัยเชิงทดลอง (Experimental Research)',
      'การวิจัยเชิงอธิบาย'=>'การวิจัยเชิงอธิบาย (Explainatory research)',
      'การวิจัยเชิงปริมาณ'=>'การวิจัยเชิงปริมาณ (Quantitative research)',
      'การวิจัยเชิงคุณภาพ'=>'การวิจัยเชิงพรรณนา (Qualitative research)',
      'การวิจัยแบบตัดขวาง'=>'การวิจัยแบบตัดขวาง (Cross - sectional research)',
      'การวิจัยระยะยาว'=>'การวิจัยระยะยาว (Longitudinal study)',
      'การวิจัยกรณีศึกษา'=>'การวิจัยกรณีศึกษา (Case Study Research)']) ?>


    <?= $form->field($model, 'provider')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_sever')->widget(DatePicker::classname(), [
        'language' => 'th',
        'dateFormat' => 'yyyy-MM-dd',
        'clientOptions'=>[
          'changeMonth'=>true,
          'changeYear'=>true,
        ],
        'options'=>['class'=>'form-control']
      ]) ?>

    <?= $form->field($model, 'abstract')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'attachment')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
      <div class="col-sm-offset-5 col-sm-10">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
      </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>

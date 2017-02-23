<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CarserviceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="carservice-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= //$form->field($model, 'id') ?>

    <?= $form->field($model, 'car_id') ?>

    <?= $form->field($model, 'date_service_s') ?>

    <?= $form->field($model, 'date_service_e') ?>

    <?= $form->field($model, 'provider') ?>

    <?= $form->field($model, 'user_request') ?>

    <?php  echo $form->field($model, 'areatype') ?>

    <?php // echo $form->field($model, 'orther') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

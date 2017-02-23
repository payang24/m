<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ProductSerch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'date_serve') ?>

    <?= $form->field($model, 'product_list') ?>

    <?= $form->field($model, 'unit') ?>

    <?= $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'cost') ?>

    <?php // echo $form->field($model, 'lucre') ?>

    <?php // echo $form->field($model, 'remain') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'notes') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

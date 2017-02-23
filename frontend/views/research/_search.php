<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ResearchSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="research-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'researchname') ?>

    <?= $form->field($model, 'researchtype') ?>

    <?= $form->field($model, 'provider') ?>

    <?= $form->field($model, 'abstract') ?>

    <?= $form->field($model, 'attachment') ?>

    <?php // echo $form->field($model, 'date_sever') ?>

    <?php // echo $form->field($model, 'content') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

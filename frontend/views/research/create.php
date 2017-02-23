<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Research */

$this->title = 'Create Research';
$this->params['breadcrumbs'][] = ['label' => 'Researches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="research-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

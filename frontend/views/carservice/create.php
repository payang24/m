<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Carservice */

$this->title = 'Create Carservice';
$this->params['breadcrumbs'][] = ['label' => 'Carservices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carservice-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

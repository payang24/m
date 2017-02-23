<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ResearchSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ผลงานวิจัย';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="research-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Research', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'date_sever',
            'researchname',
            'researchtype',
            'provider',
            'abstract:ntext',
            // 'content:ntext',

            [
           'class' => 'yii\grid\ActionColumn',
           'options'=>['style'=>'width:122px;'],
           'buttonOptions'=>['class'=>'btn btn-default'],
           'template'=>'<div class="btn-group btn-group-sm text-center" role="group"> {view} {update} {delete} </div>'
         ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>

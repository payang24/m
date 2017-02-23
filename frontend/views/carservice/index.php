<?php

use yii\helpers\Html;
// use yii\grid\GridView;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CarserviceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Carservices';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carservice-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
      'dataProvider' => $dataProvider2,
        'responsive'=>true,
      'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'car_id',
        '1','2','3','4','5','6','7','8','9','10',
        '11','12','13','14','15','16','17','18','19','20',
        '21','22','23','24','25','26','27','28','29','30'
      ],
    ]); ?>

</div>
<p>
    <?= Html::a('Create Carservice', ['create'], ['class' => 'btn btn-success']) ?>
</p>
 <p><h3>รายละเอียด</h3></p>
<?php Pjax::begin(); ?>
  <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'car_id',
            'date_service_s',
            'provider',
            'user_request',
            'areatype',
            'markers',
            // 'orther',
            [
           'class' => 'yii\grid\ActionColumn',
           'options'=>['style'=>'width:128px;'],
           'buttonOptions'=>['class'=>'btn btn-default'],
           'template'=>'<div class="btn-group btn-group-sm text-center" role="group"> {view} {update} {delete} </div>'
         ],
        ],
    ]); ?>
<?php Pjax::end(); ?>

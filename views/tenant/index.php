<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Category;
use app\models\Zone;
use app\models\Floorlvl;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TenantSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tenants';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tenant-index">

    <?php $session=Yii::$app->session;
            echo $session->getFlash('error');
    ?>
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tenant', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo Html::a('Display Search Form','#',['class'=>'search-button']); ?>

    <div class="search-form" style="display:none">
        <?= $this->render('_search', [
            'model' => $searchModel,
        ]) ?>
    </div><!-- search-form -->
    <br/>
    <br/>

    <?= GridView::widget([
        'id' => 'tenant-grid',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'captionOptions' => false,
        'columns' => [

            'tenantId',
            'name',
            'lotNo',
            [
                'label' => 'Zone',
                'value' => function($model){
                    return $model->zone->zoneName;},
                'attribute' => 'zoneId',
                'filter'=>ArrayHelper::map(Zone::find()->all(), 'zoneId', 'zoneName'),
            ],

            [
                'label' => 'Floor Level',
                'value' => function($model){
                    return $model->floor->level;},
                'attribute' => 'floorId',
                'filter'=>ArrayHelper::map(Floorlvl::find()->all(), 'floorId', 'level'),
            ],

            [
                'label' => 'Category',
                'value' => function($model){
                    return $model->category->categoryName;},
                'attribute' => 'categoryId',
                'filter'=>ArrayHelper::map(Category::find()->all(), 'categoryId', 'categoryDesc'),
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

<?php
$script = <<< JS
$('.search-button').click(function(){
    $('.search-form').toggle();
    if($('.search-button').text()=='Display Search Form')
        $('.search-button').text('Hide Search Form');
    else
        $('.search-button').text('Display Search Form');
    return false;
});

JS;
$this->registerJs($script);
?>

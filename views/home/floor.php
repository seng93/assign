<?php
use yii\helpers\Html;
use yii\helpers\url;
use yii\grid\GridView;
use app\components\GroupedListWidget;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<div class="Home-index">
    <?= $this->render('index') ?>
    <?= Html::tag('h2', 'Floor Levels', ['class' => "text-warning"]) ?>
</div>  

<div class="nav_div" id = "Floor">
    <?= GroupedListWidget::widget([
        'models' => $tenants,
        'groups' => $floors,
        'groupBy' => 'floorId',
        'groupName' => 'level',     
   	]) ?>
</div>

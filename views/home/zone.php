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
    <?= Html::tag('h2', 'Zones', ['class' => "text-info"]) ?>
</div>  

<div class="nav_div" id = "Zone">
    <?= GroupedListWidget::widget([
        'models' => $tenants,
        'groups' => $zones,
        'groupBy' => 'zoneId',
        'groupName' => 'zoneName',     
   	]) ?>
</div>
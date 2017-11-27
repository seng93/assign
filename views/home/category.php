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
    <?= Html::tag('h2', 'Categories', ['class' => "text-danger"]) ?>
</div>  

<div class="nav_div" id = "Category">
    <?= GroupedListWidget::widget([
        'models' => $tenants,
        'groups' => $categories,
        'groupBy' => 'categoryId',
        'groupName' => 'categoryDesc',     
   	]) ?>
</div>

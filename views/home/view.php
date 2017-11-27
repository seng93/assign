<?php

use yii\helpers\Html;
use app\components\ListWidget;
/* @var $this yii\web\View */
/* @var $model app\models\Category */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Directory', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="view-tenant-detail-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= ListWidget::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'lotNo',
            [
                'label' => 'Zone',
                'value' => $model->zone->zoneName,
            ],

            [
                'label' => 'Floor Level',
                'value' => $model->floor->level,
            ],

            [
                'label' => 'Category',
                'value' => $model->category->categoryDesc,
            ],

        ],
    ]) ?>

</div>

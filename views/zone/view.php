<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Zone */

$this->title = $model->zoneName;
$this->params['breadcrumbs'][] = ['label' => 'Zones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zone-view">

    <h1>Zone <?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->zoneId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->zoneId], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'zoneId',
            'zoneName',
        ],
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Floorlvl */

$this->title = $model->level;
$this->params['breadcrumbs'][] = ['label' => 'Floor Levels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="floorlvl-view">

    <h1> Floor Level: <?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->floorId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->floorId], [
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
            'floorId',
            'level',
        ],
    ]) ?>

</div>

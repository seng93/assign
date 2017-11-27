<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Floorlvl */

$this->title = 'Update Floor Level: ' . $model->level;
$this->params['breadcrumbs'][] = ['label' => 'Floor Levels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->floorId, 'url' => ['view', 'id' => $model->floorId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="floorlvl-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

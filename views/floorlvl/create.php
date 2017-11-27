<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Floorlvl */

$this->title = 'Create Floorlvl';
$this->params['breadcrumbs'][] = ['label' => 'Floor Levels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="floorlvl-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

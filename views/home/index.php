<?php

use yii\helpers\Html;   

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Directory';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="selection">
    <h1><?= Html::encode($this->title) ?></h1>
    <span>
    <?= Html::a('View by Zone',['zone'],['class' => "btn btn-info"] ); ?>
    
    <?= Html::a('View by Floor',['floor'],['class' => "btn btn-warning"] ); ?> 
    
    <?= Html::a('View by Category',['category'],['class' => "btn btn-danger"] ); ?>
    </span>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

</div>


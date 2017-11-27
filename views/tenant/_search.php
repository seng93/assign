<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Zone;
use app\models\Floorlvl;
use app\models\Category;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\TenantSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tenant-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'tenantId') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'lotNo') ?>

    <?= $form->field($model, 'zoneId')->dropDownList(
        ArrayHelper::map(Zone::find()->all(), 'zoneId', 'zoneName'),
        ['prompt'=>'Select Zone'])->label('Zone') ?>

    <?= $form->field($model, 'floorId')->dropDownList(
        ArrayHelper::map(Floorlvl::find()->all(), 'floorId', 'level'),
        ['prompt'=>'Select Level'])->label('Floor Level') ?>

    <?= $form->field($model, 'categoryId')->dropDownList(
        ArrayHelper::map(Category::find()->all(), 'categoryId', 'categoryDesc'),
        ['prompt'=>'Select Category'])->label('Category') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

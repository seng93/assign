<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Zone;
use app\models\Floorlvl;
use app\models\Category;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Tenant */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tenant-form">

    <?php $form = ActiveForm::begin(['enableClientValidation'=>false]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lotNo',['enableClientValidation'=>false])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zoneId')->dropDownList(
        ArrayHelper::map(Zone::find()->all(), 'zoneId', 'zoneName'),
        ['prompt'=>'Select Zone'])->label('Zone') ?>

    <?= $form->field($model, 'floorId')->dropDownList(
        ArrayHelper::map(Floorlvl::find()->all(), 'floorId', 'level'),
        ['prompt'=>'Select Level'])->label('Floor Level') ?>

    <?= $form->field($model, 'categoryId')->dropDownList(
        Category::find()->select(['categoryDesc','categoryId'])->indexBy('categoryId')->column(),
        ['prompt'=>'Select Category'])->label('Category') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

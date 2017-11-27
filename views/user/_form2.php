<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= Yii::$app->session->getFlash('error')?>
    <?= $form->field($model, 'oldPassword')->passwordInput(['maxlength' => true,'value'=>'']) ?>

    <?= $form->field($model, 'newPass')->passwordInput(['maxlength' => true, 'value'=>'']) ?>

    <?= $form->field($model, 'retypePass')->passwordInput(['maxlength' => true, 'value'=>'']) ?>

    <?= $form->field($model, 'role')->dropDownList(['admin'=>'Admin', 'editor'=>'Editor'],
        ['prompt'=>'Select Role']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

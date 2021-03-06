<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FloorlvlSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Floor Levels';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="floorlvl-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php $admin = Yii::$app->user->identity ?>
    <?php print_r($admin);
    die();// echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php if(Yii::$app->user->can('manageCategory'))
         echo Html::a('Create Floor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'floorId',
            'level',

            [
                'class' => 'yii\grid\ActionColumn',
                'visibleButtons' => [
                    'update' => Yii::$app->user->can('manageCategory'),
                    'delete' => Yii::$app->user->can('manageCategory'),
                ]
            ],
        ],
    ]); ?>
</div>

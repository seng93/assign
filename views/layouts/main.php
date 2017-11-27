<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Mega Shopping Mall',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    if(!Yii::$app->user->isGuest && Yii::$app->user->can('admin')){
    $menuItem = ['label' => 'Manage Selection', 
                'items' => [
                    ['label' => 'Manage Users', 'url' => ['/user/index']],
                    ['label' => 'Manage Tenant', 'url' => ['/tenant/index']],
                    ['label' => 'Manage Zone', 'url' => ['/zone/index']],
                    ['label' => 'Manage Floor Level', 'url' => ['/floorlvl/index']],
                    ['label' => 'Manage Category', 'url' => ['/category/index']],
                ]];
    }else if (!Yii::$app->user->isGuest && Yii::$app->user->can('editor')){
    $menuItem = ['label' => 'Manage Selection', 
                'items' => [
                    ['label' => 'Manage Tenant', 'url' => ['/tenant/index']],
                    ['label' => 'View Zone', 'url' => ['/zone/index']],
                    ['label' => 'View Floor Level', 'url' => ['/floorlvl/index']],
                    ['label' => 'View Category', 'url' => ['/category/index']],
                ]];
    }else
    {
        $menuItem = '';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => Yii::$app->homeUrl],
            ['label' => 'Directory', 'url' => ['/home/index']],
            $menuItem,
            Yii::$app->user->isGuest ? '' : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left text-muted">&copy; <?= date('Y')?> Mega Shopping Mall. All Right Reserved.</p>

        <p class="pull-right text-muted"><?= "Open Daily: 10am-10pm" ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

<style>
.dropdown:hover .dropdown-menu {
    display: block;
    color: white;
    background-color: rgb(34,34,34);
}
.dropdown-menu li a{
    color: white;
    background-color: rgb(34,34,34);
}

</style>
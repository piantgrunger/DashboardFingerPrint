<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

use hscstudio\mimin\components\Mimin;

AppAsset::register($this);
$menu= [
    
    ['label' =>'Master' ,'url' =>'#' , 'items'=> [
    ['label' => 'Capaian', 'url' => ['/capaian/index']],
    ['label' => 'Bahasa', 'url' => ['/bahasa/index']],
    
    ],
    
    
],
['label' => 'Capaian Pembelajaran', 'url' => ['/capaian-pembelajaran/index']],

];
if (!Yii::$app->user->isGuest) {
    $menu1= [['label' =>Yii::$app->user->identity->username . ' (Log Out) ' ,'url' =>['/site/logout'],'linkOptions'=>['data-method'=>'POST']]];
}
$menu = Mimin::filterMenu($menu);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
     <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>

    <div class="wrap">
        <?php
        NavBar::begin([
            'brandLabel' => '<img src="http://ctrl.uinsby.ac.id/assets/images/uinsa.png" class="pull-left" width=50 height=62>'.' SKPI UINSA',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-default ',
            ],
        ]);







        if (!yii::$app->user->isGuest) {
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-left'],
                'items' => $menu,
                ]);
            echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => $menu1,
            ]);
        }
     
        NavBar::end();
        ?>
       



        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; PUSTIPD <?= date('Y') ?></p>

            <p class="pull-right">Universitas Islam Negeri Sunan Ampel</p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>

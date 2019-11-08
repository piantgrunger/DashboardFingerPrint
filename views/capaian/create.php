<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Capaian */

$this->title = Yii::t('app', 'Capaian Baru');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Capaian'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="capaian-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

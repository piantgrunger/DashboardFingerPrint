<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CapaianPembelajaran */

$this->title = Yii::t('app', 'Capaian Pembelajaran Baru');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Capaian Pembelajaran'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="capaian-pembelajaran-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    'deskripsi' =>$deskripsi

    ]) ?>

</div>

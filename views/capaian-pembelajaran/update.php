<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CapaianPembelajaran */

$this->title = Yii::t('app', 'Update Capaian Pembelajaran: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Capaian Pembelajaran'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="capaian-pembelajaran-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
      'model' => $model,
      'deskripsi' =>$deskripsi
    ]) ?>

</div>

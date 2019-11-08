<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Capaian */

$this->title = Yii::t('app', 'Capaian: {name}', [
    'name' => $model->kode_capaian,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Capaian'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kode_capaian, 'url' => ['view', 'id' => $model->kode_capaian]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="capaian-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

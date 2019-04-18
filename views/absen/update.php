<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Absen */

$this->title = 'Update Absen: ' . $model->nip;
$this->params['breadcrumbs'][] = ['label' => 'Absen', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nip, 'url' => ['view', 'id' => $model->nip]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="absen-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

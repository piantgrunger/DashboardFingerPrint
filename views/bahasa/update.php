<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Bahasa */

$this->title = Yii::t('app', 'Bahasa: {name}', [
    'name' => $model->id_bahasa,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bahasa'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_bahasa, 'url' => ['view', 'id' => $model->id_bahasa]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="bahasa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

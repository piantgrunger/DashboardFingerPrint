<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Ijin */

$this->title = Yii::t('app', 'Ijin Baru');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ijin'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ijin-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_ijin', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Capaian */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="capaian-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kode_capaian')->textInput() ?>

    <?= $form->field($model, 'nama_capaian')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

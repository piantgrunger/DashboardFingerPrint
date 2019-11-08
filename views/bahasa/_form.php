<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Bahasa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bahasa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_bahasa')->textInput() ?>

    <?= $form->field($model, 'bahasa')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

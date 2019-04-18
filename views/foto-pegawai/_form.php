<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FotoPegawai */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="foto-pegawai-form">

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        <?= $form->errorSummary($model); ?> <!-- ADDED HERE -->


   

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'nip')->textInput(['maxlength' => true]) ?>


    <?= '<img src="data:image/jpeg;base64,'.base64_encode($model->foto).'" width="200" height="250" />'?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

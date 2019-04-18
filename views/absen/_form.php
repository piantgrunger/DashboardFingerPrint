<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
// The controller action that will render the list
$url = \yii\helpers\Url::to(['nip-list']);
 
// The widget

use yii\web\JsExpression;
use app\models\Pegawai;
 
// Get the initial city description
$Desc = empty($model->nip) ? '' : $model->nip." - ".Pegawai::find()->where(['nip'=>$model->nip])->one()->nama;



/* @var $this yii\web\View */
/* @var $model app\models\Absen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="absen-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nip') ->widget(Select2::classname(), [
    'initValueText' => $Desc, // set the initial display text
    'options' => ['placeholder' => 'Cari NIP Pegawai ...'],
'pluginOptions' => [
    'allowClear' => true,
    'minimumInputLength' => 4,
    'language' => [
        'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
    ],
    'ajax' => [
        'url' => $url,
        'dataType' => 'json',
        'data' => new JsExpression('function(params) { return {q:params.term}; }')
    ],
    'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
    'templateResult' => new JsExpression('function(city) { return city.text; }'),
    'templateSelection' => new JsExpression('function (city) { return city.text; }'),
],
]); ?>

    <?= $form->field($model, 'jam_masuk')->textInput() ?>

    <?= $form->field($model, 'jam_keluar')->textInput() ?>

    <?= $form->field($model, 'absen_datang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'absen_keluar')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

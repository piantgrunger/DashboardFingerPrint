<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FotoPegawai */
/* @var $form yii\widgets\ActiveForm */
use yii\web\JsExpression;
use app\models\Pegawai;
use kartik\select2\Select2;
$url = \yii\helpers\Url::to(['absen/nip-list']);
 
// Get the initial city description
$Desc = empty($model->nip) ? '' : $model->nip." - ".Pegawai::find()->where(['nip'=>$model->nip])->one()->nama;
?>

<div class="foto-pegawai-form">

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        <?= $form->errorSummary($model); ?> <!-- ADDED HERE -->


   


        <?= $form->field($model, 'nip') ->widget(Select2::classname(), [
    'initValueText' => $Desc, // set the initial display text
    'options' => ['placeholder' => 'Cari  Pegawai ...'],
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


    <?= '<img src="data:image/jpeg;base64,'.base64_encode($model->foto).'" width="200" height="250" />'?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

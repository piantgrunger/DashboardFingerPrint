<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Ijin */
/* @var $form yii\widgets\ActiveForm */
use kartik\select2\Select2;
use kartik\date\DatePicker;// The controller action that will render the list
$url = \yii\helpers\Url::to(['absen/nip-list']);
 
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


<?= $form->field($model, 'tanggal')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Masukkan Tanggal ...'],
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd'
    ]])
    ?>

    

    <?=$form->field($model, 'keterangan')->dropDownList([
        "SPD"=>"SPD",
        "SURAT TUGAS"=>"Surat Tugas",
        "CUTI"=>"Cuti",
        "IJIN"=>"Ijin",
        "SAKIT"=>"Sakit",
        "TB"=>"TB",
        "CUTI BESAR"=>"Cuti Besar",
        "CUTI HAJI"=>"Cuti Haji",
        "CUTI UMRAH"=>"Cuti Umrah",
        "S IJIN"=>"Surat Ijin",
    ]) ?>



    <?= $form->field($model, 'file')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\AbsenSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="absen-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>
 <div class="row">
 <div class="col-md-6">
     <?= $form->field($model, 'tanggal_awal')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Tanggal Awal ...'],
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd'
    ]
])?>
</div>
<div class="col-md-6">
     <?= $form->field($model, 'tanggal_akhir')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Tanggal Akhir ...'],
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd'
    ]
])?>
</div>

</div>
  
    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

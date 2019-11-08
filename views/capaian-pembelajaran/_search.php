<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\models\Capaian;

use yii\helpers\ArrayHelper;

$data=ArrayHelper::map(Capaian::find()->asArray()->all(), 'kode_capaian', 'nama_capaian');



/* @var $this yii\web\View */
/* @var $model app\models\CapaianPembelajaranSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="capaian-pembelajaran-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

  

    <?= $form->field($model, 'capaian')->dropDownList($data,    ['prompt'=>'','onChange'=>' this.form.submit();']  ) ?>

    <?php // echo $form->field($model, 'bahasa') ?>

    <?php // echo $form->field($model, 'is_deleted')->checkbox() ?>



    <?php ActiveForm::end(); ?>

</div>

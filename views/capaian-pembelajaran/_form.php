<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\models\Capaian;

use yii\helpers\ArrayHelper;
use yii\bootstrap\Tabs;
use app\models\Bahasa;

$data=ArrayHelper::map(Capaian::find()->asArray()->all(), 'kode_capaian', 'nama_capaian');

$form = ActiveForm::begin();



$items=[];
$bahasa = Bahasa::find()->all();
foreach ($bahasa as $detail) {
    array_push($items, [

    'label' => $detail->bahasa,
    'content' => $this->render('_deskripsi_bahasa', ['bahasa' => $detail->id_bahasa,'isi'=>$deskripsi[$detail->id_bahasa],'model' => $model])
    ]);
}

//var_dump($items);
//die();




/* @var $this yii\web\View */
/* @var $model app\models\CapaianPembelajaran */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="capaian-pembelajaran-form">

    

    <?= $form->field($model, 'kode')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'capaian')->dropDownList($data) ?>

    <?= $form->field($model, 'unit')->hiddenInput(['readOnly'=>'true'])->label(false) ?>

<?= $form->field($model, 'namaunit')->textInput(['readOnly'=>'true']) ?>
    


        <?= Tabs::widget(['items'=>$items]);  ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

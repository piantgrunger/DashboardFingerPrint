<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\DetailView;

$models = $dataProvider->getModels();
$first = reset($models);

$this->registerJS("setTimeout(function(){
   window.location.reload(1);
}, 5000);");


/* @var $this yii\web\View */
/* @var $searchModel app\models\AbsenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Absensi';
?>
<div class="absen-index">

    <h1><?= Html::encode($this->title) ?></h1>

<div class="row">
<div class="col-md-3">
<?php
     if (is_object($first)) {
         echo '<img src="data:image/jpeg;base64,'.base64_encode($first->foto).'" width="200" height="250" />';
     }
?>
</div>
<div class="col-md-9">

 <?= DetailView::widget([
        'model' => $first,
        'attributes' => [
            'nip',
            'nama_pegawai',
            'nama_unit_kerja',
            'masuk',
            'pulang',
            'absen_datang',
            'absen_keluar',
            'keterangan',

        ],
    ]); ?>
</div>

    </div>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]);?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
      //  'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nip',
            'nama_pegawai',
            'nama_unit_kerja',
            'masuk',
            'pulang',
            'absen_datang',
            'absen_keluar',
            'keterangan',

        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>

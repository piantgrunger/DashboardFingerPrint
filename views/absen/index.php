<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\DetailView;

$models = $dataProvider->getModels();
$first = reset($models);
/*
$this->registerJS("setTimeout(function(){
   window.location.reload(1);
}, 5000);");
*/

/* @var $this yii\web\View */
/* @var $searchModel app\models\AbsenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Absensi';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php  echo $this->render('_search', ['model' => $searchModel]);?>

    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nip',
            [
             'attribute' => 'Tanggal',
             'value'=> function ($model) {
                return date('d-m-Y', strtotime($model->jam_masuk));
             }
            ],
            'nama_pegawai',
            'nama_unit_kerja',
            'masuk',
            'pulang',
            'absen_datang',
            'absen_keluar',
            ['class' => 'yii\grid\ActionColumn'],

        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>

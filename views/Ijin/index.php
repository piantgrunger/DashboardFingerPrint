<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\IjinSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Ijin');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ijin-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Ijin Baru'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

     
            'nip',
            'nama_pegawai',
            'tanggal_awal:date',
            'tanggal_akhir:date',
            'jenis',
            
            'keterangan',
            [
             'attribute'=>'File Bukti',
             'format' => 'raw',
              'value' => function ($model) {
                  return "<a href='".Url::to(["media/".$model->file])."' class='btn btn-primary' data-pjax=0 >Download</a>";
              }
            ],
            'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>

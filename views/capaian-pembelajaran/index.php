<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use app\models\Bahasa;
use app\models\CapaianPembelajaran;

$column = [
    ['class' => 'yii\grid\SerialColumn'],

    'kode',

    [
     'attribute' => 'nama_unit' ,

    'value'=>'unitKerja.namaunit',
    ],
    'dataCapaian.nama_capaian',
    
    //'bahasa',
    //'is_deleted:boolean',

    
];


    $column [] =[
          'attribute' => 'Indonesia',
          'format' =>'raw',
          'value' => strtolower('indonesia.deskripsi')
    ];

    $column [] =[
        'attribute' => 'Inggris',
        'format' =>'raw',
        'value' => strtolower('Inggris.deskripsi')
    ];
    $column [] =[
    'attribute' => 'Arab',
    'format' =>'raw',
    'value' => strtolower('Arab.deskripsi')
    ];


    $column [] = ['class' => 'yii\grid\ActionColumn',
    'urlCreator' => function ($action, $model, $key, $index) {
        return Url::to(['capaian-pembelajaran/' . $action, 'id' => $model->kode]);
    },
    
    'buttons'=>[

        'update' => function ($url, $model) {

            
            $roles =Yii::$app->user->identity->roleSiakad;
            foreach ($roles as $role) {
                $kodeunit = $role->kodeunit;
            }
         
             
            return $kodeunit==$model->unit? Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
            'title' => Yii::t('yii', 'update'),
            ]) :'';
        },
        'delete' => function ($url, $model) {

            
            $roles =Yii::$app->user->identity->roleSiakad;
            foreach ($roles as $role) {
                $kodeunit = $role->kodeunit;
            }
         
             
            return $kodeunit==$model->unit? Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
            'title' => Yii::t('yii', 'delete'),
            ]) :'';
        }


    ]
    ];


/* @var $this yii\web\View */
/* @var $searchModel app\models\CapaianPembelajaranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

    $this->title = Yii::t('app', 'Capaian Pembelajaran');
    $this->params['breadcrumbs'][] = $this->title;
    ?>
<div class="capaian-pembelajaran-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Capaian Pembelajaran Baru'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
    
        'columns' => $column]); ?>

    <?php Pjax::end(); ?>

</div>

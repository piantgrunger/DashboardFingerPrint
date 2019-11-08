<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CapaianPembelajaran */

$this->title = $model->kode;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Capaian Pembelajaran'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);






?>
<div class="capaian-pembelajaran-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
     
            'kode',
          
            'dataCapaian.nama_capaian',
            'namaunit',
     
        ],
    ]) ?>
    <label for="">Deskripsi</label>

    <table class="table table-bordered">
     <tr>
         <th>Indonesia</th>
         <th>Inggris</th>
         <th>Arab</th>
     </tr>
     <tr>
         <td><?=$model->inggris->deskripsi?></td>
         <td><?=$model->indonesia->deskripsi?></td>
         <td><?=$model->arab->deskripsi?></td>

     </tr>

    </table>

</div>

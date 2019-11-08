 <br>
 <?php
 use yii\helpers\Html;

 echo Html::label('Deskripsi');

 echo Html::textarea('deskripsi-'.$bahasa, $isi, ['rows' => 6,'class'=>"form-control",'label'=>'Deskripsi']);
?>
 <br>

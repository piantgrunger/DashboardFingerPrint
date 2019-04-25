<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "ijin".
 *
 * @property integer $id
 * @property string $nip
 * @property string $tanggal
 * @property string $keterangan
 * @property string $file
 */
class Ijin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
   
    public $uploadFile;
    
    public static function tableName()
    {
        return 'ijin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nip', 'keterangan','jenis'], 'required'],
            [['tanggal_awal','tanggal_akhir'], 'required'],
            [['file'],'file','skipOnEmpty' => true, 'extensions' => 'pdf,doc,docx,txt,jpeg,jpg,xls,xlsx', 'maxSize' => 512000000],
            [['nip', 'keterangan', 'file'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nip' => Yii::t('app', 'Nip'),
            'tanggal' => Yii::t('app', 'Tanggal Awal'),
            'keterangan' => Yii::t('app', 'Keterangan'),
            'file' => Yii::t('app', 'File'),
        ];
    }
    public function getPegawai()
    {
        return $this->hasOne(Pegawai::className(), ['nip' => 'nip']);
    }
    public function getNama_pegawai()
    {
        return is_null($this->pegawai) ? '' : ''.$this->pegawai->nama;
    }
    public function upload($fieldName)
    {
        $path = Yii::getAlias('@app') . '/web/media/';
        //s  die($fieldName);
        $image = UploadedFile::getInstance($this, $fieldName);
        if (!empty($image) && $image->size !== 0) {
            $fileNames = 'ijin' . $this->nip . $this->tanggal_awal. '.'.$this->tanggal_akhir . md5(microtime()) . '.' . $image->extension;
            if ($image->saveAs($path . $fileNames)) {
                $this->attributes = [$fieldName => $fileNames];
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    }
}

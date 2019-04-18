<?php

namespace app\models;

use Yii;

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
    public $tanggal_awal;
    public $tanggal_akhir;
    
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
            [['nip', 'keterangan'], 'required'],
            [['tanggal','tanggal_awal','tanggal_akhir'], 'safe'],
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
            'tanggal' => Yii::t('app', 'Tanggal'),
            'keterangan' => Yii::t('app', 'Keterangan'),
            'file' => Yii::t('app', 'File'),
        ];
    }
}

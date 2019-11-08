<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;
use yii\behaviors\AttributeBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "skpi.skpi_isian".
 *
 * @property int $id
 * @property string $kode
 * @property string $deskripsi
 * @property int $capaian
 * @property int $unit
 * @property int $bahasa
 * @property bool $is_deleted
 */
class CapaianPembelajaran extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */



    public static function tableName()
    {
        return 'skpi.skpi_isian';
    }
    public function behaviors()
    {
        return [
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['is_deleted'],
      
                ],
                // if you're using datetime instead of UNIX timestamp:
                 'value' => false,
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['deskripsi'], 'string'],
            [['capaian', 'unit', 'bahasa'], 'default', 'value' => null],
            [['capaian', 'bahasa'], 'integer'],
            [['is_deleted'], 'boolean'],
            [['kode'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'kode' => Yii::t('app', 'Kode'),
            'deskripsi' => Yii::t('app', 'Deskripsi'),
            'capaian' => Yii::t('app', 'Capaian'),
            'unit' => Yii::t('app', 'Unit'),
            'bahasa' => Yii::t('app', 'Bahasa'),
            'is_deleted' => Yii::t('app', 'Is Deleted'),
        ];
    }

    public function getIndonesia()
    {
        return $this->hasOne(CapaianPembelajaran::className(), ['kode' =>'kode' ])->where(['bahasa'=>1,'is_deleted'=>false]) ;
    }
    public function getInggris()
    {
        return $this->hasOne(CapaianPembelajaran::className(), ['kode' =>'kode' ])->where(['bahasa'=>2,'is_deleted'=>false]) ;
    }
    public function getArab()
    {
        return $this->hasOne(CapaianPembelajaran::className(), ['kode' =>'kode' ])->where(['bahasa'=>3,'is_deleted'=>false]) ;
    }

    public function getBahasa_pengantar()
    {
        return $this->hasOne(Bahasa::className(), ['id_bahasa' =>'bahasa' ]);
    }
    public function getUnitKerja()
    {
        return $this->hasOne(Unit::className(), ['kodeunit'=>'unit']);
    }
    public function getNamaunit()
    {
        return ($this->unitKerja===null)?'':$this->unitKerja->namaunit;
    }
    
    public function getDataCapaian()
    {
        return $this->hasOne(Capaian::className(), ['kode_capaian'=>'capaian']);
    }
}

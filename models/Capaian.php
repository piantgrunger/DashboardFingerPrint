<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;


/**
 * This is the model class for table "skpi.skpi_capaian".
 *
 * @property string $kode_capaian
 * @property string $nama_capaian
 */
class Capaian extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public static function  primaryKey() {
        return ['kode_capaian'];
    }

 
    public static function tableName()
    {
        return 'skpi.skpi_capaian';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode_capaian'], 'number'],
            [['nama_capaian'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kode_capaian' => Yii::t('app', 'Kode Capaian'),
            'nama_capaian' => Yii::t('app', 'Nama Capaian'),
        ];
    }
}

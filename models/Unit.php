<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gate.ms_unit".
 *
 * @property string $kodeunit
 * @property string $kodeunitparent
 * @property string $namaunit
 * @property string $namasingkat
 * @property string $level
 * @property string $gelar
 * @property string $ketua
 * @property string $sekretaris
 * @property string $pembantu1
 * @property string $pembantu2
 * @property string $pembantu3
 * @property string $keterangan
 * @property string $kodeurutan
 * @property string $infoleft
 * @property string $inforight
 * @property string $t_updateuser
 * @property string $t_updateip
 * @property string $t_updatetime
 * @property string $t_updateact
 * @property string $email
 * @property string $alamatweb
 * @property string $namagelar
 */
class Unit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gate.ms_unit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kodeunit'], 'required'],
            [['level', 'infoleft', 'inforight'], 'number'],
            [['kodeunit', 'kodeunitparent', 'gelar'], 'string', 'max' => 10],
            [['namaunit', 'namasingkat', 'email', 'alamatweb', 'namagelar'], 'string', 'max' => 100],
            [['ketua', 'sekretaris', 'pembantu1', 'pembantu2', 'pembantu3'], 'string', 'max' => 25],
            [['keterangan'], 'string', 'max' => 255],
            [['kodeurutan'], 'string', 'max' => 6],
            [['t_updateuser', 't_updateip', 't_updatetime', 't_updateact'], 'string', 'max' => 30],
            [['kodeunit'], 'unique'],
            [['kodeunitparent'], 'exist', 'skipOnError' => true, 'targetClass' => Unit::className(), 'targetAttribute' => ['kodeunitparent' => 'kodeunit']],
            [['kodeunitparent'], 'exist', 'skipOnError' => true, 'targetClass' => Unit::className(), 'targetAttribute' => ['kodeunitparent' => 'kodeunit']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kodeunit' => Yii::t('app', 'Kodeunit'),
            'kodeunitparent' => Yii::t('app', 'Kodeunitparent'),
            'namaunit' => Yii::t('app', 'Namaunit'),
            'namasingkat' => Yii::t('app', 'Namasingkat'),
            'level' => Yii::t('app', 'Level'),
            'gelar' => Yii::t('app', 'Gelar'),
            'ketua' => Yii::t('app', 'Ketua'),
            'sekretaris' => Yii::t('app', 'Sekretaris'),
            'pembantu1' => Yii::t('app', 'Pembantu1'),
            'pembantu2' => Yii::t('app', 'Pembantu2'),
            'pembantu3' => Yii::t('app', 'Pembantu3'),
            'keterangan' => Yii::t('app', 'Keterangan'),
            'kodeurutan' => Yii::t('app', 'Kodeurutan'),
            'infoleft' => Yii::t('app', 'Infoleft'),
            'inforight' => Yii::t('app', 'Inforight'),
            't_updateuser' => Yii::t('app', 'T Updateuser'),
            't_updateip' => Yii::t('app', 'T Updateip'),
            't_updatetime' => Yii::t('app', 'T Updatetime'),
            't_updateact' => Yii::t('app', 'T Updateact'),
            'email' => Yii::t('app', 'Email'),
            'alamatweb' => Yii::t('app', 'Alamatweb'),
            'namagelar' => Yii::t('app', 'Namagelar'),
        ];
    }
}

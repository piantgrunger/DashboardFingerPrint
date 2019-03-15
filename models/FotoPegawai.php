<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "foto_pegawai".
 *
 * @property int $id
 * @property string $nip
 * @property resource $foto
 */
class FotoPegawai extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'foto_pegawai';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'nip', 'foto'], 'required'],
            [['id'], 'integer'],
            [['foto'], 'string'],
            [['nip'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nip' => 'Nip',
            'foto' => 'Foto',
        ];
    }
}

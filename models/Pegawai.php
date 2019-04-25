<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pegawai".
 *
 * @property int $id
 * @property string $nip
 * @property string $nama
 * @property string $template
 * @property string $unit_kerja
 * @property string $status
 * @property int $grade_id
 */
class Pegawai extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pegawai';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'nip', 'nama', 'template', 'unit_kerja', 'status', 'grade_id'], 'required'],
            [['id', 'grade_id'], 'integer'],
            [['template'], 'string'],
            [['nip'], 'string', 'max' => 50],
            [['nama'], 'string', 'max' => 150],
            [['unit_kerja'], 'string', 'max' => 10],
            [['status'], 'string', 'max' => 5],
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
            'nama' => 'Nama',
            'template' => 'Template',
            'unit_kerja' => 'Unit Kerja',
            'status' => 'Status',
            'grade_id' => 'Grade ID',
        ];
    }

    public function getFunit_kerja()
    {
        return $this->hasOne(PegawaiSimpeg::className(), [ 'nip' =>'nip']);
    }
    public function getNama_unit_kerja()
    {
        
        return is_null($this->funit_kerja) ? '' : $this->funit_kerja->nama_unit_kerja;
    }
    
}

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
class PegawaiSimpeg extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'simpeg_0511.tbpegawai';
    }

    /**
     * {@inheritdoc}
     */
    public function getFunit_kerja()
    {
        return $this->hasOne(UnitKerja::className(), [ 'id' =>'id_jastruk']);
    }
    public function getFunit_kerja_tambahan()
    {
        return $this->hasOne(UnitKerja::className(), [ 'id' =>'id_tugastambahan']);
    }
    
    public function getNama_unit_kerja()

    {
        if ( is_null($this->funit_kerja_tambahan) ) {
            return is_null($this->funit_kerja) ? '' : $this->funit_kerja->nama_unit;     
        } else  {
          return is_null($this->funit_kerja_tambahan) ? '' : $this->funit_kerja_tambahan->nama_unit;
        }  
    } 
    
}

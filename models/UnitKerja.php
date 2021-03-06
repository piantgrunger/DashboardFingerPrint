<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "m_unit".
 *
 * @property int $id
 * @property string $kode_unit
 * @property int $induk_unit
 * @property string $nama_unit
 * @property string $nama_singkat
 * @property string $jenis_unit
 * @property string $program_pendidikan
 * @property string $no_sk_dikti
 * @property string $tgl_sk_dikti
 * @property string $tgl_akhir_sk
 * @property string $tgl_berdiri
 * @property string $no_sk_ban_pts
 * @property string $akreditasi
 * @property string $tgl_sk_akreditasi
 * @property string $kode_prodi_epsbed
 * @property string $kode_fak_epsbed
 * @property string $ketua
 * @property string $sekretaris
 * @property string $nama_operator
 * @property string $telp_operator
 * @property string $alamat
 * @property string $kode_pos
 * @property string $telp_prodi
 * @property string $fax
 * @property string $email
 * @property string $homepage
 * @property int $boleh_dipilih
 */
class UnitKerja extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'simpeg_0511.m_jastruk';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
       
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
    
    }
}

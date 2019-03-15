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
        return 'm_unit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode_unit', 'nama_unit'], 'required'],
            [['induk_unit', 'boleh_dipilih'], 'integer'],
            [['tgl_sk_dikti', 'tgl_akhir_sk', 'tgl_berdiri', 'tgl_sk_akreditasi'], 'safe'],
            [['kode_unit'], 'string', 'max' => 5],
            [['nama_unit', 'program_pendidikan', 'no_sk_dikti', 'no_sk_ban_pts', 'kode_prodi_epsbed', 'kode_fak_epsbed', 'ketua', 'sekretaris', 'nama_operator', 'telp_operator', 'alamat', 'kode_pos', 'telp_prodi', 'fax', 'email', 'homepage'], 'string', 'max' => 100],
            [['nama_singkat', 'jenis_unit'], 'string', 'max' => 50],
            [['akreditasi'], 'string', 'max' => 2],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kode_unit' => 'Kode Unit',
            'induk_unit' => 'Induk Unit',
            'nama_unit' => 'Nama Unit',
            'nama_singkat' => 'Nama Singkat',
            'jenis_unit' => 'Jenis Unit',
            'program_pendidikan' => 'Program Pendidikan',
            'no_sk_dikti' => 'No Sk Dikti',
            'tgl_sk_dikti' => 'Tgl Sk Dikti',
            'tgl_akhir_sk' => 'Tgl Akhir Sk',
            'tgl_berdiri' => 'Tgl Berdiri',
            'no_sk_ban_pts' => 'No Sk Ban Pts',
            'akreditasi' => 'Akreditasi',
            'tgl_sk_akreditasi' => 'Tgl Sk Akreditasi',
            'kode_prodi_epsbed' => 'Kode Prodi Epsbed',
            'kode_fak_epsbed' => 'Kode Fak Epsbed',
            'ketua' => 'Ketua',
            'sekretaris' => 'Sekretaris',
            'nama_operator' => 'Nama Operator',
            'telp_operator' => 'Telp Operator',
            'alamat' => 'Alamat',
            'kode_pos' => 'Kode Pos',
            'telp_prodi' => 'Telp Prodi',
            'fax' => 'Fax',
            'email' => 'Email',
            'homepage' => 'Homepage',
            'boleh_dipilih' => 'Boleh Dipilih',
        ];
    }
}

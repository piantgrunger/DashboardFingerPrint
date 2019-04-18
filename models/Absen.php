<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "absen".
 *
 * @property string $nip
 * @property string $jam_masuk
 * @property string $jam_keluar
 * @property string $absen_datang
 * @property string $absen_keluar
 */
class Absen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public static function tableName()
    {
        return 'absen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nip', 'jam_masuk', 'jam_keluar', 'absen_datang', 'absen_keluar'], 'required'],
            [['jam_masuk', 'jam_keluar'], 'safe'],
            [['nip', 'absen_datang'], 'string', 'max' => 50],
            [['absen_keluar'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nip' => 'Nip',
            'jam_masuk' => 'Jam Masuk',
            'jam_keluar' => 'Jam Keluar',
            'absen_datang' => 'Absen Datang',
            'absen_keluar' => 'Absen Keluar',
        ];
    }
    public static function primaryKey()
    {
        return ["nip","jam_masuk","jam_keluar"];
    }

    public function getMasuk()
    {
        $jam =  explode(' ', $this->jam_masuk);
        if (count($jam) >=2) {
            return $jam[1];
        } else {
            return "";
        }
    }


    public function getPulang()
    {
        $jam =  explode(' ', $this->jam_keluar);
        if (count($jam) >=2) {
            return $jam[1];
        } else {
            return "";
        }
    }

    public function getPegawai()
    {
        return $this->hasOne(Pegawai::className(), ['nip' => 'nip']);
    }
    public function getFoto_pegawai()
    {
        return $this->hasOne(FotoPegawai::className(), ['nip' => 'nip']);
    }
    public function getNama_pegawai()
    {
        return is_null($this->pegawai) ? '' : ''.$this->pegawai->nama;
    }
    public function getNama_unit_kerja()
    {
        return is_null($this->pegawai) ? '' : ''.$this->pegawai->nama_unit_kerja;
    }

    public function getKeterangan()
    {
        $start_date = new \DateTime($this->jam_masuk);
        $since_start = $start_date->diff(new \DateTime(date("Y-m-d 07:30:00")));
        $minutes = $since_start->days * 24 * 60;
        $minutes += $since_start->h * 60;
        $minutes += $since_start->i;
        if ($minutes > 0) {
            return "Datang Terlambat ";
        } else {
            return "Datang Lebih Awal";
        }
    }
    public function getFoto()
    {
        return is_null($this->foto_pegawai) ? null : ''.$this->foto_pegawai->foto;
    }
}

<?php

namespace app\models;

use Yii;

use yii\web\UploadedFile;

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
    public $file;
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
            
          [['file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg,jpeg,bmp', 'maxSize' => 512000000],

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
    public static function primaryKey()
    {
        return ["id"];
    }
    public function upload($fieldName)
    {
        $path = Yii::getAlias('@app') . '/web/document/';
        //s  die($fieldName);
        $image = UploadedFile::getInstance($this, $fieldName);
        if (!empty($image) && $image->size !== 0) {
            $tmpfile_contents = file_get_contents( $image->tempName );

            $this->foto = $tmpfile_contents;
              
            

        }
    }
}

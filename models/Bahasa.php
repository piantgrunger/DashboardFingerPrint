<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "skpi_bahasa".
 *
 * @property string $id_bahasa
 * @property string $bahasa
 */
class Bahasa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function  primaryKey() {
        return ['id_bahasa'];
    }
    public static function tableName()
    {
        return 'skpi.skpi_bahasa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_bahasa'], 'number'],
            [['bahasa'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_bahasa' => Yii::t('app', 'Id Bahasa'),
            'bahasa' => Yii::t('app', 'Bahasa'),
        ];
    }
}

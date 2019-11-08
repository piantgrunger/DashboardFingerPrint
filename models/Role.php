<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gate.sc_userrole".
 *
 * @property string $kodeunit
 * @property string $koderole
 * @property int $userid
 * @property string $t_updateuser
 * @property string $t_updateip
 * @property string $t_updatetime
 * @property string $t_updateact
 */
class Role extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gate.sc_userrole';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kodeunit', 'koderole', 'userid'], 'required'],
            [['userid'], 'default', 'value' => null],
            [['userid'], 'integer'],
            [['kodeunit'], 'string', 'max' => 10],
            [['koderole'], 'string', 'max' => 25],
            [['t_updateuser', 't_updateip', 't_updatetime', 't_updateact'], 'string', 'max' => 30],
            [['kodeunit', 'koderole', 'userid'], 'unique', 'targetAttribute' => ['kodeunit', 'koderole', 'userid']],
            [['kodeunit'], 'exist', 'skipOnError' => true, 'targetClass' => GateMsUnit::className(), 'targetAttribute' => ['kodeunit' => 'kodeunit']],
            [['koderole'], 'exist', 'skipOnError' => true, 'targetClass' => GateScRole::className(), 'targetAttribute' => ['koderole' => 'koderole']],
            [['userid'], 'exist', 'skipOnError' => true, 'targetClass' => GateScUser::className(), 'targetAttribute' => ['userid' => 'userid']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kodeunit' => Yii::t('app', 'Kodeunit'),
            'koderole' => Yii::t('app', 'Koderole'),
            'userid' => Yii::t('app', 'Userid'),
            't_updateuser' => Yii::t('app', 'T Updateuser'),
            't_updateip' => Yii::t('app', 'T Updateip'),
            't_updatetime' => Yii::t('app', 'T Updatetime'),
            't_updateact' => Yii::t('app', 'T Updateact'),
        ];
    }
}

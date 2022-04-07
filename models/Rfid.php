<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rfid".
 *
 * @property int $id
 * @property string $no_rfid
 * @property string $nama
 * @property string $alamat
 * @property string $no_hp
 * @property string|null $tgl_expired
 */
class Rfid extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rfid';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_rfid', 'nama', 'alamat', 'no_hp'], 'required'],
            [['alamat'], 'string'],
            [['tgl_expired'], 'safe'],
            [['no_rfid', 'nama', 'no_hp'], 'string', 'max' => 150],
            [['no_rfid'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'no_rfid' => Yii::t('app', 'No RFID'),
            'nama' => Yii::t('app', 'Nama'),
            'alamat' => Yii::t('app', 'Alamat'),
            'no_hp' => Yii::t('app', 'No Hp'),
            'tgl_expired' => Yii::t('app', 'Tgl Expired'),
        ];
    }
}

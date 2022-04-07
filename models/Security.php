<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "security".
 *
 * @property int $id
 * @property string $nik
 * @property string $nama
 * @property string $alamat
 * @property string $no_hp
 * @property string|null $tempat_lahir
 * @property string|null $tanggal_lahir
 * @property string|null $jenis_kelamin
 * @property string|null $agama
 * @property string $tanggal_masuk
 */
class Security extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'security';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nik', 'nama', 'alamat', 'no_hp', 'tanggal_masuk'], 'required'],
            [['alamat'], 'string'],
            [['tanggal_lahir', 'tanggal_masuk'], 'safe'],
            [['nik', 'nama', 'no_hp', 'tempat_lahir', 'jenis_kelamin', 'agama'], 'string', 'max' => 50],
            [['nik'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nik' => 'Nik',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'no_hp' => 'No Hp',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'jenis_kelamin' => 'Jenis Kelamin',
            'agama' => 'Agama',
            'tanggal_masuk' => 'Tanggal Masuk',
        ];
    }

    public function afterSave($insert, $changedAttributes)
    {
        //create user

        $user = User::find()->where(['username' => $this->nik])->one();
        if (!$user) {
            $user=new User;
        }
        $user->username = $this->nik;
        $user->email = $this->nik.'@perumahan.com';
        $user->setPassword($this->nik);
        $user->generateAuthKey();
        $user->id_pegawai = $this->id;
        $user->save();
        AuthAssignment::deleteAll(['user_id' => $user->id]);
        $authAssignment = new  AuthAssignment();
        $authAssignment->item_name = 'security';
        $authAssignment->user_id =$user->id;
        $authAssignment->save();

        return true;
    }
}

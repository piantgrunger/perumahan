<?php

namespace app\models;

use app\models\User;
use yii\base\Model;

use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $nama;
    public $alamat;
    public $pendidikan_terakhir;
    public $no_hp;
    public $no_telepon;
    public $tanggal_lahir;
    public $tempat_lahir;
    public $jenis_kelamin;
    public $provinsi;
    public $kabupaten;
    public $kode_pos;

    public $password;
    


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            [ ['username','password','email','nama','alamat',
            'pendidikan_terakhir',
            'no_hp',
            'no_telepon',
            'tanggal_lahir',
            'tempat_lahir',
             'jenis_kelamin',
            'provinsi',
            'kabupaten',
            'kode_pos',
        
            ] , 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'NIP ini Sudah Terdaftar'],

            ['username', 'string', 'min' => 2, 'max' => 255],
    
   
            
     
        ];
    }



    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'NIP'),
            'password' => Yii::t('app', 'Password'),
        ];
    }
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            if ($user->save()) {
                $authAssignment = new AuthAssignment();
                $authAssignment->user_id = $user->id;
                $authAssignment->item_name = 'pendaftar';
                $authAssignment->created_at = 1;
                $authAssignment->save();

                return $user;
            }
        }

        return null;
    }
}

<?php

namespace app\models;
use Yii;
use yii\base\Model;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\helpers\Security;
use yii\web\IdentityInterface;


class User extends ActiveRecord implements IdentityInterface
{
   /* public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;*/


    public static function tableName()
    {
        return 'users';
    }


    public function rules()
    {
        return [
            [['isAdmin'], 'integer'],
            [['username','name', 'password',  'email', 'phone','region','city'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Login',
            'name' => 'Name',
            'password' => 'Password',
            'email' => 'Email',
            'phone'=>'Phone',
            'region'=>'Region',
            'city'=>'City',
            'isAdmin' => 'Is Admin'
        ];
    }


    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['user_id' => 'id']);
    }
    public static function findIdentity($id)
    {
        return User::findOne($id);
    }
    public function getId()
    {
        return $this->id;
    }
    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }
    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }
    public static function findByUsername($username)
    {
        return User::find()->where(['username'=>$username])->one();
    }
    public static function findByEmail($email)
    {
        return User::find()->where(['email'=>$email])->one();
    }
    public function validatePassword($password)
    {
        return ($this->password == $password) ? true : false;
    }
    
    public function create()
    {
        return $this->save(false);
    }    
 
 

}

<?php

namespace app\models;

use Yii;
use yii\base\Model;

class SignupForm extends Model
{
   public $username;
   public $password;
   public $email;

   private $user = false;



   public function rules() {
   	 return [           
            [['username', 'password','email'], 'required'], 
 			[['username'],'string'],
            [['email'], 'email'],
            [['email'], 'unique','targetClass'=>'app\models\User','targetAttribute'=>'email'],        
            [['username'], 'unique','targetClass'=>'app\models\User','targetAttribute'=>'username'],
        ];
   }

   public function signup() {
   		if ($this->validate()) {
   			$user = new User;
   			$user->attributes = $this->attributes;
   			return $user->create();
   		}
   }
    
}

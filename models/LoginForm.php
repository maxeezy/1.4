<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{
    public $login;
    public $password;

    private $_user = false;



    public function rules()
    {
        return [
            ['login',  'required','message'=>'Поле Логин не должно быть пустое'],
            ['password',  'required','message'=>'Поле Логин не должно быть пустое'],

            // password is validated by validatePassword()
            ['password', 'validateData'],
        ];
    }


    public function validateData($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$this->validatePassword($user)) {
                $this->addError($attribute, 'Неверные данные');
            }
        }
    }

    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), 3600*24*30);
        }
        return false;
    }


    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByLogin($this->login);
        }

        return $this->_user;
    }

    public function validatePassword($user){
        if (Yii::$app->security->validatePassword($this->password,$user->password)){
            return true;
        }
        else{
            return false;
        }
    }
}

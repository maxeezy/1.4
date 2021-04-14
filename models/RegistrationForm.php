<?php


namespace app\models;


use yii\base\Model;

class RegistrationForm extends Model
{
    public $name;
    public $lastName;
    public $patronymic;
    public $login;
    public $email;
    public $password;
    public $password2;
    public $agree;


    public function rules()
    {
        return
        [
            ['name',  'required','message'=>'Поле Логин не должно быть пустое'],
            ['lastName',  'required','message'=>'Поле Фамилия не должно быть пустое'],
            ['patronymic',  'required','message'=>'Поле Отчество не должно быть пустое'],
            ['login',  'required','message'=>'Поле Логин не должно быть пустое'],
            ['email',  'required','message'=>'Поле Емейл не должно быть пустое'],
            ['password',  'required','message'=>'Поле Пароль не должно быть пустое'],
            ['password2',  'required','message'=>'Поле Повтор пароля не должно быть пустое'],
            ['agree',  'required','message'=>'Поле Логин не должно быть пустое'],
            ['email','email','message'=>'Введите корректный мэйл'],
            ['agree','boolean','trueValue' => true, 'falseValue' => false],
            ['agree','checkAgree'],
            ['lastName','match','pattern'=>'/^[А-я\s]+$/u','message'=>'Поле Фамилия должно содержать только кириллические буквы'],
            ['name','match','pattern'=>'/^[А-я\s]+$/u','message'=>'Поле Имя должно содержать только кириллические буквы'],
            ['patronymic','match','pattern'=>'/^[А-я\s]+$/u','message'=>'Поле Отчество должно содержать только кириллические буквы'],
            ['login','match','pattern'=>'/^[A-z\s]+$/u','message'=>'Логин должен содержать только латинские символы'],
            ['login','checkUniqLogin'],
            ['password','validatePassword'],
            ['password2','compare','compareAttribute' =>'password','message'=>'Пароли не совпадают']
        ];
    }

    public function checkUniqLogin($attribute,$params){
        $user = User::find()->where(['login'=>$this->login])->exists();
        if ($user){
            $this->addError($attribute,'Такой логин уже зарегистрирован');
        }
    }

    public function validatePassword($attribute, $params){
        if (strlen($this->password)<6){
            $this->addError($attribute,'Пароль не должен быть короче 6 символов');
        }
    }

    public function registration(){
        $user = new User();
        $user->login = $this->login;
        $user->email = $this->email;
        $user->name = $this->name;
        $user->last_name = $this->lastName;
        $user->patronymic = $this->patronymic;
        $user->password = \Yii::$app->security->generatePasswordHash($this->password);
        $user->type = 1;
        $user->save();
    }

    public function checkAgree($attribute, $params){
        if ($this->agree==false){
            $this->addError($attribute,'Вы должны согласиться на обработку персональных данных');
        }
    }

}
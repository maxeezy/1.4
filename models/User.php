<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $login
 * @property string $email
 * @property string $last_name
 * @property string $name
 * @property string $patronymic
 * @property string $password
 * @property int $type
 *
 * @property Request[] $requests
 * @property TypeUser $type0
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'email', 'last_name', 'name', 'patronymic', 'password', 'type'], 'required'],
            [['email', 'last_name', 'name', 'patronymic', 'password'], 'string'],
            [['type'], 'integer'],
            [['login'], 'string', 'max' => 255],
            [['login'], 'unique'],
            [['type'], 'exist', 'skipOnError' => true, 'targetClass' => TypeUser::className(), 'targetAttribute' => ['type' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'email' => 'Email',
            'last_name' => 'Last Name',
            'name' => 'Name',
            'patronymic' => 'Patronymic',
            'password' => 'Password',
            'type' => 'Type',
        ];
    }

    /**
     * Gets query for [[Requests]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRequests()
    {
        return $this->hasMany(Request::className(), ['owner' => 'id']);
    }

    /**
     * Gets query for [[Type0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType0()
    {
        return $this->hasOne(TypeUser::className(), ['id' => 'type']);
    }

    public function findByLogin($login){
        return User::find()->where(['login'=>$login])->one();
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


    public static function findIdentity($id)
    {
        return User::findOne($id);
    }


    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }
}

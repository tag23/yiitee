<?php
/**
 * Created by PhpStorm.
 * User: tag19
 * Date: 12.03.2019
 * Time: 10:52 PM
 */

namespace app\models;

use yii\base\Model;

class RegisterForm extends Model
{
    public $email;
    public $name;
    public $password;

    public function attributeLabels()
    {
        return [
            'email' => 'Email',
            'name' => 'Name',
            'password' => 'Password'
        ];
    }
    public function rules() {
        return [
            [['name', 'email', 'password'], 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => 'app\models\User'],
            ['name', 'string', 'length' => [3, 40]],
            ['password', 'string', 'length' => [6, 18]],
        ];
    }

    public function register() {
        $user = new User();
        $user->email = $this->email;
        $user->name = $this->name;
        $user->setPassword($this->password);
        return $user->save();
    }
}
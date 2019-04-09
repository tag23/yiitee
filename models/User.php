<?php
/**
 * Created by PhpStorm.
 * User: tag19
 * Date: 19.03.2019
 * Time: 8:27 PM
 */

namespace app\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{

    public static function tableName()
    {
        return parent::tableName(); // TODO: Change the autogenerated stub
    }

    public function setPassword($password) {
        $this->password = sha1($password);
    }
    public function setImage($image) {
        $this->image = $image;
    }

    public function validatePassword($password) {
        return $this->password === sha1($password);
    }

    public static function findIdentity($id)
    {
        // TODO: Implement findIdentity() method.
        return static::findOne($id);
    }

    public static function findByUsername($username)
    {
        $user = self::find()->where(["name" => $username])->one();

        if (!count($user)) {
            return null;
        }
        return new static($user);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    public function getId()
    {
        return $this->id;
    }

    public function  getImage()
    {
        return $this->image;
    }
    public function getAuthKey()
    {
        return $this->authKey;
    }


    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->authKey = \Yii::$app->security->generateRandomString();
            }
            return true;
        }
        return false;
    }
}
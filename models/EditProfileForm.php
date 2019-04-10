<?php
/**
 * Created by PhpStorm.
 * User: tag19
 * Date: 09.04.2019
 * Time: 11:24 PM
 */

namespace app\models;

use Yii;
use yii\base\Model;

class EditProfileForm extends Model
{
    public $image;
    public $_user;

    public function rules() {
        return [
            [['image'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }
    public function update()
    {
        $url = '/images/projects/' . $this->image->baseName . '.' . $this->image->extension;
        //
        $_user = $this->findModel();
        $_user->setImage($url);
        return $_user->save();
    }
    private function findModel()
    {
        return User::findOne(Yii::$app->user->identity->getId());
    }
}
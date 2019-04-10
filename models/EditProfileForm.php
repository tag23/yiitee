<?php
/**
 * Created by PhpStorm.
 * User: tag19
 * Date: 09.04.2019
 * Time: 11:24 PM
 */

namespace app\models;

use Yii;
use yii\base\Exception;
use yii\base\Model;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

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
        $_user = $this->findModel();
        if ($this->image = UploadedFile::getInstance($this, 'image')) {
            $userImgName = 'useravatar_' . $_user->getName() . '.' . $this->image->extension;
            $path = '/images/users/' . $userImgName;

            $this->image->saveAs(Yii::getAlias('@userImgPath') . '/' . $userImgName);
        }
        //$url = $path . $this->image->baseName . '.' . $this->image->extension;
        //

        $_user->setImage($path);
        return $_user->save();
    }
    private function findModel()
    {
        return User::findOne(Yii::$app->user->identity->getId());
    }
}
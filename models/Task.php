<?php
/**
 * Created by PhpStorm.
 * User: tag19
 * Date: 16.04.2019
 * Time: 9:33 PM
 */

namespace app\models;


use yii\db\ActiveRecord;

class Tasks extends ActiveRecord
{
    public static function tableName()
    {
        return 'Tasks';
    }
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name'], 'text'],
        ];
    }
    public function attributeLabels()
    {
        return parent::attributeLabels(); // TODO: Change the autogenerated stub
    }
}
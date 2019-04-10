<?php
/**
 * Created by PhpStorm.
 * User: tag19
 * Date: 10.04.2019
 * Time: 9:22 PM
 */

namespace app\models;


use yii\db\ActiveRecord;

class Sprint extends ActiveRecord
{
    public static function tableName()
    {
        return 'Sprint';
    }

    public function rules() {
        return [
            [['date'], 'date'],
            [['project_id'], 'integer'],
        ];

    }
}
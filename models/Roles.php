<?php
/**
 * Created by PhpStorm.
 * User: tag19
 * Date: 01.05.2019
 * Time: 3:59 PM
 */

namespace app\models;


use yii\db\ActiveRecord;

class Roles extends ActiveRecord
{
    public static function tableName()
    {
        return 'Roles';
    }

    public function rules()
    {
        return [
            [['id', 'perm_id'], 'integer'],
            [['role'], 'safe'],
        ];

    }
//    public function getProject() {
//        return $this->hasOne(Project::className(), ['id'=>'project_id']);
//    }
//    public function setStartDate($date) {
//        $this->start_date = $date;
//    }
//    public function setProjectId($id) {
//        $this->project_id = $id;
//    }

    public function attributeLabels()
    {
        return parent::attributeLabels(); // TODO: Change the autogenerated stub
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: tag19
 * Date: 10.04.2019
 * Time: 9:22 PM
 */

namespace app\models;


class SprintSearch extends Sprint
{
    public function rules() {
        return  [
            [['date'], 'date'],
            [['project_id'], 'safe']
        ];
    }
    public function scenarios()
    {
        return parent::scenarios(); // TODO: Change the autogenerated stub
    }
    public function search($params) {
        $query = Project::findBySql("SELECT * FROM Sprint WHERE project_id=". Project::findOne(Yii::$app->request->get('id'))->toArray()['id']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            //'id' => $this->getAttribute('id'),
            'name' => $this->getAttribute('name'),
            'project_image' => $this->getAttribute('project_image'),
            'user_id' => $this->getAttribute('user_id')
        ]);

        return $dataProvider;
    }
}
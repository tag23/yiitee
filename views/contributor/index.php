<?php

use app\models\Project;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ContributorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contributors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contributors-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Contributors', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name:ntext',
            ['attribute'=>'Roles',
                'header'=>'Roles',
                'value' => function ($model) {
                    $name = Project::findOne($model['project_id'])->getName();
                    return $name;
                }
            ],
            ['attribute'=>'Project',
                'header'=>'Project',
                'value' => function ($model) {
                    $name = Project::findOne($model['project_id'])->getName();
                    return $name;
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>

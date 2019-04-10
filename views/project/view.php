<?php
/**
 * Created by PhpStorm.
 * User: tag19
 * Date: 10.04.2019
 * Time: 12:56 AM
 */

use app\models\Project;
use yii\helpers\Html;
use yii\widgets\DetailView;
$this->title = Yii::t('app', 'Project');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-profile">

    <h1><?= HTML::encode($this->title) ?></h1>
<?php
echo DetailView::widget([
    'model' => $project,
    'attributes' => [
        [
            'label' => 'name',
            'value' => $project->name,
        ],
        [
            'label' => 'image',
            'value' => $project->project_image,
            'format' => ['image',['width'=>'100','height'=>'100']],
        ],
    ],
]);/*
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'name:ntext',
        ['attribute'=>'user_id',
            'header'=>'creator',
            'value' => function ($model) {
                $name = User::findOne(Yii::$app->user->identity->getId())->getName();
                return $name;
            }
        ],
        ['class'=>\yii\grid\DataColumn::className(),
            'attribute'=>'project_image',
            'format'=>'image',
            'header'=> 'icon',
            'headerOptions' => ['width' => '20'],],

        ['class' => 'yii\grid\ActionColumn',
            'header'=>'actions',
            'headerOptions' => ['width' => '60'],
            'buttons'=>[
                'view'=>function($url, $model){
                    $customurl=Yii::$app->getUrlManager()->createUrl(['project/view','id'=>$model['id']]); //$model->id для AR
                    return \yii\helpers\Html::a( '<span class="glyphicon glyphicon-eye-open"></span>', $customurl,
                        ['title' => Yii::t('yii', 'View'), 'data-pjax' => '0']);
                },],
        ],
    ]]);
*/?>
</div>

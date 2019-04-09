<?php
/**
 * Created by PhpStorm.
 * User: tag19
 * Date: 12.03.2019
 * Time: 8:26 PM
 */
//\app\controllers\debug($model);
use app\models\ProjectSearch;
use yii\grid\GridView;

$this->title = Yii::t('app', 'Projects');
$this->params['breadcrumbs'][] = $this->title;
?>
<h1> Projects </h1>

<?php

    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'name:ntext',
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
/*
    foreach ($projects as $project) {
        echo '<pre>';

        var_dump("ID: ".$project->id, "Name: ".$project->name );
        echo '</pre>';
    }
*/
?>
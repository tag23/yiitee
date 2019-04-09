<?php
/**
 * Created by PhpStorm.
 * User: tag19
 * Date: 12.03.2019
 * Time: 8:13 PM
 */

namespace app\controllers;

use app\models\ProjectSearch;
use Yii;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Project;


class ProjectController extends AppController
{
    public function actionIndex()
    {
        $projects = Project::find()->all();
        $this->view->title = 'Projects';
        $this->layout = 'custom';
        $searchModel = new ProjectSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', ['searchModel' => $searchModel, 'dataProvider' => $dataProvider, 'projects' => $projects]);
    }
    public function actionView($id)
    {
        $project = Project::findOne($id);
        return $this->render('view',[
            'project'=>$project,
        ]);
    }
}
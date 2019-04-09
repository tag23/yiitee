<?php
/**
 * Created by PhpStorm.
 * User: tag19
 * Date: 10.04.2019
 * Time: 1:19 AM
 */

namespace app\controllers;


use yii\web\Controller;

class SprintController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
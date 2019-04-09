<?php
/**
 * Created by PhpStorm.
 * User: tag19
 * Date: 12.03.2019
 * Time: 10:50 PM
 */

namespace app\controllers;

use yii\web\Controller;

class AppController extends Controller
{
    public function actionIndex()
    {
        return $this->redirect(['profile/index'], 301);
    }
}

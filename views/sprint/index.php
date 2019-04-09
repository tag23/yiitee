<?php
/**
 * Created by PhpStorm.
 * User: tag19
 * Date: 10.04.2019
 * Time: 1:18 AM
 */
use yii\helpers\html;
$this->title = Yii::t('app', 'Sprints');
$this->params['breadcrumbs'][] = $this->title;
?> <h1><?= HTML::encode($this->title) ?></h1>
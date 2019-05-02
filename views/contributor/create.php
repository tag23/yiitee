<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Contributors */

$this->title = 'Create Contributors';
$this->params['breadcrumbs'][] = ['label' => 'Contributors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contributors-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

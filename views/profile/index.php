<?php
/**
 * Created by PhpStorm.
 * User: tag19
 * Date: 09.04.2019
 * Time: 10:40 PM
 */

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\user\models\User */

$this->title = Yii::t('app', 'Profile');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-profile">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute'=>'image',
                'format' => ['image',['width'=>'100','height'=>'100']],
            ],
            'email',
            'name',
        ],
    ]) ?>

</div>
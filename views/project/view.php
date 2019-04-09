<?php
/**
 * Created by PhpStorm.
 * User: tag19
 * Date: 10.04.2019
 * Time: 12:56 AM
 */
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
]);
?>
</div>

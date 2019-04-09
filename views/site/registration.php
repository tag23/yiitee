<?php
/**
 * Created by PhpStorm.
 * User: tag19
 * Date: 12.03.2019
 * Time: 11:40 PM
 */
use yii\widgets\ActiveForm;
use yii\helpers\Html;
//debug($model)
$this->title = Yii::t('app', 'Registration');
$this->params['breadcrumbs'][] = $this->title;
?> <h1><?= HTML::encode($this->title) ?></h1>
    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif;?>
    <?php if (Yii::$app->session->hasFlash('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong><?php echo Yii::$app->session->getFlash('error');?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif;?>
<?php $form = ActiveForm::begin(['options' => ['id' => 'form-registration']]); ?>
<?=$form->field($model, 'email')->label("Email")->input('email');?>
<?=$form->field($model, 'name')->label("Name");?>
<?=$form->field($model, 'password')->label("Password")->passwordInput();?>
<?=Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-success']);?>
<?php ActiveForm::end()?>

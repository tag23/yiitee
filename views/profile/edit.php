<?php
/**
 * Created by PhpStorm.
 * User: tag19
 * Date: 09.04.2019
 * Time: 11:21 PM
 */

use yii\widgets\ActiveForm;
use yii\helpers\Html;


$form = ActiveForm::begin(['options' => ['id' => 'form-edit']]); ?>

<?= $form->field($model, 'image')->fileInput(['options' => ['accept' => 'image/*' ] ,])?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'BUTTON_SAVE'), ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>
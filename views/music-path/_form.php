<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MusicPath */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="music-path-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'IdMusicPath')->textInput() ?>

    <?= $form->field($model, 'IdMusic')->textInput() ?>

    <?= $form->field($model, 'Path')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

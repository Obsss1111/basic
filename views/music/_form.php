<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Music */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="music-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name_music')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_style')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'autor_name_autor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'path_music_id_path')->textInput() ?>

    <?= $form->field($model, 'music_style_id_style')->textInput() ?>

    <?= $form->field($model, 'autor_id_autor')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

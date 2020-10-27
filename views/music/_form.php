<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Music */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="music-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'IdMusic')->textInput() ?>

    <?= $form->field($model, 'IdMusicPath')->textInput() ?>

    <?= $form->field($model, 'IdMusicStyle')->textInput() ?>

    <?= $form->field($model, 'IdAutor')->textInput() ?>

    <?= $form->field($model, 'IdAlbum')->textInput() ?>

    <?= $form->field($model, 'IdUser')->textInput() ?>

    <?= $form->field($model, 'NameMusic')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

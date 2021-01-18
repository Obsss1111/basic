<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FavoriteMusic */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="favorite-music-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'music_id_music')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

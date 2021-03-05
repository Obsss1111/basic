<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AlbumsMusic */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="albums-music-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_albums_music')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

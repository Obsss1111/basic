<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MusicSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="music-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_music') ?>

    <?= $form->field($model, 'name_music') ?>

    <?= $form->field($model, 'name_style') ?>

    <?= $form->field($model, 'duration') ?>

    <?= $form->field($model, 'autor_name_autor') ?>

    <?php // echo $form->field($model, 'path_music_id_path') ?>

    <?php // echo $form->field($model, 'music_style_id_style') ?>

    <?php // echo $form->field($model, 'autor_id_autor') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

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
    ]); ?>

    <?= $form->field($model, 'IdMusic') ?>

    <?= $form->field($model, 'IdMusicPath') ?>

    <?= $form->field($model, 'IdMusicStyle') ?>

    <?= $form->field($model, 'IdAutor') ?>

    <?= $form->field($model, 'IdAlbum') ?>

    <?php // echo $form->field($model, 'IdUser') ?>

    <?php // echo $form->field($model, 'NameMusic') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

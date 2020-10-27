<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form ActiveForm */
?>
<div class="user-reg">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'IdUser') ?>
        <?= $form->field($model, 'Login') ?>
        <?= $form->field($model, 'Password') ?>
        <?= $form->field($model, 'FavoriteStyleMusic') ?>
        <?= $form->field($model, 'FavoriteAutor') ?>
        <?= $form->field($model, 'FavoriteStyle') ?>
        <?= $form->field($model, 'FavoriteMusic') ?>
        <?= $form->field($model, 'FavoriteAlbum') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- user-reg -->
